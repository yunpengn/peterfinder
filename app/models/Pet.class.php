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

    /**
     * Checks whether the current user has a pet with this pet name.
     *
     * @param string $petName
     * @return bool
     */
    public static function hasPet(string $petName): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $query = "SELECT * FROM pets WHERE username = ? AND pet_name = ?";
        $result = $db->query($query, array($_SESSION['username'], $petName));
        return !empty($result);
    }

    public static function add(string $petName, string $gender, string $type, string $birthday, string $bio): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        // Makes sure this pet belongs to the current user.
        $query = "INSERT INTO pets (username, pet_name, gender, type, birthday, bio) VALUES (?, ?, ?, ?, ?, ?)";
        return $db->insertOrUpdate($query, array($_SESSION['username'], $petName, $gender, $type, $birthday, $bio));
    }

    public static function getPetInfo(string $petName): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        // Makes sure this pet belongs to the current user.
        $query = "SELECT * FROM pets WHERE username = ? AND pet_name = ?";
        $result = $db->query($query, array($_SESSION['username'], $petName));
        return $result[0];
    }

    public static function updatePetInfo(string $petName, string $gender, string $type, string $birthday, string $bio): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        // Makes sure this pet belongs to the current user.
        $query = "UPDATE pets SET gender = ?, type = ?, birthday = ?, bio = ? WHERE username = ? AND pet_name = ?";
        return $db->insertOrUpdate($query, array($gender, $type, $birthday, $bio, $_SESSION['username'], $petName));
    }
}
