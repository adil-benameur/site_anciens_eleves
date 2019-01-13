<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h2>Envoie et récupération de données</h2>
    <form action="/isn/3.php" method="post" enctype="multipart/form-data">
        <label for="nom">Entrez un nom :</label>
        <input name="nom">
        <br />
        <h3>Nom :
            <?php print($_POST["nom"]); ?>
        </h3>
        <br />
        <label for="prenom">Entrez un prénom :</label>
        <input name="prenom">
        <br />
        <h3>Prénom :
            <?php print($_POST["prenom"]); ?>
        </h3>
        <br />
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>
