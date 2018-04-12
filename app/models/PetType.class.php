<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/09
 * Time: 10:06
 */
class PetType {
    public static function getAllTypes(): array {
        $db = new Database();
        $query = "SELECT type, root_type FROM pet_types;";
        $result = $db->query($query, array());
        return $result;
    }
}