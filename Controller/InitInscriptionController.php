<?php
// Apelle de nos class
require("../Model/BDDClass.php");
require("../Model/StorageClass.php");
require("../Controller/BDDController.php");

/*************************************** Inscription Utilisateur *************************************** */
$bdd->newUser($bddConnection,
                $_POST['firstnameIns'],
                $_POST['lastnameIns'],
                $_POST['emailIns'],
                $_POST['passwordIns'],
                '1'
            );