<?php

require_once('Models/Database.class.php');
require_once('Models/Membre.class.php');

$membreModel = new Membre;
$membres = $membreModel->getAll();

include('Views/membres.php');