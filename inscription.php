<?php
    include("mysql.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST["email"]);
        $row = mysqli_fetch_array(mysqli_query($mysqli, "SELECT email FROM eleves WHERE email = \"" . $email . "\";"));
        if ($row["email"] == $email) {
            $email_exit = True;
        }
        else {
            $nom = ucwords(htmlspecialchars($_POST["nom"]));
            $prenom = ucwords(htmlspecialchars($_POST["prenom"]));
            $password = htmlspecialchars($_POST["password"]);
            $qui = htmlspecialchars($_POST["qui"]);
            $parcours = htmlspecialchars($_POST["parcours"]);
            $image_profil = htmlspecialchars($_FILES["avatar"]["name"]) ?: "default_profil.png";
            mysqli_query($mysqli, "INSERT INTO eleves (nom, prenom, email, password, qui, parcours) VALUES (\"". $nom ."\",\"". $prenom ."\",\"". $email ."\",\"". $password ."\",\"". $qui ."\",\"". $parcours ."\");");
            $row = mysqli_fetch_array(mysqli_query($mysqli,"SELECT id_eleve FROM eleves WHERE email = \"" . $email . "\";"));
            if ($_FILES['avatar']["error"] == 0 and $row != NULL) {
                # Image profil
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/profils/' . $row["id_eleve"] . "." . pathinfo($_FILES['avatar']['name'])['extension']);
                mysqli_query($mysqli, "UPDATE eleves SET image_profil = \"" . $row["id_eleve"] . "." . pathinfo($_FILES['avatar']['name'])['extension'] . "\" WHERE id_eleve = " . $row["id_eleve"]);
            }
            else {
                mysqli_query($mysqli, "UPDATE eleves SET image_profil = \"default_profil.jpg\" WHERE id_eleve = " . $row["id_eleve"]);
            }
            mysqli_close($mysqli);
            header("location:https://asso-lpa.tk/profil.php?id_eleve=" . $row["id_eleve"] . "&page=qui_suis_je");
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inscrivez-vous dans le registre</title>
    <link rel="icon" href="images/LPA_logo.png">
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

    <?php if(isset($email_exit)) {?>
    <div class="container alert alert-danger alert-dismissible fade show" style="margin-top: 20px;" role="alert">
        <strong>Erreur :</strong> cette adresse email est déjà utilisée (
        <?php echo $email;
        #####      mysqli_close($mysqli);
        ?>)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container-fluid" style="margin-top:20px;">
        <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
        <form class="form form-vertical" action="/inscription.php" method="post" enctype="multipart/form-data" runat="server">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <img id="default" src="images/profils/default_profil.png" alt="Votre image de profil" class="rounded" style="max-height: 75vh; max-width: 27vw; margin-top: 9px;" />
                            <input id="imgpreview" name="avatar" type="file" style="margin-top: 20px;" size="2000000" accept="image/*">
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
                                <label for="nom">Nom<span class="kv-reqd">*</span></label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="prenom">Prénom<span class="kv-reqd">*</span></label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="qui">Qui suis-je ?<span class="kv-reqd">*</span></label>
                                <textarea class="form-control" rows="5" name="qui">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu malesuada ligula. Suspendisse eros nisl, tincidunt vitae ultrices sit amet, pulvinar vitae justo. Maecenas finibus lorem consectetur tortor facilisis, eu volutpat lacus malesuada. Fusce sed leo quis sem porta accumsan. Curabitur et feugiat sem. Aenean vitae faucibus magna. Nullam vel tellus in lacus tristique tincidunt non sed tortor. Nunc a volutpat justo, pretium cursus mauris. In eget nibh arcu. Sed mattis, nulla nec vestibulum efficitur, magna turpis ultrices nisl, ut ultricies nisl purus id est. Donec non purus augue. Vivamus et tincidunt sapien. Donec sed lobortis metus. Praesent et ultrices urna. Quisque mauris enim, sagittis in sodales et, efficitur id nunc.</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="parcours">Mon parcours<span class="kv-reqd">*</span></label>
                                <textarea class="form-control" rows="5" name="parcours">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu malesuada ligula. Suspendisse eros nisl, tincidunt vitae ultrices sit amet, pulvinar vitae justo. Maecenas finibus lorem consectetur tortor facilisis, eu volutpat lacus malesuada. Fusce sed leo quis sem porta accumsan. Curabitur et feugiat sem. Aenean vitae faucibus magna. Nullam vel tellus in lacus tristique tincidunt non sed tortor. Nunc a volutpat justo, pretium cursus mauris. In eget nibh arcu. Sed mattis, nulla nec vestibulum efficitur, magna turpis ultrices nisl, ut ultricies nisl purus id est. Donec non purus augue. Vivamus et tincidunt sapien. Donec sed lobortis metus. Praesent et ultrices urna. Quisque mauris enim, sagittis in sodales et, efficitur id nunc.</textarea>
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

    <script src="js/image_preview.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

</body>

</html>