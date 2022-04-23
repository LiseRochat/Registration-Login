<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Visitors/VisitorsModel.php");

class UsersController extends MainController {
    // private $visitorManager;

    // public function __construct() {
    //     $this->visitorManager = new VisitorsManager();
    // }

    public function validationLogin($email, $password) {
        
    }

  
    // Heritage
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}