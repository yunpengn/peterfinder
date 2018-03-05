<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/03
 * Time: 13:03
 */
class User {
    /**
     * Checks whether there exists a user with this username.
     * @param string $username to check.
     * @return bool true if there is a user with this username; false otherwise.
     */
    public static function hasByName(string $username): bool {
        $db = new Database();
        $query = "SELECT * FROM users WHERE username = ?";
        $result = $db->query($query, array($username));
        return !empty($result);
    }

    /**
     * Checks whether there exists a user with this email.
     * @param string $email to check.
     * @return bool true if there is a user with this username; false otherwise.
     */
    public static function hasByEmail(string $email): bool {
        $db = new Database();
        $query = "SELECT * FROM users WHERE email = ?";
        $result = $db->query($query, array($email));
        return !empty($result);
    }

    /**
     * Validates a user according to its username and password.
     * @param string $username to check
     * @param string $password to check
     * @return array of the user's information if the validation passes; an empty array otherwise.
     */
    public static function validateByName(string $username, string $password): array {
        $db = new Database();
        $query = "SELECT * FROM users WHERE username = ?";
        $result = $db->query($query, array($username));

        // There should exist one row in the result. Otherwise, it means the user does not exist.
        if (empty($result)) {
            return array();
        }

        // To check whether the password matches with this username.
        // PHP secured password verify function is used (single-way hashed with bCrypt algorithm).
        $result_row = $result[0];
        if (password_verify($password, $result_row['password'])) {
            return $result_row;
        } else {
            return array();
        }
    }

    /**
     * Validates a user according to its email and password.
     * @param string $username to check
     * @param string $password to check
     * @return array of the user's information if the validation passes; an empty array otherwise.
     */
    public static function validateByEmail(string $email, string $password): array {
        $db = new Database();
        $query = "SELECT * FROM users WHERE email = ?";
        $result = $db->query($query, array($email));

        // There should exist one row in the result. Otherwise, it means the user does not exist.
        if (empty($result)) {
            return array();
        }

        // To check whether the password matches with this username.
        // PHP secured password verify function is used (single-way hashed with bCrypt algorithm).
        $result_row = $result[0];
        if (password_verify($password, $result_row['password'])) {
            return $result_row;
        } else {
            return array();
        }
    }
}
