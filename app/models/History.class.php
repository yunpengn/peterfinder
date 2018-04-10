<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/11
 * Time: 00:59
 */
class History {
    /**
     * Returns the history of a pet owner, i.e., the service he/she has received from others.
     * @return array
     */
    public static function getOwnerHistory(): array {
        $db = new Database();
        $query = "SELECT o.provider AS person, h.pet_name, o.start_date, o.end_date, b.points "
            ."FROM service_offers o INNER JOIN bidding b ON o.service_id = b.service_id "
            . "INNER JOIN service_history h ON b.service_id = h.service_id AND b.bidder = h.owner AND "
            . " b.pet_name = h.pet_name WHERE h.owner = ?;";
        return $db->query($query, array($_SESSION['username']));
    }

    public static function getTakerHistory(): array {

    }
}