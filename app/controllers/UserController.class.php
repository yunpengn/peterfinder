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

        if ($authorized) {
            $_SESSION["isOwner"] = $_SESSION["isPeter"] = false;
            $user_result = User::getUserType($_SESSION['username']);

            for ($i = 0; $i < count($user_result); $i++) {
                if ($user_result[$i]["type"] == "owner") {
                    $_SESSION["isOwner"] = true;
                } else if ($user_result[$i]["type"] == "peter") {
                    $_SESSION["isPeter"] = true;
                }
            }
        }

        if (!$authorized) {
            $data["errorMessage"] = "You have entered an invalid username/email address or password";
            $data["username"] = $usernameOrEmail;
            $data["password"] = $password;
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
        $type = $_POST["type"];

        $result = User::signUp($username, $email, $password, $type);
        if ($result) {
            $_SESSION['authorized'] = true;
            $_SESSION['username'] = $username;
            $this->show("index", $data);
        } else {
            $data["errorMessage"] = "Username/email address has registered.";
            $data["username"] = $username;
            $data["email"] = $email;
            $data["type"] = $type;
            $this->show("User/signup", $data);
        }
    }

    /**
     * Handles the user forget password logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function forgetPassword($data = array()) {
        if (!isset($_POST["email"])) {
            $this->show("User/forgetPassword", $data);
            return;
        }
        $email = $_POST["email"];
        $subject = "Forget Password - Peter Finder";
        $body = "This is a request to change your password for your account at Peter Finder.";

        if (User::hasByEmail($email)) {
            try {
                Mailer::email($email, $subject, $body);
                $data["successMessage"] = "An email has been sent to your email.";
            } catch (Exception $e) {
                $data["errorMessage"] = "Unable to sent the email." . $e->getMessage();
            }
        }

        $this->show("User/forgetPassword", $data);
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

    /**
     * Handles the user settings logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function settings($data = array()) {
        if (!empty($_POST)) {
            $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
            $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "unknown";
            $telephone = isset($_POST["telephone"]) ? $_POST["telephone"] : "";
            $bio = isset($_POST["bio"]) ? $_POST["bio"] : "";
            User::updateCurrentUserInfo($last_name, $first_name, $gender, $telephone, $bio);
        }
        $info = User::getCurrentUserInfo();
        // We should not reveal the hashed password to the client side. This can be dangerous.
        unset($info["password"]);
        if (!empty($_POST)) {
            $data["successMessage"] = "Your profile has been updated successfully.";
        }
        $this->show("User/settings", array_merge($data, $info));
    }
}

