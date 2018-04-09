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
        $query = "SELECT B.bidder as bidder, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE bidder = ?";
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
        $query = "SELECT B.bidder as bidder, B.points as points, B.status as status, S.provider as provider, S.start_date as start_date, S.end_date as end_date, S.decision_deadline as decision_deadline, S.expected_salary as expected_salary FROM bidding B inner join service_offers S on B.service_id = S.service_id WHERE provider = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }
}

