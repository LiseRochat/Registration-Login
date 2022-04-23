<?php
require_once("./Controllers/MainController.php");
class VisitorsController extends MainController {
    // Page Accueil
    public function home() {
        $data_page = [
            "page_description" => "Strucuture de base d'un projet en php",
            "page_title" => "Projet PHP MVC",
            "page_css" => ["home.css"],
            "view" => "Views/Visitors/home.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    // Heritage
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}