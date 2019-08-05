<?php $this->_t = "Administration des commentaires"; ?>

<div class="container-editcomment bg-secondary">

    <div class="container col-lg-8 style-link text-center">
        <a href="administration" class="bg-primary text-white backup ">Retour sur l'administration</a>
    </div>

    <div class="container bg-dark">
        <!-- Affichage des commentaires d'un chapiter -->
        <h2 class="mt-4 pt-4 text-center text-white">Commentaires du <?= $chapter->title() ?></h2>
        <?php foreach($comments as $comment) : ?>
        <?php
            // Options pour les commentaires non approuvés 
            if($comment->checkComment() == 0)
            {
                echo "<div class=\"container text-white progress-bar-striped\">";
                echo "<p><span class=\"font-weight-bold\">" . $comment->author() . "</span> le " . $comment->dateComment() . "</p>";
                echo "<p>" . html_entity_decode($comment->comment()) . "</p>";
                echo "<hr>";
                echo "<img class=\"img-warning\" src=\"public/images/Warning.png\"><p class=\"text-danger font-weight-bold\">Ce commentaire est censuré, il ne sera pas affiché sur le chapitre.</p>"; 
                echo "</div>";
                echo "<div class=\"action-button\">";   
                echo "<a class=\"btn btn-danger text-white float-right ml-2 trash2 style-button btn-supprimer-0\" data-toggle=\"modal\" data-id=\"" . $chapter->id() . "\" data-idpost=\"" . $comment->id() . "\" data-target=\"#modalDeleteComment\" href=\"\">Supprimer</a>";   
                echo "<a class=\"btn btn-success text-white float-right style-button btn-approuver-0\" href=\"confirmcomment&id_post=" . $comment->id() . "&id=" . $chapter->id() . "\">Approuver</a>";
                echo "</div>";
                echo "<br>";           
                echo "<br>"; 
                echo "<hr class=\"bg-white\">";
                echo "<br>"; 
               
            }
            // Options pour les commentaires approuvés
            else if($comment->checkComment() == 1)
            {
                echo "<div class=\"container style-comment\">";
                echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . "</span> le " . $comment->dateComment() . "</p>";
                echo "<p>" . html_entity_decode($comment->comment()) . "</p>";
                echo "<hr>";
                echo "</div>";
                echo "<div class=\"action-button\">";    
                echo "<a class=\"btn btn-danger text-white float-right ml-2 trash2 style-button btn-supprimer-1\" data-toggle=\"modal\" data-id=\"" . $chapter->id() . "\" data-idpost=\"" . $comment->id() . "\" data-target=\"#modalDeleteComment\" href=\"\">Supprimer</a>";
                echo "<a class=\"btn btn-secondary text-white float-right style-button btn-annuler-1\" href=\"censorcomment&id_post=" . $comment->id() . "&id=" . $chapter->id() . "\">Censurer</a>";
                echo "</div>";
                echo "<br>";                
                echo "<br>"; 
                echo "<hr class=\"bg-white\">";
                echo "<br>"; 
            }
            // Options pour les commentaires signalés
            else if($comment->checkComment() == 2)
            {
                echo "<div class=\"container style-comment\">";
                echo "<p class=\"text-primary\"><span class=\"font-weight-bold\">" . $comment->author() . "</span> le " . $comment->dateComment() . "</p>";
                echo "<p>" . html_entity_decode($comment->comment()) . "</p>";
                echo "<hr>";
                if($comment->checkComment())
                {
                    echo "<img class=\"img-warning\" src=\"public/images/Warning.png\"><p class=\"text-danger font-weight-bold\">Ce commentaire a été signaler !</p>";
                }
                echo "</div>";
                echo "<div class=\"action-button\">";   
                echo "<a class=\"btn btn-danger text-white float-right ml-2 trash2 style-button btn-supprimer-2\" data-toggle=\"modal\" data-id=\"" . $chapter->id() . "\" data-idpost=\"" . $comment->id() . "\" data-target=\"#modalDeleteComment\" href=\"\">Supprimer</a>";
                echo "<a class=\"btn btn-secondary text-white float-right style-button btn-annuler-2\" href=\"censorcomment&id_post=" . $comment->id() . "&id=" . $chapter->id() . "\">Censurer</a>";
                echo "<a class=\"btn btn-success text-white float-right mr-2 style-button btn-approuver-2\" href=\"confirmcomment&id_post=" . $comment->id() . "&id=" . $chapter->id() . "\">Approuver</a>";
                echo "</div>";
                echo "<br>";                
                echo "<br>"; 
                echo "<hr class=\"bg-white\">";
                echo "<br>"; 
            }
        ?>
        <?php endforeach; ?>
    </div>

    </div>

</div>

<!-- Modal pour la suppression d'un commentaire -->
<div class="modal fade" id="modalDeleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supression du commentaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer le commentaire ?   
            </div>
            <div class="modal-footer">
                <a href="" id="modalDeleteC" class="btn btn-danger">Supprimer</a>
                <a href="" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
            </div>
        </div>
    </div>
</div>