<?php 
/* 
    Création d'un objet Main
    Une fonction par demande de l'utilisateur
*/

require_once("Models/MainManager.php");
require_once("Controllers/ToolBox.php");
class Main {
    
    private $mainManager;

    public function  __construct() {
        $this->mainManager = new MainManager();
    }
    // Aucun autre fichier ne peut appeler cette fonction
    private function generatePage($data) {
        // La fonction extract permet de decomposer un tableau en plusieurs variable
        extract($data);
        ob_start();
        // $view = $data['view']
        require_once($view);
        $page_content = ob_get_clean();
        require($template);
    }

    // page_css : tableau permettant d'ajouter des fichiers CSS spécifiques
    public function home() {
        $data_page = [
            "page_description" => "Strucuture de base d'un projet en php",
            "page_title" => "Projet PHP MVC",
            "page_css" => ["home.css"],
            "view" => "Views/home.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

     // page_js : tableau permettant d'ajouter des fichiers JS spécifiques
    public function page1() {
        ToolBox::addMessageAlert("test");
        ToolBox::addMessageAlert("test2");
        $datas = $this->mainManager->getDatas();
        $data_page = [
            "page_description" => "Strucuture de base d'un projet en php",
            "page_title" => "Projet PHP MVC",
            "page_js" => ["page1.js"],
            "datas" => $datas,
            "view" => "Views/page1.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function pageErrors($message) {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "message" => $message,
            "view" => "Views/errors.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }
}