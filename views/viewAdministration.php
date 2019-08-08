<?php $this->_t = "Administration";
require_once("views/viewSignal.php"); ?>

<!-- Page d'administration du site -->
<div class="container-page bg-secondary">
    <div class="container col-lg-8  bg-light administrator">
        <!-- Affichage des commentaires signalés -->
        <div>
        <h2 class="text-center mt-5 mb-5 bg-secondary text-white rounded">Liste des commentaires signalés</h2>        
            <?= $signal ?>
        </div>

        <!-- Affichage des chapitres -->
        <h2 class="text-center mt-5 mb-5  bg-secondary text-white rounded">Liste des chapitres</h2>
        <table class="table table-responsive-sm text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chapters as $chapter) : ?>
                    <tr>
                        <td><?= $chapter->title() ?></td>
                        <td><?= $chapter->author() ?></td>
                        <td><?= $chapter->date() ?></td>
                        <td>
                            <div>
                                <a href="editchapter&amp;id=<?= $chapter->id() ?>" class="btn btn-sm btn-primary m-1">Modifier</a>
                                <a href="" class="btn btn-sm btn-danger mode-admin-delete m-1" data-toggle="modal" data-id="<?= $chapter->id() ?>" data-target="#modalDeleteChapter">Supprimer</a>
                                <a href="comment&amp;id=<?= $chapter->id() ?>" class="btn btn-sm bg-secondary">Commentaire</a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-primary btn-sm" href="newchapter">PUBLIER UN CHAPITRE</a>
        </div>
    </div>
</div>

<!-- Modal pour supprimer un chapitre -->
<div class="modal fade" id="modalDeleteChapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supression du chapitre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer le chapitre ?
            </div>
            <div class="modal-footer">
                <a href="" id="modalDelete" class="btn btn-danger">Supprimer</a>
                <a href="" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
            </div>
        </div>
    </div>
</div>