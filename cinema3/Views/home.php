<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        button {
            margin-left: 10px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 0 50px;
        }

        .film {
            width: 200px;
            margin: 20px;
            text-align: center;
        }

        .film img {
            width: 100%;
            height: auto;
        }

        img:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }
    </style></head>
<body>
    <h1>Accueil film</h1>
      
    <form action="membres.php">
        <button>Liste des membres</button>
    </form>

    <form action="index.php">
        <select name="genre" id="genre">
            <option value="">Selectionner la catégorie</option>
            <?php foreach($genres as $genre) : ?>
                <option <?= !empty($_GET['genre']) && $_GET['genre'] == $genre['id'] ? 'selected' : '' ?> value="<?= $genre['id'] ?>"><?= $genre['nom'] ?></option>
            <?php endforeach ?>
        </select>
        <button>Filtrer</button>
    </form>

    <div class="grid">
        <?php foreach($films as $film): ?>
            <a href="film.php?id=<?= $film['id'] ?>" class="film">
                <h2><?= $film['titre'] ?></h2>
                <img src="<?= getPoster($film['titre'], $film['annee_prod']) ?>" alt="<?= $film['annee_prod'] ?>">
                <p><?= $film['annee_prod'] ?></p>
            </a>
        <?php endforeach ?>
    </div>
</body>
</html>