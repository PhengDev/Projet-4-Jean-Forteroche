<?php $this->_t = 'Blog de Jean Forteroche'; ?>

<!-- Image -->
<div class="text-center mb-lg-5 mb-sm-5 mb-md-5">
<div class="container">
        
            <h1 class="style_title title_home text_center text-uppercase">Blog de Jean Forteroche</h1>
       
    </div>
    <img class="img-fluid rounded" src="public/images/Alaska.jpg" alt="image-home">
    
</div>

<!-- Biographie -->
<section class="jumbotron bg-info text-center mb-lg-5 mb-sm-5 mb-md-5">
    <img src="public/images/photo.jpg" class="rounded float-left mr-lg-5 mr-sm-5 mr-md-5" id="jean-forteroche" alt="Portrait de Jean Forteroche" >
    <div class="container">
        <h2 class="mb-4 text-uppercase">Biographie</h2>
        <p class="text-jumbotron text-justify">Jean Forteroche, né le 7 novembre 1980 à Paris, est un écrivain, philosophe, romancier, dramaturge, journaliste, essayiste et nouvelliste français. Il est aussi journaliste militant engagé dans la Résistance française et, proche des courants libertaires, dans les combats moraux de l'après-guerre.

Son œuvre comprend des pièces de théâtre, des romans, des nouvelles, des films, des poèmes et des essais dans lesquels il développe un humanisme fondé sur la prise de conscience de l'absurde de la condition humaine mais aussi sur la révolte comme réponse à l'absurde, révolte qui conduit à l'action et donne un sens au monde et à l'existence, et « alors naît la joie étrange qui aide à vivre et mourir ». Il reçoit le prix Nobel de littérature en 1957.

Dans le journal Combat, ses prises de position sont audacieuses, aussi bien sur la question de l'indépendance de l'Algérie que sur ses rapports avec le Parti communiste français, qu'il quitte après un court passage de deux ans.

Il ne se dérobe devant aucun combat, protestant successivement contre les inégalités qui frappent les musulmans d'Afrique du Nord, puis contre la caricature du pied-noir exploiteur, ou prenant la défense des Espagnols exilés antifascistes, des victimes du stalinisme et des objecteurs de conscience.

En marge des courants philosophiques, Camus est d'abord témoin de son temps, intransigeant, refusant toute compromission. Il n'a cessé de lutter contre toutes les idéologies et les abstractions qui détournent de l'humain. Il est ainsi amené à s'opposer à l'existentialisme et au marxisme, sa critique du totalitarisme soviétique lui vaut les anathèmes de communistes et sa rupture avec Jean-Paul Sartre.</p>
    </div>
</section>

<!-- Chapitre -->
<div class="py-5 bg-light" id="lastChapter">
    <div class="container bg-secondary">
        <h2 class="title-publication mb-4 text-white text-uppercase">Les dernières publications</h2>
        <div class="row">
            <?php foreach ($chapters as $chapter) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 box-shadow">

                        <div class="card-body">
                            <h5 class="card-title"><u><?= $chapter->title() ?></u></h5>
                            <p class="card-text"><?= nl2br(html_entity_decode(substr($chapter->content(), 0, 300))) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary" href="chapter&amp;id=<?= $chapter->id() ?>" role="button">Voir chapitre</a>
                                <small class="text-muted"><?= $chapter->date() ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>