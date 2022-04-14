<?php
session_start();

require("Model/BDDClass.php");
require("Model/StorageClass.php");


$connection = new BDD();

$result = $connection->connection();

//$connection->newUser($result,'lise','rochat','liserochat@live.fr','azerty','1');

$user = $connection->login($result, $_POST['password'], $_POST['email']);

$session = new Storage();

$session->storeUSerData($user);

var_dump($session->getUserData()['firstname']);