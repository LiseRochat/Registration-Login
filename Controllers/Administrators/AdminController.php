<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Administrators/AdminModel.php");

class  AdminController extends MainController {
    private $adminManager;

    public function __construct() {
        $this->adminManager = new AdminManager();
    }

    public function droits() {
        echo "droits";
    }
    
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}