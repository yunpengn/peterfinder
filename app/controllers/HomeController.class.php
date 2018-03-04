<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/02/25
 * Time: 19:08
 */
class HomeController extends Controller {
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
}
