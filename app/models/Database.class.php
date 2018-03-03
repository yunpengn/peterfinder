<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/03
 * Time: 12:47
 */
class Database {
    // The PHP database object (PDO).
    var $db;

    public function __construct() {
        // To establish connection to the database.
        try {
            $this->db = new PDO(DSN, DB_USER, DB_PASSWORD);
            // Set the error mode to throw exceptions.
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Catch the potential exception here for defensive programming practice.
            die("Cannot connect to the database. ". $e->getMessage() . "<br>");
        }
    }

    public function query($query, $variables = array()) {
        // Prepared statement for query to the database later (to avoid SQL injection attack).
        $stmt = $this->db->prepare($query);

        // Query to the database or report error.
        try {
            $stmt->execute($variables);
        } catch (PDOException $e) {
            // Catch the potential exception here for defensive programming practice.
            die("Cannot query to the database. ". $e->getMessage() . "<br>");
        }

        // Fetch the first row returned by the statement to an associate array.
        // Avoid using $stmt->rowCount() here due to known compatibility issues.
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}