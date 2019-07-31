<?php
session_start();

require_once('views/View.php');

class ControllerProfile
{

    private $_profileManager;
    private $_view;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if (isset($url) && count($url) > 1) {
            echo "Error 404";
        } else if (empty($_SESSION)) {
            throw new Exception('Profil introuvable');
        } else if (isset($_GET['url']) == 'profile') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] = $_SESSION['id']) {
                $this->profile($_GET['id']);
            }
        }
    }

    /*Génère la vue, récupère les données du profil et les envoies à la vue*/
    public function profile($id)
    { 
        $this->_profileManager = new ProfileManager;
        $profile = $this->_profileManager->getProfile($id);
       
        $this->_view = new View('Profile');
        $this->_view->generate(array('profile' => $profile));
    }
}
