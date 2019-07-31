<?php
session_start();

require_once('views/View.php');

class ControllerAuthentication {

    private $_view;
    private $_authentication;

    protected $email;
    protected $password;

    public $error;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_POST['submit']))
        {
            $this->_authentication = new AuthenticationManager;
            $this->checkFields();
        }
        else
        {
            $this->authentication();
        }
    }

    /*Génère la vue de la page de connexion*/
    private function authentication()
    {
        $this->_view = new View('Authentication');
        $this->_view->generate(array(
            'error' => $this->error
        ));
    }

    /*Récupère les variables POST et affiche la vue de la page d'inscription*/
    private function checkFields()
    {
        if(!empty($_POST['emailConnexion']) AND !empty($_POST['passwordConnexion']))
        {
            $this->email = htmlspecialchars($_POST['emailConnexion']);
            $this->password = htmlspecialchars($_POST['passwordConnexion']);

            $this->checkEmail();
        }
        else
        {
            $this->error = "Tous les champs doivent être complétés !";
        }

        $this->authentication();
    }

    /*Vérifie que l'adresse mail est valide */
    private function checkEmail()
    {
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $checkUser = $this->_authentication->checkUser($this->email);
            $checkPass = password_verify($this->password, $checkUser['pass']);

            $this->checkPassword($checkPass, $checkUser);
        }
        else
        {
            $this->error = "Votre adresse mail n'est pas valide !";
        }
    }

    /* Vérifie le mot de passe associé à l'adresse mail entrée dans le champ
     et récupération des informations de l'utilisateur dans des variables de sessions */
    private function checkPassword($checkPass, $checkUser)
    {
        if($checkPass)
        {
            $_SESSION['id'] = $checkUser['id'];
            $_SESSION['pseudo'] = $checkUser['pseudo'];
            $_SESSION['email'] = $checkUser['email'];
            $_SESSION['name'] = $checkUser['name'];

            header("Location: home");
        }
        else
        {
            $this->error = "Mauvais identifiant ou mot de passe !";
        }
    }
}