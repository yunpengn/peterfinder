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
        $query = "SELECT o.service_id, o.provider AS person, h.pet_name, o.start_date, o.end_date "
            . ", b.points, h.review_for_taker AS review, h.rating_for_taker AS rating "
            ."FROM service_offers o INNER JOIN bidding b ON o.service_id = b.service_id "
            . "INNER JOIN service_history h ON b.service_id = h.service_id AND b.bidder = h.owner AND "
            . " b.pet_name = h.pet_name WHERE h.owner = ?;";
        return $db->query($query, array($_SESSION['username']));
    }

    /**
     * Returns the history of a care taker, i.e., the service he/she has provided to others.
     * @return array
     */
    public static function getTakerHistory(): array {
        $db = new Database();
        $query = "SELECT o.service_id, h.owner AS person, h.pet_name, o.start_date, o.end_date "
            . ", b.points, h.review_for_owner AS review, h.rating_for_owner AS rating "
            ."FROM service_offers o INNER JOIN bidding b ON o.service_id = b.service_id "
            . "INNER JOIN service_history h ON b.service_id = h.service_id AND b.bidder = h.owner AND "
            . " b.pet_name = h.pet_name WHERE o.provider = ?;";
        return $db->query($query, array($_SESSION['username']));
    }

    public static function getReviewForTaker(string $serviceId): array {
        $db = new Database();
        $query = "SELECT review_for_taker, rating_for_taker FROM service_history WHERE service_id = ?;";
        return $db->query($query, array($serviceId))[0];
    }

    public static function getReviewForOwner(string $serviceId): array {
        $db = new Database();
        $query = "SELECT review_for_owner, rating_for_owner FROM service_history WHERE service_id = ?;";
        return $db->query($query, array($serviceId))[0];
    }

    public static function updateReviewForTaker(string $serviceId, string $review, string $rating): bool {
        $db = new Database();
        $query = "UPDATE service_history SET review_for_taker = ?, rating_for_taker = ? WHERE service_id = ?;";
        return $db->insertOrUpdate($query, array($review, $rating, $serviceId));
    }

    public static function updateReviewForOwner(string $serviceId, string $review, string $rating): bool {
        $db = new Database();
        $query = "UPDATE service_history SET review_for_owner = ?, rating_for_owner = ? WHERE service_id = ?;";
        return $db->insertOrUpdate($query, array($review, $rating, $serviceId));
    }
}
