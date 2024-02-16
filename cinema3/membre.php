<?php

require("helper.php");
require_once('Models/Database.class.php');
require_once('Models/Membre.class.php');

$membreModel = new Membre;

$id = $_GET['id'];

$membre = $membreModel->getById($id);

$historique = $membreModel->getHistoryById($id);

include('Views/membre.php');