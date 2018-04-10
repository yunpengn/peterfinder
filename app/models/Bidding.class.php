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
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE bidder = ?";
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
        $query = "SELECT B.service_id as service_id, B.bidder as bidder, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE provider = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }

    public static function getBidPoint(int $serviceId): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM bidding WHERE service_id = ?";
        $result = $db->query($query, array($serviceId));
        return $result[0];
    }

    public static function updateBidPoint(int $bidPoint, int $serviceId): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $query = "UPDATE bidding SET points = ? WHERE service_id = ?";
        return $db->insertOrUpdate($query, array($bidPoint, $serviceId));
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

