<?php

class Film extends Database {

    public function __construct() {
        // J'appel le __construct du parent (Database) afin d'avoir la connexion de faite
        parent::__construct();
    }

    public function getAll() {
        // Dans la fonction prepare, je met ma requete SQL
        $request = $this->db->prepare("SELECT * FROM film LIMIT 10");
        // Puis je l'execute
        $request->execute();
        // Et je recupere tous les resulats sous forme de tableau associatif avec fetchAll(PDO::FETCH_ASSOC)
        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        // Et je renvois les données afin de les recuperer dans mon index.php par exemple
        return $data;
    }

    public function getByGenre($genre_id) {
        // Pour les requetes avec parametres (comme le :genre_id), je ne met jamais de variable directement dans la request, pour eviter les injections SQL et donc les failles de securitées
        // A la place, je met ? ou :parametre afin de proteger mon parametre
        $request = $this->db->prepare("SELECT * FROM film WHERE genre_id = :genre_id LIMIT 10");
        
        $request->execute([
            // Dans mon execute, je met un tableau qui prend comme clé le nom mis apres les :
            // Donc par exemple 'parametre' => 'valeur'
            'genre_id' => $genre_id
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getById($id) {
        // SELECT * FROM film WHERE id = $id
        // Ici, je fais des jointures sur d'autres tables afin de completer mon resultat
        // Je joint la table film et la table genre avec la colonne commune film.genre_id et la colonne genre.id
        $request = $this->db->prepare("
        SELECT film.*, genre.nom AS genre, distrib.nom AS distrib FROM film
        LEFT JOIN genre ON genre.id = film.genre_id
        LEFT JOIN distrib ON distrib.id = film.distrib_id
        WHERE film.id = :id");
        $request->execute([
            'id' => $id
        ]);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}