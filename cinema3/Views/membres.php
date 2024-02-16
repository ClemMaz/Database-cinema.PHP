<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membres</title>
    <style>
    body {
    font-family: Arial, sans-serif;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    padding: 20px;
}

.film {
    display: block;
    border: 2px solid #ccc;
    padding: 10px;
    text-decoration: none;
    color: black;
}

.film h2 {
    margin: 0 0 10px 0;
}

.film p {
    margin: 0;
}
    </style>

</head>
<body>
    <div class="grid">
        <?php foreach($membres as $membre): ?>
            <a href="/membre.php?id=<?= $membre['id'] ?>" class="film">
                <h2><?= $membre['nom'] ?></h2>
                <h2><?= $membre['prenom'] ?></h2>
                <p><?= $membre['email'] ?></p>
                <p>Dernier film vu : <?= $membre['titre'] ?></p>
            </a>
        <?php endforeach ?>
    </div>
</body>
</html>