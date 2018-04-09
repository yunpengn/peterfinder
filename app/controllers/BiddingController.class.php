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
     * Edits the information about an existing pet.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function edit($data = array()) {
        if (!isset($data["provider"])) {
            $this->index($data);
            return;
        }
        $petName = $data["pet_name"];
        if (!empty($_POST)) {
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "unknown";
            $type = isset($_POST["type"]) ? $_POST["type"] : "";
            $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "NULL";
            $bio = isset($_POST["bio"]) ? $_POST["bio"] : "";
            if (Pet::updatePetInfo($petName, $gender, $type, $birthday, $bio)) {
                $data["successMessage"] = "Your pet " . $petName . " 's information has been updated.";
                $this->index($data);
                return;
            } else {
                $data["errorMessage"] = "Something went wrong. Your pet's information cannot be updated.";
            }
        }
        $data = array_merge($data, Pet::getPetInfo($petName));
        $data["types"] = PetType::getAllTypes();
        $this->show("Pet/edit", $data);
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function delete($data = array()) {
        if (!isset($data["pet_name"])) {
            $this->index($data);
            return;
        }
        $petName = $data["pet_name"];
        if (Pet::delete($petName)) {
            $data["successMessage"] = "Your pet " . $petName . " has been removed.";
        } else {
            $data["errorMessage"] = "Something went wrong. Your pet cannot be removed.";
        }
        $this->index($data);
    }
}

