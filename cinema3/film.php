<?php

// helper.php me permet d'importer ma fonction getPoster
require_once("helper.php");
// Je require la Database pour que la class Film puisse extends Database
// Database me permet de faire la connexion avec la base de donnée et stocker la connexion dans une propritétée $this->db
require_once('Models/Database.class.php');
// Le model Film permet faire des methodes (fonctions) qui me servira à faire des requetes en BDD
require_once('Models/Film.class.php');

// Je récupère l'ID dans l'URL (?id=1) par exemple
$id = $_GET['id'];

// J'instancie ma class Film dans une variable $filmModel
$filmModel = new Film;

// Depuis mon objet $filmModel, j'appelle la methode getById qui me permet de recuperer un film via son ID
$film = $filmModel->getById($id);

// Puis a la fin, j'inclue ma vue afin d'afficher mon HTML
// Toujours a la fin pour que ma vue ai les variables de disponible
include_once("Views/film.php");