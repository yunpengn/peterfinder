<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/11
 * Time: 00:59
 */
class HistoryController extends Controller {
    /**
     * Shows all the service histories.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function index($data = array()) {
        if (!$this->hasLogin()) {
            header("Location:" . APP_URL);
            return;
        }
        $this->show("Offer/index", $data);
    }
}