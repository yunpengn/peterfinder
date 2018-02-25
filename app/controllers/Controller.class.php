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
     * @param $page is the name for the page in view.
     * @param array $data is an optional parameter to pass in additional data.
     */
    public function show($page, $data = array()) {
        $url = "app/views/" . $page . ".php";

        // Checks whether the page exists.
        if(file_exists($url)){
            require_once $url;
        }
    }
}