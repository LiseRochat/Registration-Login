<?php 

// Toutes les fonctions permettant de gérer les pages du projet

require_once("Controllers/ToolBox.php");
abstract class Main {
    
    
    protected function generatePage($data) {
        // La fonction extract permet de decomposer un tableau en plusieurs variable
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require($template);
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

    protected function pageErrors($message) {
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