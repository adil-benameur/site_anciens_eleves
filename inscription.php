<?php
    include("mysql.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post = True;
        $email = htmlspecialchars($_POST["email"]);
        $row = mysqli_fetch_array(mysqli_query($mysqli, "SELECT email FROM eleves WHERE email = \"" . $email . "\";"));
        if ($row["email"] == $email) {
            $email_exit = True;
        }
        else {
            $password = htmlspecialchars($_POST["password"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $qui = htmlspecialchars($_POST["qui"]);
            $parcours = htmlspecialchars($_POST["parcours"]);
            $nom = htmlspecialchars($_POST["nom"]);
            mysqli_query($mysqli, "INSERT INTO eleves (nom, prenom, email, password, qui, parcours) VALUES(\"". $nom ."\",\"". $prenom ."\",\"". $email ."\",\"". $password ."\",\"". $qui ."\",\"". $parcours ."\");");
            if (isset($_FILES['avatar'])) {
                # Image profil
                $row = mysqli_fetch_array(mysqli_query($mysqli,"SELECT id_eleve FROM eleves WHERE email = \"" . $email . "\";"));
                error_log($row["id_eleve"], $message_type=0);
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $row["id_eleve"] . pathinfo($_FILES['avatar']['name'])['extension']);
            }
        }
        mysqli_close($mysqli);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inscrivez-vous dans le registre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
</head>

<body>
    <style>
        .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-avatar {
            display: inline-block;
        }
        .kv-avatar .file-input {
            display: table-cell;
            width: 213px;
        }
        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }
        </style>

    <?php include("menu.html"); ?>

    <div class="container-fluid" style="margin-top:20px;">
        <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
        <form class="form form-vertical" action="/inscription.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <input id="avatar-2" name="avatar" type="file">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Adresse Email<span class="kv-reqd">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Mot de passe<span class="kv-reqd">*</span></label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="qui">Qui suis-je ?</label>
                                <textarea class="form-control" rows="5" name="qui"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="parcours">Mon parcours</label>
                                <textarea class="form-control" rows="5" name="parcours"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="background-color: #007F00; border-color:#007F00; font-weight:bold;">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#avatar-2").fileinput({
            overwriteInitial: True,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: True,
            removeLabel: '',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="images/default_profil.jpg" alt="Votre avatar"><h6 class="text-muted">Click to select</h6>',
            layoutTemplates: {
                main2: '{preview} ' + btnCust + ' {remove} {browse}'
            },
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>