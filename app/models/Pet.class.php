<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/05
 * Time: 11:17
 */
class Pet {
    public static function myPets(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM pets WHERE username = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result;
    }

    public static function add(): bool {
        return true;
    }
}