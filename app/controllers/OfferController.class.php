<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/01
 * Time: 00:47
 */
class OfferController extends Controller {
    /**
     * Handles the offer listing logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        $this->show("Offer/index", $data);
    }


	/**
     * Handles the offer creating logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function createOffer($data = array()) {
    	if (empty($_POST)) {
    		$this->show("Offer/createOffer", $data);
            return;
    	}
    	$username = $_SESSION["username"];
    	$start_date = $_POST["start_date"]." 00:00:00";
    	$end_date = $_POST["end_date"]." 00:00:00";
    	$decision_deadline = $_POST["decision_deadline"];
    	$expected_salary = $_POST["expected_salary"];

    	$result = Offer::createOffer($username, $start_date, $end_date, $decision_deadline, $expected_salary);
    	if ($result) {
    		header("Location:" . APP_URL."/Offer");
    	} else {
    		$data["errorMessage"] = "invalid input data";
    		$data["username"] = $username;
    		$data["start_date"] = $start_date;
    		$data["end_date"] = $end_date;
    		$data["decision_deadline"] = $decision_deadline;
    		$data["expected_salary"] = $expected_salary;
    		$this->show("Offer/createOffer", $data);
    	}
    }


    public function editOffer($data = array()) {
    	if (!isset($_GET["service_id"])) {
    		header("Location:" . APP_URL."/Offer");
    		return;
    	}
    	$data["service_id"] = $_GET["service_id"];
		$username = $_SESSION["username"];

    	if (!isset($data["offer"])) {
    		$query_data = Offer::queryOffer($data["service_id"]);
    		$data["offer"] = $query_data[0];
    	}
    	// if error in querying, back to Offer index page
    	if (empty($data["offer"])) {
    		header("Location:" . APP_URL."/Offer");
    		return;
    	}
    	if (empty($_POST)) {
    		$data["username"] = $username;
    		$data["start_date"] = $data["offer"]["start_date"];
    		$data["end_date"] = $data["offer"]["end_date"];
    		$data["decision_deadline"] = $data["offer"]["decision_deadline"];
    		$data["expected_salary"] = $data["offer"]["expected_salary"];
    		$this->show("Offer/editOffer", $data);
    		return;
    	}

		$data["offer"]["start_date"] = $_POST["start_date"]." 00:00:00";
    	$data["offer"]["end_date"] = $_POST["end_date"]." 00:00:00";
    	$data["offer"]["decision_deadline"] = $_POST["decision_deadline"];
    	$data["offer"]["expected_salary"] = $_POST["expected_salary"];

    	$result = Offer::editOffer($data["service_id"], $data["offer"]["start_date"], $data["offer"]["end_date"],
    		$data["offer"]["decision_deadline"], $data["offer"]["expected_salary"] );
    	if ($result) {
    		header("Location:" . APP_URL."/Offer");
    	} else {
    		$data["errorMessage"] = "invalid input data";
    		$data["username"] = $username;
    		$this->show("Offer/editOffer", $data);
    	}
    }
}