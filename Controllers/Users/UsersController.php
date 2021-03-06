<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Users/UserModel.php");

class UsersController extends MainController
{
    private $UserManager;

    public function __construct()
    {
        $this->UserManager = new UserManager();
    }

    public function validationLogin($email, $password)
    {
        if ($this->UserManager->isValid($email, $password)) {
            if ($this->UserManager->isAccountValid($email)) {
                ToolBox::addMessageAlert("Bon retour sur le site " . $email);
                $_SESSION['profil'] = [
                    'email' => $email,
                ];
                Security::generateCookieConnection();
                header("Location:" . URL . "compte/profil");
            } else {
                $msg = "Le compte " . $email . " n'a pas été activé par mail.";
                $msg .= "<a href='sendBackMailValidation/.$email.'> Renvoyez le mail de validation</a>";
                ToolBox::addMessageAlert($msg);
                header("Location:" . URL . "login");
            }
        } else {
            ToolBox::addMessageAlert("Combinaison Email / Mot de passe non valide");
            header("Location:" . URL . "login");
        }
    }

    public function profil()
    {
        $datas = $this->UserManager->getUserInformation($_SESSION['profil']['email']);
        $_SESSION['profil']["role"] = $datas['role'];
        $data_page = [
            "page_description" => "Page de Profil",
            "page_title" => "Mon Profil",
            "user" => $datas,
            "page_css" => ["d-none.css"],
            "page_js" => ["profil.js"],
            "view" => "Views/Users/profil.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function deconnection()
    {
        unset($_SESSION['profil']);
        setcookie(Security::COOKIE_NAME,"",time()-3600);
        header("Location:" . URL . "accueil");
    }

    public function validationInscription($email, $firstname, $lastname, $password)
    {
        if ($this->UserManager->verifEmailAvailable($email)) {
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            $key = rand(0, 9999);
            if ($this->UserManager->dbCreationAccount($firstname, $lastname, $email, $passwordCrypte, $key, "profils/profil.png", "user")) {
                $this->sendMailValidation($firstname, $email, $key);
                ToolBox::addMessageAlert("Le compte à été créé, un mail de validation vous a été envoyé.");
                header("Location:" . URL . "login");
            } else {
                ToolBox::addMessageAlert("Erreur lors de la création du compte, recommencez !");
                header("Location:" . URL . "creerCompte");
            }
        } else {
            ToolBox::addMessageAlert("L'Email est déjà utilisé");
            header("Location:" . URL . "creerCompte");
        }
    }

    public function sendMailValidation($email, $key)
    {
        $urlVerification = URL . "validationMail/" . $email . "/" . $key;
        $object = "Creation de compte sur le site";
        $message = " Pour valider votre compte veuillez cliquez sur le lien suivant : " . $urlVerification;
        ToolBox::sendMail($email, $object, $message);
    }

    public function sendBackMailValidation($email)
    {
        $user = $this->UserManager->getUserInformation($email);
        $this->sendMailValidation($user['firstname'], $email, $user['key']);
        header("Location:" . URL . "login");
    }

    public function validationMailAccount($email, $key)
    {
        if ($this->UserManager->dbValidationMailAccount($email, $key)) {
            ToolBox::addMessageAlert("Le compte à été activé !");
            header("Location:" . URL . "compte/profil");
        } else {
            ToolBox::addMessageAlert("Le compte n'a pas  été activé !");
            header("Location:" . URL . "creerCompte");
        }
    }

    public function validationEditMail($email)
    {
        if ($this->UserManager->dbEditMailUser($_SESSION['profil']['email'], $email)) {
            ToolBox::addMessageAlert("La modification est effectué !");
        } else {
            ToolBox::addMessageAlert("La modification n'as pas put être effectuée !");
        }
        header("Location:" . URL . "compte/profil");
    }

    public function editPassword()
    {
        $data_page = [
            "page_description" => "Page de modification du mot de passe",
            "page_title" => "Changer moin mot de passe",
            "page_js" => ['password.js'],
            "page_css" => ["d-none.css"],
            "view" => "Views/Users/editPassword.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function validationEditPassword($oldPassword, $newPassword, $newPasswordConf)
    {
        if ($newPassword === $newPasswordConf) {
            if ($this->UserManager->isValid($_SESSION['profil']['email'], $oldPassword)) {
                $passwordSecure = password_hash($newPassword, PASSWORD_DEFAULT);
                if ($this->UserManager->dbModificationPassword($_SESSION['profil']['email'], $passwordSecure)) {
                    ToolBox::addMessageAlert("La modification du mots de passe à été effectuée!");
                    header("Location:" . URL . "compte/profil");
                } else {
                    ToolBox::addMessageAlert("La modification à échouée !");
                    header("Location:" . URL . "compte/modificationMotDePasse");
                }
            } else {
                ToolBox::addMessageAlert("La combinaison email et mots de passe ne correspondent pas !");
                header("Location:" . URL . "compte/modificationMotDePasse");
            }
        } else {
            ToolBox::addMessageAlert("Les mots de passes ne correspondent pas !");
            header("Location:" . URL . "compte/modificationMotDePasse");
        }
    }

    public function validationEditAvatar($avatar) 
    {
        try{
            $repertoire = "public/assets/img/profils/".$_SESSION['profil']["email"]."/";
            // Add avatar on file
            $nameAvatar = ToolBox::addPicture($avatar,$repertoire);
            $this->fileDeletePictureUser($_SESSION['profil']['email']);
            $dbNameAvatar = "profils/".$_SESSION['profil']["email"]."/".$nameAvatar;
            if($this->UserManager->dbAddPicture($_SESSION['profil']['email'],$dbNameAvatar)) {
                ToolBox::addMessageAlert("La modification de l'image est effectuée!");
            } else {
                ToolBox::addMessageAlert("La modification de l'image n'a pas été effectuée !");
            }
        } catch(Exception $e) {
            ToolBox::addMessageAlert($e->getMessage());
        }
        
        header("Location:" . URL . "compte/profil");
    }

    public function deleteAccount()
    {
        //On supprime l'image dans le dossier 
        $this->fileDeletePictureUser($_SESSION['profil']['email']);
        // On supprime le dossier
        rmdir("publi/assets/img/profils/".$_SESSION['profil']['email']);
        if ($this->UserManager->dbDeleteAccount($_SESSION['profil']['email'])) {
            ToolBox::addMessageAlert("Votre compte à été supprimé !");
            $this->deconnection();
        } else {
            ToolBox::addMessageAlert("La suppression n'as pas été effectué, contactez l'administrateur !");
            header("Location:" . URL . "compte/profil");
        }
    }

    private function fileDeletePictureUser($email) {
        $oldAvatar = $this->UserManager->getAvatarUser($email);
        if($oldAvatar !== "profils/profil.png") {
            unlink("public/assets/img/".$oldAvatar);
        }
    }

    // Heritage
    public function pageErrors($message)
    {
        parent::pageErrors($message);
    }
}
