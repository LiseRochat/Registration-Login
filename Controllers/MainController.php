<?php 

// Toutes les fonctions permettant de gérer les pages du projet

require_once("Controllers/ToolBox.php");

abstract class MainController{

    protected function generatePage($data){
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    protected function pageErrors($msg){
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
}