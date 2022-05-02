<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Administrators/AdminModel.php");

class  AdminController extends MainController {
    private $adminManager;

    public function __construct() {
        $this->adminManager = new AdminManager();
    }

    public function droits() {
        $users = $this->adminManager->getUsers();

        $data_page = [
            "page_description" => "Gestion des droits d'utilisateurs",
            "page_title" => "Gestion des droits",
            "page_css" => ["home.css"],
            'users' => $users,
            "view" => "Views/Administrators/droits.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}