<?php
    $mysqli = mysqli_connect("bh0xvwxrn-mysql.services.clever-cloud.com", "uhsbsls3esxuhstw", "rvFILyN1eBDmvUXHZKj", "bh0xvwxrn");
    $query = $mysqli->query("SELECT * FROM eleves_exemples;");
    $nombre_resultat = $query->num_rows;
    $resultat = $query->fetch_array();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th colspan="<?php print($nombre_resultat) ?>">Resultat de la requête</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while($resultat != NULL) { ?>
                    <td>
                        <h3>Id élève</h3>
                        <p> <?php print($resultat["id_eleve"]); ?> </p>
                        <h3>Nom</h3>
                        <p> <?php print($resultat["nom"]); ?> </p>
                        <h3>Prénom</h3>
                        <p> <?php print($resultat["prenom"]); ?> </p>
                        <h3>Email</h3>
                        <p> <?php print($resultat["email"]); ?> </p>
                        <h3>Qui</h3>
                        <p> <?php print($resultat["qui"]); ?> </p>
                        <h3>Parcours</h3>
                        <p> <?php print($resultat["parcours"]); ?> </p>
                    </td>
                    <?php $resultat = $query->fetch_array();
                    } ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>