<?php
require_once("./Controllers/MainController.php");
require_once("./Models/Visitors/VisitorsModel.php");
class VisitorsController extends MainController {
    private $visitorManager;

    public function __construct() {
        $this->visitorManager = new VisitorsManager();
    }

    // Page Accueil
    public function home() {
        $data_page = [
            "page_description" => "Gestion de connexion inscritpion d'un compte en PHP POO avec le modèle MVC",
            "page_title" => "Connection | Inscription",
            "page_css" => ["home.css"],
            "view" => "Views/Visitors/home.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login() {
        $data_page = [
            "page_description" => "Page de connection d'un utilisateur inscrit sur le site",
            "page_title" => "Connection",
            "page_css" => ["style.css"],
            "view" => "Views/Visitors/login.php",
            "template" => "Views/Common/template.php"
        ];
        $this->generatePage($data_page);
    }
    // Heritage
    public function pageErrors($message) {
        parent::pageErrors($message);
    }
}