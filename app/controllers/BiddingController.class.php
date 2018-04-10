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
        if (!empty($_POST)) {
            $bidPoint = isset($_POST["bid_point"]) ? $_POST["bid_point"] : 0;
            if (Bidding::updateBidPoint($bidPoint, $serviceId)) {
                $data["successMessage"] = "Your bidding point has been updated.";
                $this->index($data);
                return;
            } else {
                $data["errorMessage"] = "Something went wrong. Your bidding point cannot be updated.";
            }
        }
        $data = array_merge($data, Bidding::getBidPoint($serviceId));
        $this->show("Bidding/editBidding", $data);
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

