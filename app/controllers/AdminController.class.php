<?php

class AdminController extends Controller {
    /**
     * Handles the admin all data listing & managing logic.
     *
     * @param array $data is the parameters passed in.
     * @throws NotFoundException when the page is not found.
     */
    public function index($data = array()) {
        $data["pets"] = Admin::myPets();
        $this->show("Admin/index", $data);
    }
}

