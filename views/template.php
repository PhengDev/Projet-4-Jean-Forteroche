<?php require_once("views/viewMenu.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Billet simple pour l'Alaska">
    <meta name="author" content="Jean Forteroche">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
    <script src="https://cdn.tiny.cloud/1/ewxh3jblnv4y72cvw7l8k2tkd1akzee16lo9bv0s09ly5oxa/tinymce/5/tinymce.min.js"></script>
    <script>tinyMCE.init({ selector:'#newchapter', plugins: "autoresize"});</script>
    <script>tinyMCE.init({ selector:'#newcomment', plugins: "autoresize"});</script>
    <script>tinyMCE.init({ selector:'#editcomment', plugins: "autoresize"});</script>

    <link rel="stylesheet" href="public/css/style.css" />
    
    <title><?= $t ?></title>
</head>

<body>
    <header>
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-md fixed-top bg-dark">
            <img class="img-fluid" src="public/images/logo1.png" id="navbar-logo">

            <!-- Toggle pour mobile -->
            <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="nav navbar-right float-right">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="<?= URL ?>"><i class="fas fa-home"></i> ACCUEIL<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bible"></i> LIVRES</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="book">Billet simple pour l'Alaska</a>
                    </div>
                </li>
                <li class="nav-item">
                   <?=$menu?>
                </li>
            </ul>

        </nav>
    </header>
    <!-- Affichage du contenu de la page -->
    <?= $content ?>
    
    <footer class="footer bg-dark">
        <i class="far fa-copyright"></i>
        <p class="text-footer text-light"> 2019 JEAN FORTEROCHE | LY PHENG - OPENCLASSCROOM</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>

</html>