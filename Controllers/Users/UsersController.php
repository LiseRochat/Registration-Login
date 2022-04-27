<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Users/UserModel.php");

class UsersController extends MainController {
    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    public function validationLogin($email, $password) {
        if($this->UserManager->isValide($email, $password)) {
            
        } else {
            ToolBox::addMessageAlert("Combinaison Mogon / Mot de passe non valide");
            header("Location:".URL."login");
        }
    }

  
    // Heritage
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}