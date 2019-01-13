<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <thead>
        <tr>
            <th>Envoie et récupération de données</th>
        </tr>
    </thead>
    <form action="/isn/3.php" method="post" enctype="multipart/form-data">
        <tbody>
            <tr>
                <td>
                    <label for="nom">Nom</label>
                    <input name="nom">
                    <br />
                </td>
                <td>
                    <h3>Nom</h3>
                    <p> <?php print($_POST["nom"]); ?> </p>
                    <br />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prénom</label>
                    <input name="prenom">
                    <br />
                </td>
                <td>
                    <h3>Prénom</h3>
                    <p> <?php print($_POST["prenom"]); ?> </p>
                    <br />
                </td>
            </tr>
        </tbody>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
