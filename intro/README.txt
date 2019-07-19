Vous venez de decrocher un contrat avec Jean Forteroche, acteur et ecrivain. Il travaille actuellement sur son prochain roman, "Billet simple pour l'Alaska". Il souhaite innover et le publier par episode en ligne sur son propre site.

Seul probleme : Jean n'aime pas WordPress et souhaite avoir son propre outil de blog, offrant des fonctionnalites plus simples. Vous allez donc devoir developper un moteur de blog en PHP et MySQL.

Vous developperez une application de blog simple en PHP et avec une base de donnees MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'ecriture). On doit y retrouver tous les elements d'un CRUD :

    Create : creation de billets
    Read : lecture de billets
    Update : mise a jour de billets
    Delete : suppression de billets

Chaque billet doit permettre l'ajout de commentaires, qui pourront etre moderes dans l'interface d'administration au besoin.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour etre moderes.

L'interface d'administration sera protegee par mot de passe. La redaction de billets se fera dans une interface WYSIWYG basee sur TinyMCE, pour que Jean n'ait pas besoin de rediger son histoire en HTML (on comprend qu'il n'ait pas tres envie !).

Vous developperez en PHP sans utiliser de framework pour vous familiariser avec les concepts de base de la programmation. Le code sera construit sur une architecture MVC. Vous developperez autant que possible en oriente objet (au minimum, le modele doit etre construit sous forme d'objet).