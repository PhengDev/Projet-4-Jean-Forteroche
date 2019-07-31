<?php
session_start();

require_once('views/View.php');

class ControllerEditprofile {

    private $_view;
    private $_profileManager;
    private $_register;

    protected $newPseudo;
    protected $newPassword;
    protected $confirmPassword;
    protected $newEmail;

    public $error;
    public $msg;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_POST['submit']))
        {
            $this->_profileManager = new ProfileManager;
            $this->_register = new RegisterManager;

            if(isset($_POST['newPseudo']))
            {
                $this->checkFieldNewPseudo();
            }

            if(isset($_POST['newEmail']))
            {
                $this->checkFieldNewEmail();
            }

            if($_POST['newPassword'] != "")
            {
                $this->checkFieldNewPassword();
            }
            $this->editProfile();
        }
        else if(isset($_SESSION['id']))
        {
            $this->editProfile();
            
        }
        else
        {
            throw new Exception('Page introuvable !');
        }
    }

    /*Génère la vue de la page */
    private function editProfile()
    {
        $this->_view = new View('Editprofile');
        $this->_view->generate(array(
            'error' => $this->error,
            'msg' => $this->msg
        ));
       
    }
   
    /*Vérifie le champ pseudo*/
    private function checkFieldNewPseudo()
    {
       
        if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']))
        {
            $this->newPseudo = htmlspecialchars($_POST['newPseudo']);
            $this->checkLengthNewPseudo();
        }
        else
        {
            $this->error = "Le pseudo est identique ou vide !";
        }
    }

    /*Vérifie la longueur du pseudo */
    private function checkLengthNewPseudo()
    {
        $pseudoLength = strlen($this->newPseudo);

        if($pseudoLength <= 255)
        {
            $this->checkNewPseudoExist();
        }
        else
        {
            $this->error = "Votre pseudo ne doit pas dépasser 255 caractères !";
        } 
    }

    /*Vérifie que le pseudo n'est pas déjà présent dans la base de données */
    private function checkNewPseudoExist()
    {
        $checkNewPseudo = $this->_register->checkPseudo($this->newPseudo);

        if($checkNewPseudo == 0)
        {
            $this->_profileManager->updatePseudo($this->newPseudo, $_SESSION['id']);
            $_SESSION['pseudo'] = $_POST['newPseudo'];
           
        }
        else if ( $_SESSION['pseudo'] != $_POST['newPseudo'])
        {
            $this->error = "Pseudo déjà utilisé !";
        }
    }

    /*Vérifie le champ email*/
    private function checkFieldNewEmail()
    {
        if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']))
        {
            $this->newEmail = htmlspecialchars($_POST['newEmail']);
            $this->checkNewEmailExist();
            $this->msg = "Vos modification ont bien été effectuer !";
        }
        else
        {
            $this->error = "L'adresse email est identique ou vide !";
        }
    }

    /*Vérifie que l'email n'est pas déjà présent dans la base données*/
    private function checkNewEmailExist()
    {
        $checkNewEmail = $this->_register->checkEmail($this->newEmail);

        if(filter_var($this->newEmail, FILTER_VALIDATE_EMAIL))
        {
            if($checkNewEmail == 0)
            {
                $this->_profileManager->updateEmail($this->newEmail, $_SESSION['id']);
                $_SESSION['email'] = $_POST['newEmail'];
                $this->msg = "Vos modification ont bien été effectuer !";
            }
            else if ( $_SESSION['email'] != $_POST['newEmail'])
            {
                $this->error = "Adresse email déjà utilisée !";
            }
        }
        else
        {
            $this->error = "Votre adresse mail n'est pas valide !";
        }   
    }

    /*Vérifie les champs des mots de passe*/
    private function checkFieldNewPassword()
    {
        if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['confirmPassword']) AND !empty($_POST['confirmPassword']))
        {
            $this->newPassword = htmlspecialchars($_POST['newPassword']);
            $this->confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            $this->checkNewPassword();
        }
        else
        {
            $this->error = "Veuillez remplir les champs des mots de passe !";
        }
    }

    /*Vérifie que les mots de passe et on remplace l'ancien mdp par le nouveau dans la base de données*/
    private function checkNewPassword()
    {
        if($this->newPassword == $this->confirmPassword)
        {
            $passwordHash = password_hash($this->newPassword, PASSWORD_DEFAULT);
            $this->_profileManager->updatePassword($passwordHash, $_SESSION['id']);
            $this->msg = "Vos modification ont bien été effectuer !";
        }
        else
        {
            $this->error = "Vos mot de passe ne correspondent pas !";
            $this->msg = "";
        }
    }
}