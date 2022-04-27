<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Users/UserModel.php");

class UsersController extends MainController {
    private $UserManager;

    public function __construct() {
        $this->UserManager = new UserManager();
    }

    public function validationLogin($email, $password) {
        if($this->UserManager->isValide($email, $password)) {
            if($this->UserManager->isAccountValid($email)) {
                ToolBox::addMessageAlert("Bon retour sur le site ".$email);
                $_SESSION['profil'] = [
                    'email' => $email,
                ];
                header("Location:".URL."compte/profil");
            } else {
                ToolBox::addMessageAlert("Le compte ".$email." n'a pas été activé par mail.");
                header("Location:".URL."login");
            }
        } else {
            ToolBox::addMessageAlert("Combinaison Email / Mot de passe non valide");
            header("Location:".URL."login");
        }
    }
    
    public function profil() {
        $datas = $this->UserManager->getUserInformation($_SESSION['profil']['email']);
        $data_page = [
            "page_description" => "Page de Profil",
            "page_title" => "Mon Profil",
            "user" => $datas,
            "page_css" => ["home.css"],
            "view" => "Views/Users/profil.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }
    // Heritage
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}