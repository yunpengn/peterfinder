<?php
/**
 * The base class for all controllers.
 *
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/02/25
 * Time: 21:27
 */
class Controller {
    /**
     * Displays a certain page to the user.
     *
     * @param $page
     * @param array $data is an optional parameter to pass in additional data.
     * @throws NotFoundException when the page is not found.
     */
    public function show($page, $data = array()) {
        extract($data);
        $this->includeNavigation();
        $url = "app/views/" . $page . ".php";

        // Checks whether the page exists.
        if(file_exists($url)){
            require $url;
        } else {
            throw new NotFoundException("The given view " . $page . "cannot be found.");
        }
    }

    /**
     * @throws NotFoundException when the page is not found.
     */
    private function includeNavigation() {
        $url = "app/views/nav.php";

        // Checks whether the page exists.
        if(file_exists($url)){
            require $url;
        } else {
            throw new NotFoundException("The navigation bar cannot be found.");
        }
    }

    public function hasLogin(): bool {
        return isset($_SESSION['authorized']) && $_SESSION['authorized'] == true;
    }

    public static function logger($msg) {
        $logFile = date('Y-m-d').'.txt';
        $msg = date('Y-m-d H:i:s').' >>> '.$msg."\r\n";
        file_put_contents($logFile, $msg, FILE_APPEND);
    }

    public function isPetOwner(): bool {
        return isset($_SESSION["isOwner"]) && $_SESSION["isOwner"];
    }

    public function isCareTaker(): bool {
        return isset($_SESSION["isPeter"]) && $_SESSION["isPeter"];
    }
}
