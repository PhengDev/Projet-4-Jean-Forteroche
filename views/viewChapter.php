<?php $this->_t = $chapter->title() ?>

<div class="container-page bg-secondary">
    <div class="container style-link">
        <a class="text-primary"href="book">Retour sur la liste des chapitres</a>
    </div>
    <!-- Affichage du chapitre -->
    <div class="container style-container">
        <div class="row style-row">
            <h2 class="chapter-title"><?= $chapter->title() ?></h2>
        </div>

        <p class="content"><?= nl2br(html_entity_decode($chapter->content())) ?></p>
        <small class="text-muted float-right">par <?= $chapter->author() ?></small>
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
                "<h2 class=\"mt-4 mb-4\">Poster un commentaire :</h2>
                <form action=\"\" method=\"POST\" class=\"form-register\">
                    <textarea name=\"comment\" id=\"newcomment\"></textarea>
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
                    if (isset($_SESSION['pseudo']) and $_SESSION['pseudo'] == $comment->author()) {
                        echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . '</span> le ' .  $comment->dateComment() . "<a class=\"float-right\" href=\"editcomment&id_post=" . $comment->id() . "&id=" . $chapter->id() . "\">Modifier</a></p>";
                    }
                    // Si elle n'est pas l'auteur, aucun bouton n'apparait
                    else {
                        echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . '</span> le ' .  $comment->dateComment() . "</p>";
                    }
                    echo "<p>" . html_entity_decode($comment->comment()) . "</p>";
                    echo "<div class=\"dropdown-divider\"></div>";
                    echo "<div class=\"comment-flex\">";
                   
                    // Bouton pour signaler un message
                    if (!empty($_SESSION) and $_SESSION['pseudo'] !== $comment->author() and $comment->checkComment() == 1) {
                        echo "<p class=\"paragraphe-comment\"><a class=\"text-danger trash3\" href=\"\" data-toggle=\"modal\" data-id=\"" . $chapter->id() . "\" data-idpost=\"" . $comment->id() . "\" data-target=\"#modalSignalComment\">Signaler le commentaire</a></p>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>