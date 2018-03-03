<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/03
 * Time: 13:03
 */
class User {
    public static function find($username) {
        $db = new Database();
        $query = "SELECT * FROM users WHERE username = ?";
        $result = $db->query($query, array($username));
        return $result;
    }
}
