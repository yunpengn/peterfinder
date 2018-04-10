<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/01
 * Time: 00:47
 */
class OfferController extends Controller {
    /**
     * Lists all opening offers.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        if (!$this->hasLogin()) {
            header("Location:" . APP_URL);
            return;
        }
        $data["offers"] = Offer::all();
        $this->show("Offer/index", $data);
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function myOffers($data = array()) {
        if (!$this->hasLogin() || !$this->isCareTaker()) {
            header("Location:" . APP_URL . "/Offer/index");
            return;
        }
        $data["offers"] = Offer::queryOfferByProvider($_SESSION["username"]);
        $this->show("Offer/myOffers", $data);
    }

	/**
     * Creates a new offer.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function create($data = array()) {
        if (!$this->hasLogin() || !$this->isCareTaker()) {
            header("Location:" . APP_URL . "/Offer/index");
            return;
        }
    	if (empty($_POST)) {
            $data["pet_types"] = PetType::getAllTypes();
    		$this->show("Offer/create", $data);
            return;
    	}

    	$username = $_SESSION["username"];
    	$start_date = $_POST["start_date"];
    	$end_date = $_POST["end_date"];
    	$decision_deadline = $_POST["decision_deadline"] . " 00:00:00";
    	$expected_salary = $_POST["expected_salary"];
    	$type_selected = $_POST["type_selected"];

    	if (Offer::create($username, $start_date, $end_date, $decision_deadline, $expected_salary, $type_selected)) {
            $data["successMessage"] = "Your service offer has been created.";
            $this->index($data);
    	} else {
    		$data["errorMessage"] = "Some input data is invalid. Please check again.";
    		$data["username"] = $username;
    		$data["start_date"] = $start_date;
    		$data["end_date"] = $end_date;
    		$data["decision_deadline"] = $decision_deadline;
    		$data["expected_salary"] = $expected_salary;
    		$data["type_selected"] = $type_selected;
            $data["pet_types"] = PetType::getAllTypes();
    		$this->show("Offer/create", $data);
    	}
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function edit($data = array()) {
        if (!$this->hasLogin() || !$this->isCareTaker()) {
            header("Location:" . APP_URL . "/Offer/index");
            return;
        }
    	if (!isset($_GET["service_id"]) ||  !Offer::checkOfferCreator($data["service_id"], $_SESSION["username"])) {
    		header("Location:" . APP_URL."/Offer/myOffers");
    		return;
    	}

        $data["pet_types"] = PetType::getAllTypes();
    	if (empty($_POST)) {
            $data = array_merge($data, Offer::queryOffer($data["service_id"])[0]);
            $data["type_selected"] = Offer::queryServiceTarget($data["service_id"]);
            $this->show("Offer/edit", $data);
    		return;
    	}

    	$result = Offer::editOffer($data["service_id"], $data["start_date"], $data["end_date"],
    		$data["decision_deadline"], $data["expected_salary"], $data["type_selected"]);
    	if ($result) {
    		$message = "?successMessage=Successfully editing the offer!";
    		header("Location:" . APP_URL."/Offer/myOffers" . $message);
    	} else {
    		$data["errorMessage"] = "Invalid input data. Cannot edit the offer";
    		$this->show("Offer/edit", $data);
    	}
    }

    public function delete($data = array()) {
        if (!$this->hasLogin() || !$this->isCareTaker()) {
            header("Location:" . APP_URL . "/Offer/index");
            return;
        }
    	if (!isset($data["service_id"])) {
    		header("Location:" . APP_URL."/Offer/index");
    		return;
    	}

		if (Offer::delete($data["service_id"])) {
    		$message = "?successMessage=Successfully deleting the offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	} else {
    		$message = "?errorMessage=Error when deleting the offer!";
    		header("Location:" . APP_URL."/Offer/index".$message);
    	}
    }
}

