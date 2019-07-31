<?php $this->_t = "Profil"; 
    if ($_SESSION['id'] == 1) {
        $status = ' Administrateur';
    } else {
        $status = ' Membre';
    }
?>

<div class="container-profile bg-light">

    <div class="container col-lg-6 style-container bg-dark text-white"> 
        <h2 class="text-center">Profil</h2><br>
        <p>Nom : <?= $profile->pseudo(); ?></p>
        <p>Email : <?= $profile->email(); ?></p>
        <p>Date d'inscription : <?= $profile->dateInscription(); ?></p>
        <p>Statut : <?= $status ?></p>
        <a href="editprofile" class="text-center">Editer mon profil</a>
    </div>

</div>