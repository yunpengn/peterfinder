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
}