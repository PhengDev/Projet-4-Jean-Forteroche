<?php $this->_t = $chapter->title() ?>

<div class="container-page bg-secondary">
    <div class="container style-link text-center">
        <a class="bg-primary text-white backup" href="book">Retour sur la liste des chapitres</a>
    </div>
    <!-- Affichage du chapitre -->
    <div class="container style-container">
        <div class="row style-row">
            <h2 class="chapter-title"><?= $chapter->title() ?></h2>
        </div>

        <p class="content"><?= nl2br(html_entity_decode($chapter->content())) ?></p>
        <small class="text-muted float-right">par Jean Forteroche</small>
        <?php
        // Si le champ date_modification est différent de null, on affiche la date de modification
        if ($chapter->dateModification() !== null) {
            echo "<p class=\"date-author text-primary\">Modification le " . $chapter->dateModification() . "</p>";
        }
        ?>
    </div>

    <div class="container">
        <?php

        $content;
        // Si on est connecté, affichage du champ pour écrire un commentaire
        if (!empty($_SESSION)) {
            echo $content =
                "<h2 class=\"mt-4 mb-4 text-center text-white\">Écrire un commentaire</h2>
                <form action=\"\" method=\"POST\" class=\"form-register\">
                    <textarea name=\"comment\" rows=\"10\" class=\"form-control rounded-10 \"></textarea>
                    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary btn-block mt-3\">Envoyer le commentaire</button>
                </form>";
        }
        // Sinon affichage d'un lien pour se connecter ou s'inscrire
        else {
            echo  $content = "<p class=\"text-center\"><a href=\"authentication\">Connectez-vous</a> ou <a href=\"register\">inscrivez-vous</a> pour ajouter un commentaire.</p>";
        }
        ?>
        <p class="text-center text-danger font-weight-bold style-register-error"><?php if (isset($error)) {
                                                                                        echo $error;
                                                                                    } ?></p>
        <!-- Affichage des commentaires du chapitre -->
        <div class="bg-dark container comment">
            <h2 class="mt-4 text-center text-white ">Commentaires</h2>

            <?php foreach ($comments as $comment) : ?>
                <?php
                // Affichage des commentaires
                if ($comment->checkComment() == 1 or $comment->checkComment() == 2) {
                    echo "<div class=\"container style-comment\">";
                    // Si la personne connectée est l'auteur du message elle a accès au bouton de modification
                    if (isset($_SESSION['pseudo']) and $_SESSION['id'] == 1) {
                        echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . '</span> le ' .  $comment->dateComment() . "</p>";
                    }
                    // Si elle n'est pas l'auteur, aucun bouton n'apparait
                    else {
                        echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . '</span> le ' .  $comment->dateComment() . "</p>";
                    }
                    echo "<p>" . html_entity_decode($comment->comment()) . "</p>";
                    echo "<div class=\"dropdown-divider\"></div>";
                    echo "<div class=\"comment-flex\">";

                    // Bouton pour signaler un message
                    if (!empty($_SESSION) and $comment->checkComment() == 1 and $_SESSION['id'] > 1 and $_SESSION['pseudo'] !== $comment->author()) {
                        echo "<p><a class=\"text-danger trash3\" href=\"\" data-toggle=\"modal\" data-id=\"" . $chapter->id() . "\" data-idpost=\"" . $comment->id() . "\" data-target=\"#modalSignalComment\">Signaler le commentaire</a></p>";
                    } else if ($comment->checkComment() == 2 AND !empty($_SESSION)) {
                        echo "<img class=\"img-warning\" src=\"public/images/Warning.png\"><p class=\"text-danger trash3\" >Ce commentaire a été signaler !</p>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSignalComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Signaler le commentaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir signaler le commentaire ?
            </div>
            <div class="modal-footer">
                <a href="" id="modalSignalC" class="btn btn-danger">Signaler</a>
                <a href="" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
            </div>
        </div>
    </div>
</div>