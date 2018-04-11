<?php

class BiddingController extends Controller {
    /**
     * Handles the bidding listing logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        if (!$this->hasLogin()) {
            header("Location:" . APP_URL);
            return;
        }

        if (isset($_GET["service_id"]) && isset($_GET["bidder"])) {
            $service_id = $_GET["service_id"];
            $bidder = $_GET["bidder"];
            $offerProvider = $_SESSION["username"];

            if (Offer::checkOfferCreator($service_id, $offerProvider)) {
                $result = Bidding::assignSucceedForBidding($service_id, $bidder);
                if ($result) {
                    $data["successMessage"] = "Bidding status has been updated.";
                } else {
                    $data["errorMessage"] = "Something went wrong. Bidding status cannot be updated.";
                }
            }
        }

        $data["my_bidding"] = $this->isPetOwner() ? Bidding::myBiddings() : array();
        $data["others_bidding"] = $this->isCareTaker() ? Bidding::othersBiddings() : array();
        $this->show("Bidding/index", $data);
    }

    /**
     * Creates a new bidding for a certain service offer.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function create($data = array()) {
        if (!$this->hasLogin() || !$this->isPetOwner() || !isset($_GET["service_id"])) {
            header("Location:" . APP_URL . "/Bidding/index");
            return;
        }
        if (Bidding::hasBidding($_GET["service_id"], $_SESSION['username'])) {
            header("Location:" . APP_URL . "/Bidding/edit?service_id=" . $_GET["service_id"]);
            return;
        }
        if(empty($_POST)) {
            $data = array_merge($data, Offer::queryOffer($_GET["service_id"]));
            $data["valid_pets"] = Bidding::getValidPets($_GET["service_id"], $_SESSION['username']);
            $data["info"] = Bidding::getBiddersInfo($_GET["service_id"]);
            $this->show("Bidding/create", $data);
            return;
        }
        if (Bidding::create($_GET["service_id"], $data['pet_name'], $data["points"])) {
            $message = "You have successfully submitted the bidding for your pet.";
            header("Location:" . APP_URL . "/Bidding/index?successMessage=" . $message);
        } else {
            $data = array_merge($data, Offer::queryOffer($_GET["service_id"]));
            $data["valid_pets"] = Bidding::getValidPets($_GET["service_id"], $_SESSION['username']);
            $data["info"] = Bidding::getBiddersInfo($_GET["service_id"]);
            $this->show("Bidding/create", $data);
        }
    }

    /**
     * Lists bidding details of a specific bidding.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function listDetails($data = array()) {
        if (!isset($data["service_id"])) {
            $this->index($data);
            return;
        }
        $serviceId = $data["service_id"];
        $petName = $data["pet_name"];
        $data = array_merge($data, Bidding::getBiddingRecord($serviceId, $petName));
        $data["bidders_info"] = Bidding::getBiddersInfo($serviceId);
        $this->show("Bidding/listBiddingDetails", $data);
    }

    /**
     * Edits the bidding point of a specific bidding.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function edit($data = array()) {
        if (!isset($data["service_id"])) {
            $this->index($data);
            return;
        }
        $serviceId = $data["service_id"];
        $petName = $data["pet_name"];

        if (!empty($_POST)) {
            $bidPoint = isset($_POST["bid_point"]) ? $_POST["bid_point"] : 0;
            if (Bidding::updateBidPoint($bidPoint, $serviceId, $petName)) {
                $message = "Your bidding has been updated.";
                header("Location:" . APP_URL . "/Bidding/index?successMessage=" . $message);
                return;
            } else {
                $data["errorMessage"] = "Something went wrong. Your bidding point cannot be updated.";
                $this->show("Bidding/edit", $data);
                return;
            }
        }
        $data["bid_point"] = Bidding::getBidPoint($serviceId, $petName)["points"];
        $this->show("Bidding/edit", $data);
    }

    /**
     * Edits the bidding status of a specific bidding.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function updateStatus($data = array()) {
        if (!isset($data["service_id"])) {
            $this->index($data);
            return;
        }
        $serviceId = $data["service_id"];
        $bidder = $data["bidder"];
        $petName = $data["pet_name"];
        if (!empty($_POST)) {
            $bidStatus = isset($_POST["bid_status"]) ? $_POST["bid_status"] : "pending";
            if (Bidding::updateBidStatus($bidStatus, $serviceId, $bidder, $petName)) {
                $data["successMessage"] = "Bidding status has been updated.";
                $this->index($data);
                return;
            } else {
                $data["errorMessage"] = "Something went wrong. Bidding status cannot be updated.";
            }
        }
        $data = array_merge($data, Bidding::getBidStatus($serviceId, $bidder, $petName));
        $this->show("Bidding/updateBiddingStatus", $data);
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function delete($data = array()) {
        if (!isset($data["service_id"])) {
            $this->index($data);
            return;
        }
        $serviceId = $data["service_id"];
        if (Bidding::delete($serviceId)) {
            $data["successMessage"] = "Your bidding has been removed.";
        } else {
            $data["errorMessage"] = "Something went wrong. Your bidding cannot be removed.";
        }
        $this->index($data);
    }
}

