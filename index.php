<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    
</head>

<body>
    <style>
        .crop {
            height: 88vh;
            overflow: hidden;
        }

        .crop img {
            width: 100vw;
        }
    </style>

    <?php include("menu.html"); ?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active crop">
                <img src="images/carousel_1.jpg" class="img-fluid" alt="">
                <div class="carousel-caption">
                    <h1>Bienvenue sur le site des anciens élèves du lycée Pierre d'Ailly</h1>
                </div>
            </div>
            <div class="carousel-item crop">
                <img src="images/carousel_2.jpg" class="img-fluid" alt="">
            </div>
            <div class="carousel-item crop">
                <img src="images/carousel_3.jpg" class="img-fluid" alt="">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>