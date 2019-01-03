<?php # On commence notre code PHP avec une balise "<?php"
    # Les variables sont déclarées avec un $ au début de leur nom
    $nom = "Adil Benameur"; # Chaque instructions se terminent par un ;
?>

<html>    <!-- PHP est généralement utilisé en complément de HTML et CSS -->
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <!-- Comme en python on affiche du texte avec l‘ instruction print -->
        <p>
                <strong>
                    <?php print('Hello !');?>
                </strong>
            Mon nom est <?php print($nom);?>
        </p>
    </body>
</html>