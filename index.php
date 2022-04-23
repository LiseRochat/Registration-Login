<?php 
session_start();
// url complete depuis la racine du site (optionnel en cas de probleme pour accéder des ressources)
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));
require_once("./Controllers/Visitors/VisitorsController.php");
$visitorController = new VisitorsController();

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
        case "page1" :
            $visitorController->page1();
        break; 
        // Classe existante de base de php pour gérer toutes les exceptions utilisateur.
        default : throw new Exception("La page n'existe pas !");
    }
} catch (Exception $e) {
    $visitorController->pageErrors($e->getMessage());
}