<?php
session_start();

require_once('views/View.php');

class ControllerAuthentication
{

    private $_view;
    private $_authentication;

    protected $email;
    public $password;

    public $error;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if (isset($url) && count($url) > 1) {
            echo "Error 404";
        } else if (isset($_POST['submit'])) {
            $this->_authentication = new AuthenticationManager;
            $this->checkFields();
        } else {
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
        if (!empty($_POST['emailconnect']) and !empty($_POST['passwordconnect'])) {
            $this->email = htmlspecialchars($_POST['emailconnect']);
            $this->password = htmlspecialchars($_POST['passwordconnect']);

            $this->checkEmailAndPass();
        } else {
            $this->error = "Tous les champs doivent être complétés !";
        }

        $this->authentication();
    }

    /*Vérifie que l'adresse mail et le mot le pasasse sont valide */
    private function checkEmailAndPass()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $checkUser = $this->_authentication->checkUser($this->email);

            if (password_verify($this->password, $checkUser['pass'])) {
                $_SESSION['id'] = $checkUser['id'];
                $_SESSION['pseudo'] = $checkUser['pseudo'];
                $_SESSION['email'] = $checkUser['email'];
                $_SESSION['name'] = $checkUser['name'];
                header("Location: home");
            } else {
                $this->error = "Mauvais adresse Email ou mot de passe !";
            }
        } else {
            $this->error = "Votre adresse mail n'est pas valide !";
        }
    }
}