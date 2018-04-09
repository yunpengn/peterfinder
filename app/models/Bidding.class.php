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
        $query = "SELECT * FROM bidding WHERE bidder = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }
}

