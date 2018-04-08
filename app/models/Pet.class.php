<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/05
 * Time: 11:17
 */
class Pet {
    /**
     * @return array 2D-array representing all pets belonging to the current user.
     */
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

    public static function queryType(): array {
    	$db = new Database();
        $query = "SELECT type FROM pet_types";
        
        return $db->query($query, array());
    }

    public static function getPetInfo(string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM pets WHERE username = ? AND petname = ?";
        $result = $db->query($query, array($_SESSION['username'], $petName));
        return $result[0];
    }
}

