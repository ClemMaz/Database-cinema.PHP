<?php

class Membre extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $request = $this->db->prepare("SELECT detail.*, film.*, genre.nom AS genre, membre.id FROM membre
        LEFT JOIN detail ON membre.detail_id = detail.id
        LEFT JOIN film ON membre.dernier_film_id = film.id
        LEFT JOIN genre ON film.genre_id = genre.id
         LIMIT 10");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getById($id) {
        $request = $this->db->prepare("SELECT detail.*, film.*, genre.nom AS genre FROM membre
        LEFT JOIN detail ON membre.detail_id = detail.id
        LEFT JOIN film ON membre.dernier_film_id = film.id
        LEFT JOIN genre ON film.genre_id = genre.id
        WHERE membre.id = :id");
        $request->execute([
            'id' => $id
        ]);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getHistoryById($id) {
        $request = $this->db->prepare("SELECT film.*, historique_membre.date AS date_visionnage FROM historique_membre
            INNER JOIN film ON historique_membre.film_id = film.id
            WHERE historique_membre.membre_id = :id
        ");
        $request->execute([
            'id' => $id
        ]);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}