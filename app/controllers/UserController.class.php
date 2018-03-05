<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/05
 * Time: 01:25
 */
class UserController extends Controller {
    /**
     * Handles the user login logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function login($data = array()) {
        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            $this->show("User/login", $data);
            return;
        }
        $usernameOrEmail = $_POST["username"];
        $password = $_POST["password"];
        $authorized = false;

        // Validates by username.
        $result = User::validateByName($usernameOrEmail, $password);
        if (!empty($result)) {
            $_SESSION['authorized'] = true;
            $_SESSION['username'] = $result['username'];
            $authorized = true;
        }

        // Validates by email.
        $result = User::validateByEmail($usernameOrEmail, $password);
        if (!empty($result)) {
            $_SESSION['authorized'] = true;
            $_SESSION['username'] = $result['username'];
            $authorized = true;
        }

        if (!$authorized) {
            $data["errorMessage"] = "You have entered an invalid username/email address or password";
            $this->show("User/login", $data);
        } else {
            $this->show("index", $data);
        }
    }

    /**
     * Handles the user signup logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function signup($data = array()) {
        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            $this->show("User/signup", $data);
            return;
        }
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        echo $_POST["type"];
        $this->show("User/signup", $data);
    }

    /**
     * Handles the user logout logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function logout($data = array()) {
        // Empty the whole _SESSION array.
        $_SESSION = array();
        // Clear the session ID saved in the local cookie if necessary.
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 1, "/");
        }
        // Clear the data stored on the server.
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        $this->show("index", $data);
    }
}