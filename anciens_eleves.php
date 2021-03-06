<?php
    include("mysql.php");
    $mysqli->real_query("SELECT id_eleve, nom, prenom, qui, image_profil FROM eleves");
    $res = $mysqli->use_result();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anciens élèves</title>
    <link rel="icon" href="images/LPA_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
</head>

<body>
    <?php include("menu.html"); ?>


    <style>
        .link {
            color: black;
            text-decoration: none;
        }
    </style>

    <div class="container" style="margin-top: 30px">
        <div class="card-columns">
            <?php while ($row = $res->fetch_assoc()) { ?>
            <a href="/profil.php?id_eleve=<?php echo $row['id_eleve']; ?>&page=qui_suis_je" class="link">
                <div class="card">
                    <img class="card-img-top" src="/images/profils/<?php echo $row['image_profil']; ?>" alt="Profil de <?php echo $row['prenom'] . " " . $row['nom'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['prenom'] . " " .  $row['nom']; ?></h5>
                        <p class="card-text"><?php echo substr($row['qui'], 0, 200). "...";?></p>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>

</html>