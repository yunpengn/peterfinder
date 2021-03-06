<?php

class Bidding {
    public static function create(string $serviceId, string $petName, string $points): bool {
        $db = new Database();
        $query = "INSERT INTO bidding (service_id, bidder, pet_name, points) VALUES (?, ?, ?, ?);";
        return $db->insertOrUpdate($query, array($serviceId, $_SESSION['username'], $petName, $points));
    }

    /**
     * @return array 2D-array representing all biddings belonging to the current user.
     */
    public static function myBiddings(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.pet_name as pet_name, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE bidder = ?;";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }

    /**
     * @return array 2D-array representing all biddings for services offered by the current user.
     */
    public static function othersBiddings(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.pet_name as pet_name, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE S.provider = ? AND B.status = 'pending';";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }

    public static function getBiddingRecord(int $serviceId, string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.pet_name as pet_name, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE B.service_id = ? AND bidder = ? AND pet_name = ?;";
        $result = $db->query($query, array($serviceId, $_SESSION['username'], $petName));
        return $result[0];
    }


    /**
     * Checks whether one pet owner has bidder for a certain service offer before.
     *
     * @param string $serviceId
     * @param string $owner
     * @return bool
     */
    public static function hasBidding(string $serviceId, string $owner): bool {
        $db = new Database();
        $query = "SELECT 1 FROM bidding WHERE service_id = ? AND bidder = ?;";
        return !empty($db->query($query, array($serviceId, $owner)));
    }

    /**
     * Gets the pet names of which a certain pet owner can use when bidding for a certain pet offer. In
     * other words, the pet's type must be within the service targets.
     *
     * @param string $serviceId
     * @param string $owner
     * @return array
     */
    public static function getValidPets(string $serviceId, string $owner): array {
        $db = new Database();
        $query = "SELECT pet_name FROM pets WHERE username = ? "
            ."AND type IN (SELECT type FROM service_target WHERE service_id = ?);";
        return $db->query($query, array($owner, $serviceId));
    }

    public static function getBiddersInfo(int $serviceId): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT count(*) as number, min(points) as minimum, max(points) as maximum FROM bidding WHERE service_id = ?;";
        $result = $db->query($query, array($serviceId));
        return $result[0];
    }

    public static function getBidPoint(int $serviceId, string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM bidding WHERE service_id = ? AND bidder = ? AND pet_name = ?;";
        $result = $db->query($query, array($serviceId, $_SESSION['username'], $petName));
        return $result[0];
    }

    public static function updateBidPoint(float $bidPoint, int $serviceId, string $petName): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $newBidPoint = round($bidPoint, 2);
        $query = "UPDATE bidding SET points = ? WHERE service_id = ? AND bidder = ? AND pet_name = ?;";
        return $db->insertOrUpdate($query, array($newBidPoint, $serviceId, $_SESSION['username'], $petName));
    }

    /**
     * Assign succeed for the given bidder, while assign fail to other bidders who bid for the same offer.
     *
     * @return bool
     */
    public static function assignSucceedForBidding(string $service_id, string $bidder, string $pet_name): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();

        // First update one bidding to 'succeed' and else to 'fail'.
        $queries = array("UPDATE bidding SET status = "
                         . "(CASE WHEN bidder = ? THEN 'succeed'::bidding_status ELSE 'fail'::bidding_status END)"
                         . " WHERE service_id = ?;");
        $params = array(array($bidder, $service_id));

        // Then create the service history for this service offer.
        array_push($queries, "INSERT INTO service_history (service_id, owner, pet_name) VALUES (?, ?, ?);");
        array_push($params, array($service_id, $bidder, $pet_name));

        return $db->transact($queries, $params);
    }

    /**
     * Delete a bidding of the current user.
     *
     * @param int $service_id
     * @return bool
     */
    public static function delete(int $service_id, string $pet_name) {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        // Makes sure this pet belongs to the current user.
        $query = "DELETE FROM bidding WHERE service_id = ? AND bidder = ? AND pet_name = ?;";
        return $db->insertOrUpdate($query, array($service_id, $_SESSION['username'], $pet_name));
    }
}

