<?php

class Bidding {

    /**
     * @return array 2D-array representing all biddings belonging to the current user.
     */
    public static function myBiddings(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.pet_name as pet_name, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE bidder = ?";
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
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.pet_name as pet_name, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE provider = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }

    public static function getBidPoint(int $serviceId, string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM bidding WHERE service_id = ? AND bidder = ? AND pet_name = ?";
        $result = $db->query($query, array($serviceId, $_SESSION['username'], $petName));
        return $result[0];
    }

    public static function updateBidPoint(int $bidPoint, int $serviceId, string $petName): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $query = "UPDATE bidding SET points = ? WHERE service_id = ? AND bidder = ? AND pet_name = ?";
        return $db->insertOrUpdate($query, array($bidPoint, $serviceId, $_SESSION['username'], $petName));
    }

    public static function getBidStatus(int $serviceId, string $bidder, string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM bidding WHERE service_id = ? AND bidder = ? AND pet_name = ?";
        $result = $db->query($query, array($serviceId, $bidder, $petName));
        return $result[0];
    }

    public static function updateBidStatus(string $bidStatus, int $serviceId, string $bidder, string $petName): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $query = "UPDATE bidding SET status = ? WHERE service_id = ? AND bidder = ? AND pet_name = ?";
        return $db->insertOrUpdate($query, array($bidStatus, $serviceId, $bidder, $petName));
    }

    /**
     * Delete a bidding of the current user.
     *
     * @param int $service_id
     * @return bool
     */
    public static function delete(int $service_id) {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        // Makes sure this pet belongs to the current user.
        $query = "DELETE FROM bidding WHERE service_id = ?";
        return $db->insertOrUpdate($query, array($service_id));
    }
}

