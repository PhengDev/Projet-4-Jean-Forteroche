<?php $this->_t = "Billet simple pour l'Alaska"; ?>
<!-- Affichage de tous les chapitres -->
<div class="container-page bg-secondary">
    <?php foreach ($chapters as $chapter) : ?>
        <div class="container style-container col-sm-8 col-xl-8 col-lg-10 col-md-10">
            <a href="chapter&amp;id=<?= $chapter->id() ?>">
                <h2 class="text-center"><?= $chapter->title() ?></h2>
            </a>
            <br>
            <a href="chapter&amp;id=<?= $chapter->id() ?>"><img src="public/images/livre1.jpg" class=" col-sm-5 rounded m-auto d-block" alt="livre"></a>
            <br>

            <small class="text-muted float-right">écrite le <?= $chapter->date() ?></small>
        </div>
    <?php endforeach; ?>
</div>