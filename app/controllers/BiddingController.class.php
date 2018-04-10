<?php

class BiddingController extends Controller {
    /**
     * Handles the bidding listing logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        $data["my_bidding"] = Bidding::myBiddings();
        $data["others_bidding"] = Bidding::othersBiddings();
        $this->show("Bidding/index", $data);
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function create($data = array()) {
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
                $data["successMessage"] = "Your bidding point has been updated.";
                $this->index($data);
                return;
            } else {
                $data["errorMessage"] = "Something went wrong. Your bidding point cannot be updated.";
            }
        }
        $data = array_merge($data, Bidding::getBidPoint($serviceId, $petName));
        $this->show("Bidding/editBidding", $data);
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

