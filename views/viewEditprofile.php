<?php $this->_t = "Edition du profil" ?>

<!-- Edition du profil -->
<div class="container-page bg-light">
<div class="container col-lg-8 style-link text-center">
        <a href="profile&id=<?= $_SESSION['id']?>" class="bg-primary text-white backup">Retour au profil</a>
    </div>
    <div class="container col-lg-3 style-container bg-secondary">
        <h2 class="style-contact-title text-center ">Edition du profil</h2>
        <form action="editprofile" method="POST" class="form-register">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="inputnewpseudo">Nouveau pseudo :</label>
                    <input type="text" name="newPseudo" class="form-control" id="inputnewpseudo" value="<?= $_SESSION['pseudo'] ?>">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="inputnewpassword">Nouveau mot de passe :</label>
                    <input type="password" name="newPassword" class="form-control" id="inputnewpassword">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="inputnewpassverif">Confirmation du mot de passe :</label>
                    <input type="password" name="confirmPassword" class="form-control" id="inputnewpassverif">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="inputnewemail">Nouvel email :</label>
                    <input type="email" name="newEmail" class="form-control" id="inputnewemail" value="<?= $_SESSION['email'] ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Mettre à jour le profil</button>
            </div>
        </form>
    </div>
    <p class="text-center text-danger font-weight-bold style-register-error"><?php if (isset($error)) {
                                                                                        echo $error;
                                                                                    } ?></p>
        <p class="text-center text-success font-weight-bold style-register-error"><?php if (isset($msg)) {
                                                                                        echo $msg;
                                                                                    } ?></p>
</div>