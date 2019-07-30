<?php
session_start();

class ControllerDisconnection {

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'disconnection')
        {
            $this->disconnection();
        }
    }

    /*Déconnecter l'utilisateur*/
    private function disconnection()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: home");
    }

}