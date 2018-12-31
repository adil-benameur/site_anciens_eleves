<?php
    include("mysql_profil.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile de <?php echo $row['prenom'] . " " .  $row['nom']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
</head>

<body style="font-size:auto;">
    <?php include("menu.html"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 border-right col-xs-12" style="padding-left:0px;padding-right:0px;background-color:#f7f7f7;margin:0px;height:90.63vh;width:0px;max-width:300px;"><img
                    src="/images/<?php echo $row["id_eleve"] ?>.jpg" class="img-fluid" style="margin:0px;max-width:auto;min-width:auto;padding:15px;">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color:rgb(247,247,247);width:auto;border:0px solid;font-size:auto;height:auto;"><a
                            href="./qui_suis_je" style="margin-left:0px;font-size:25px;margin-right:0px;color:rgb(33,37,41);">Qui
                            suis-je ?</a></li>
                    <li class="list-group-item" style="background-color:rgb(247,247,247);border:0px solid;font-size:auto;"><a
                            href="./mon_parcours" style="margin-left:0px;font-size:25px;margin-right:0px;padding-right:0px;color:rgb(33,37,41);">Mon
                            parcours</a></li>
                    <li class="list-group-item" style="background-color:rgb(247,247,247);width:auto;border:0px solid;font-size:auto;"><a
                            href="./me_contacter" style="margin-left:0px;font-size:25px;color:rgb(33,37,41);">Me contacter</a></li>
                </ul>
                <h4 style="margin-left:20px;"></h4>
            </div>
            <div class="col-md-8 col-lg-9">
                <h2 style="margin-top:6px;"><?php echo $row["prenom"] . " " . $row["nom"]; ?></h2>
                <h4><?php 
                if($matches[2] == "qui_suis_je"){
                    echo "Qui suis-je ?";
                    $content = "qui";
                }elseif ($matches[2] == "mon_parcours"){
                    echo "Mon parcours";
                    $content = "parcours";
                }elseif ($matches[2] == "me_contacter"){
                    echo "Me contacter";
                    $content = "email";
                }?></h4>
                <p style="font-size:16px;"><?php
                if($content == "email"){
                    echo "Vous pouvez me contacter à l'adresse suivante : ";
                }
                echo $row[$content]; ?></p>
            </div>
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