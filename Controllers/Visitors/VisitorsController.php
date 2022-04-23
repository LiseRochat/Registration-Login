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
        $users = $this->visitorManager->getUsers();
        print_r($users);
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