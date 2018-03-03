<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/02/25
 * Time: 19:08
 */
class Home extends Controller {
    public function __construct() {
        // Utilizes auto-loading here.
        spl_autoload_register(array("App", "myAutoLoader"));
    }

    /**
     * The main page for the application.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        $this->show("index", $data);
    }

    /**
     * Handles the user login logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function login($data = array()) {
        $_SESSION['authorized'] = true;
        $user = User::find($_POST["username"]);
        $_SESSION['username'] = $user['username'];
        $this->show("index", $data);
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
