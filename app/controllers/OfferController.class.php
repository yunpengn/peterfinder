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
    	if (!isset($_GET["message"])) {
    		$data["message"] = $_GET["message"];
    	}
        $this->show("Offer/index", $data);
    }


	/**
     * Handles the offer creating logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function createOffer($data = array()) {
    	if (!isset($data["pet_types"])) {
    		$query_data = PetType::getAllTypes();
    		$data["pet_types"] = $query_data;
    		$data["type_selected"] = array();
    	}

    	if (empty($_POST)) {
    		$this->show("Offer/createOffer", $data);
            return;
    	}
    	$username = $_SESSION["username"];
    	$start_date = $_POST["start_date"];
    	$end_date = $_POST["end_date"];
    	$decision_deadline = $_POST["decision_deadline"]." 00:00:00";
    	$expected_salary = $_POST["expected_salary"];
    	$type_selected = $_POST["type_selected"];

    	$result = Offer::createOffer($username, $start_date, $end_date, $decision_deadline, $expected_salary, $type_selected);
    	if ($result) {
    		$message = "?message=Successfully creating new offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	} else {
    		$data["errorMessage"] = "invalid input data";
    		$data["username"] = $username;
    		$data["start_date"] = $start_date;
    		$data["end_date"] = $end_date;
    		$data["decision_deadline"] = $decision_deadline;
    		$data["expected_salary"] = $expected_salary;
    		$data["type_selected"] = $type_selected;
    		$this->show("Offer/createOffer", $data);
    	}
    }


    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function editOffer($data = array()) {
    	if (!isset($_GET["service_id"])) {
    		header("Location:" . APP_URL."/Offer/index");
    		return;
    	}

    	$data["service_id"] = $_GET["service_id"];
		$username = $_SESSION["username"];

		// check whether the service is created the user
		if (!isset($data["check_user"])) {
			$data["check_user"] = Offer::checkOfferCreator($data["service_id"], $username);
		}
		if (!$data["check_user"]) {
			$message = "?message=You have no right to change that offer!";
			header("Location:" . APP_URL."/Offer/index".$message);
		}

    	if (!isset($data["start_date"])) {
    		$query_data = Offer::queryOffer($data["service_id"]);
    		$query_data = $query_data[0];

    		if (empty($query_data)) {
				// if error in querying, back to Offer index page
				$message = "?message=Error when loading data!";
				header("Location:" . APP_URL."/Offer/index".$message);
    			return;
			}

    		$data["username"] = $username;
    		$data["start_date"] = $query_data["start_date"];
    		$data["end_date"] = $query_data["end_date"];
    		$data["decision_deadline"] = $query_data["decision_deadline"];
    		$data["expected_salary"] = $query_data["expected_salary"];

    		$query_data = PetType::getAllTypes();
    		$data["pet_types"] = $query_data;
    		$data["type_selected"] = array();
    	}
    	
    	if (empty($_POST)) {
    		$this->show("Offer/editOffer", $data);
    		return;
    	}

		$data["start_date"] = $_POST["start_date"];
    	$data["end_date"] = $_POST["end_date"];
    	$data["decision_deadline"] = $_POST["decision_deadline"]." 00:00:00";
    	$data["expected_salary"] = $_POST["expected_salary"];
    	$data["type_selected"] = $_POST["type_selected"];

    	$result = Offer::editOffer($data["service_id"], $data["start_date"], $data["end_date"],
    		$data["decision_deadline"], $data["expected_salary"], $data["type_selected"]);
    	if ($result) {
    		$message = "?message=Successfully editing the offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	} else {
    		$data["errorMessage"] = "invalid input data";
    		$data["username"] = $username;
    		$this->show("Offer/editOffer", $data);
    	}
    }

    public function deleteOffer($data = array()) {
    	if (!isset($_GET["service_id"])) {
    		header("Location:" . APP_URL."/Offer/index");
    		return;
    	}

    	$username = $_SESSION["username"];
		// check whether the service is created the user
		$check_user = Offer::checkOfferCreator($_GET["service_id"], $username);

		if (!$check_user) {
			$message = "?message=You have no right to change that offer!";
			header("Location:" . APP_URL."/Offer/index".$message);
		}

		$result = Offer::deleteOffer($_GET["service_id"], $username);
		if ($result) {
    		$message = "?message=Successfully deleting the offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	} else {
    		$message = "?message=Error when deleting the offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	}
    }
}

