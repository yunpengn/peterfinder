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

    /**
     * Signs up 
     * @param string $username to insert
     * @param string $email to insert
     * @param string $password to insert
     * @param string $type to insert
     * @return true if sign up success.
     */
    public static function signUp(string $username, string $email, string $password, string $type): bool {
        $db = new Database();
        $query = array();
        $params = array();

        // Creates a new row in the user table.
        array_push($query, "INSERT INTO users(username, password, email) VALUES (?, ?, ?)");
        array_push($params, array($username, password_hash($password, PASSWORD_BCRYPT), $email));

        // Creates a new owner row in the profile table.
        if ($type == "owner" || $type == "both") {
            array_push($query, "INSERT INTO user_profiles(username, type, score) VALUES (?, ?, ?)");
            array_push($params, array($username, "owner", 0));
        }

        // Creates a new care taker row in the profile table.
        if ($type == "peter" || $type == "both") {
            array_push($query, "INSERT INTO user_profiles(username, type, score) VALUES (?, ?, ?)");
            array_push($params, array($username, "peter", 0));
        }

        // Uses a transaction here to ensure atomicity.
        return $db->transact($query, $params);
    }

    /**
     * @return array of the user row in database; empty array if not signed in.
     */
    public static function getCurrentUserInfo(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT * FROM users WHERE username = ?";
        $result = $db->query($query, array($_SESSION['username']));
        return $result[0];
    }

    public static function updateCurrentUserInfo(string $last_name, string $first_name, string $gender, string $telephone, string $bio): bool {
        if (!isset($_SESSION['username'])) {
            return false;
        }
        $db = new Database();
        $query = "UPDATE users SET last_name = ?, first_name = ?, gender = ?, telephone = ?, bio = ? WHERE username = ?";
        $params = array($last_name, $first_name, $gender, $telephone, $bio, $_SESSION['username']);
        return $db->insertOrUpdate($query, $params);
    }

    public static function getUserType(string $username):array {
        $db = new Database();
        $query = "SELECT type FROM user_profiles WHERE username = ?";
        return $db->query($query, array($username));
    }
}

