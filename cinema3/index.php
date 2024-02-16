<?php

// helper.php me permet d'importer ma fonction getPoster
require_once("helper.php");
// Je require la Database pour que la class Film puisse extends Database
// Database me permet de faire la connexion avec la base de donnée et stocker la connexion dans une propritétée $this->db
require_once('Models/Database.class.php');
// Le model Film permet faire des methodes (fonctions) qui me servira à faire des requetes en BDD
require_once('Models/Film.class.php');
require_once("Models/Genre.class.php");

// J'instancie ma class Film dans une variable $filmModel
$filmModel = new Film;
$genreModel = new Genre;

// Depuis mon objet $filmModel, j'appelle la methode getAll qui me permet de recuperer tous les films
$films = $filmModel->getAll();
$genres = $genreModel->getAll();

if (!empty($_GET['genre'])) {
    $films = $filmModel->getByGenre($_GET['genre']);
}

include("Views/home.php");