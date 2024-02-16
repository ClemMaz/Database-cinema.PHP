<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h2><?= $membre['nom'] ?></h2>
    <h2><?= $membre['prenom'] ?></h2>
    <p><?= $membre['email'] ?></p>
    <p>Dernier film vu : <?= $membre['titre'] ?></p>

    <p>Liste des films vus :</p>
    <div class="grid">
        <?php foreach($historique as $film): ?>
            <a href="film.php?id=<?= $film['id'] ?>" class="film">
                <h2><?= $film['titre'] ?></h2>
                <img src="<?= getPoster($film['titre'], $film['annee_prod']) ?>" alt="<?= $film['annee_prod'] ?>">
                <p><?= $film['annee_prod'] ?></p>
                <p>Date de visionnage : <?= $film['date_visionnage'] ?></p>
            </a>
        <?php endforeach ?>
    </div>
</body>
</html>