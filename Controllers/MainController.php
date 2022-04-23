<?php 

// Toutes les fonctions permettant de gérer les pages du projet

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
        require_once($view);
        $page_content = ob_get_clean();
        require($template);
    }

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

    public function page1() {
        $data_page = [
            "page_description" => "Strucuture de base d'un projet en php",
            "page_title" => "Projet PHP MVC",
            "page_js" => ["page1.js"],
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