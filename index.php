<?php 
session_start();
// url complete depuis la racine du site (optionnel en cas de probleme pour accéder des ressources)
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));
require_once("./Controllers/Visitors/VisitorsController.php");
require_once("./Controllers/Users/UsersController.php");
require_once("./Controllers/ToolBox.php");
require_once("./Controllers/Security.php");
$visitorController = new VisitorsController();
$userController = new UsersController();

try {
    // Test si l'information index.php?page= est vide 
    if(empty($_GET['page'])) {
        $page= "accueil";

    } else {
        /*
        On sépare la chaine de carcatere de l'url : /produits/casquettes/ avec la fonction explode() de php
        On obtien un tableau contenant les requetes de l'utilisateur tab[1]=produits tab[2]=casquettes
        */
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    // On gère le premier niveau d'url
    switch($page) {
        case "accueil" :
            $visitorController->home();
        break; 
        case "login" :
            $visitorController->login();
        break; 
        case "validationLogin" :
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = Security::secureHTML($_POST['email']);
                $password = Security::secureHTML($_POST['password']);
                $userController->validationLogin($email, $password);
            } else {
                ToolBox::addMessageAlert("Email out mot de passe non renseigné");
                header('Location:'.URL."login");
            }
        break;
        case "creerCompte" : 
            $visitorController->createAccount();
            break;
        case "validationInscription" :
            if( !empty($_POST['email'])
                && !empty($_POST['firstname'])
                && !empty($_POST['lastname'])
                && !empty($_POST['password'])
            ) {
                $email = Security::secureHTML($_POST['email']);
                $firstname = Security::secureHTML($_POST['firstname']);
                $lastname = Security::secureHTML($_POST['lastname']);
                $password = Security::secureHTML($_POST['password']);
                $userController->validationInscription($email, $firstname, $lastname, $password);
            } else {
                ToolBox::addMessageAlert("Les quatres informations sont obligatoire");
                header('Location:'.URL."creerCompte");
            }
            break;
        case "sendBackMailValidation" :
            $userController->sendBackMailValidation($url[1]);
        break;
        case "validationMail" :
            $userManager->validationMailAccount($urm[1],$url[2]);
            break;
        case "compte" :
            if(Security::isConnected()) {
                switch($url[1]) {
                    case "profil" : 
                        $userController->profil();
                    break;
                    case "deconnexion" : 
                        $userController->deconnection();
                    case "validationMoficationMail" :
                        $userController->validationEditMail(Security::secureHTML($_POST['mail']));
                    break;
                    case "modificationMotDePasse" :
                        $userController->editPassword();
                    break;
                    case "validationModificationMotDePasse" :
                        if(!empty($_POST['password']) && !empty($_POST['newPassword']) && !empty($_POST['newPasswordConf']) ) {
                            $oldPassword = Security::secureHTML($_POST['password']);
                            $newPassword = Security::secureHTML($_POST['newPassword']);
                            $newPasswordConf = Security::secureHTML($_POST['newPasswordConf']);
                            $userController->validationEditPassword($oldPassword, $newPassword, $newPasswordConf);   
                        } else {
                            ToolBox::addMessageAlert("Vous navez pas renseignez toutes les informations");
                            header('Location:'.URL."compte/modificationMotDePasse");
                        }
                        
                    break;
                    case "suppressionCompte" :
                        $userController->deleteAccount();
                    break;
                    default : throw new Exception("La page n'existe pas !");
                }
            } else {
                ToolBox::addMessageAlert("Veuillez vous connecter");
                header('Location:'.URL."login");
            }
            
        // Classe existante de base de php pour gérer toutes les exceptions utilisateur.
        default : throw new Exception("La page n'existe pas !");
    }
} catch (Exception $e) {
    $visitorController->pageErrors($e->getMessage());
}