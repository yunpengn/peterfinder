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

        $data["ownerHistory"] = $this->isPetOwner() ? History::getOwnerHistory() : array();
        $data["takerHistory"] = $this->isCareTaker() ? History::getTakerHistory() : array();
        $this->show("History/index", $data);
    }

    public function reviewForTaker($data = array()) {
        if (!$this->hasLogin() || !$this->isPetOwner() || !isset($_GET["service_id"])) {
            header("Location:" . APP_URL . "History/index");
            return;
        }
        if (isset($_POST["review"]) && isset($_POST["rating"])) {
            if(History::updateReviewForTaker($_GET["service_id"], $_POST["review"], $_POST["rating"])) {
                $this->index($data);
                return;
            }
        }
        $data = array_merge($data, History::getReviewForTaker($_GET["service_id"]));
        $this->show("History/reviewForTaker", $data);
    }

    public function reviewForOwner($data = array()) {
        if (!$this->hasLogin() || !$this->isCareTaker() || !isset($_GET["service_id"])) {
            header("Location:" . APP_URL . "History/index");
            return;
        }
        if (isset($_POST["review"]) && isset($_POST["rating"])) {
            if(History::updateReviewForOwner($_GET["service_id"], $_POST["review"], $_POST["rating"])) {
                $this->index($data);
                return;
            }
        }
        $data = array_merge($data, History::getReviewForOwner($_GET["service_id"]));
        $this->show("History/reviewForOwner", $data);
    }
}
