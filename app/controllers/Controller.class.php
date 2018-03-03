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
            require_once $url;
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
            require_once $url;
        } else {
            throw new NotFoundException("The navigation bar cannot be found.");
        }
    }
}