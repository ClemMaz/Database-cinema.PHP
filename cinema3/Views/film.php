<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
}

.title {
    color: #333;
    text-align: center;
}

img {
    display: block;
    margin: 20px auto;
    max-width: 100%;
}


.summary, .duration, .year, .start-date, .end-date {
    margin-bottom: 10px;
}

.error {
    color: red;
    text-align: center;
}
    </style>
</head>
<body>
    <a href="/">Retour accueil</a>
    <div class="container">

    <h1><?= $film['titre'] ?></h1>
    <img src="<?= getPoster($film['titre'], $film['annee_prod']) ?>" alt="<?= $film['titre'] ?>">
    <p><?= $film['annee_prod'] ?></p>
    <p><?= $film['resum'] ?></p>
    <p>Genre : <?= $film['genre'] ?></p>
</div>
</body>
</html>