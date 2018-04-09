<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/03/05
 * Time: 11:12
 */
class PetController extends Controller {
    /**
     * Handles the pet listing logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        $data["pets"] = Pet::myPets();
        $this->show("Pet/index", $data);
    }

    /**
     * @param array $data
     * @throws NotFoundException
     */
    public function new($data = array()) {
        if (!empty($_POST)) {
            if (!isset($_POST["pet_name"])) {
                $this->index($data);
                return;
            }
            $petName = $_POST["pet_name"];
            if (Pet::hasPet($petName)) {
                $data["errorMessage"] = "You already have a pet with this name. Please use a different one.";
            } else {
                $gender = isset($_POST["gender"]) ? $_POST["gender"] : "unknown";
                $type = isset($_POST["type"]) ? $_POST["type"] : "";
                $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "NULL";
                $bio = isset($_POST["bio"]) ? $_POST["bio"] : "";
                if (Pet::add($petName, $gender, $type, $birthday, $bio)) {
                    $data["successMessage"] = "Your pet " . $petName . " has been added.";
                    $this->index($data);
                    return;
                } else {
                    $data["errorMessage"] = "Something went wrong. Your pet cannot be added.";
                }
            }
        }
        $data["types"] = PetType::getAllTypes();
        $this->show("Pet/new", $data);
    }

    /**
     * Edits the information about an existing pet.
     *
     * @param array $data
     * @throws NotFoundException
     */
    public function edit($data = array()) {
        if (!isset($data["pet_name"])) {
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
}

