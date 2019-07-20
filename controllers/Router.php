<?php

require_once('views/frontend/View.php');

class Router
{
    private $_ctrl;
    private $_view;

    // Gère les différentes routes en fonction des actions de l'utilisateur
    public function routeReq()
    {
        try {
            // Chargement automatique des classes
            spl_autoload_register(function ($class) {
                require_once('models/' . $class . '.php');
            });
            $url = '';

            if (isset($_GET['url'])) {
                // Récupération et séparation des paramètres de l'URL
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                // Controller sera égal au premier paramètre de l'URL
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller" . $controller;
                $controllerFile = "controllers/" . $controllerClass . ".php";

                // Vérification de l'existance du controller
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                } else {
                    throw new Exception('Page introuvable');
                }
            }
            // Si pas d'URL on charge la page d'accueil
            else {
                require_once('controllers/ControllerHome.php');
                $this->_ctrl = new ControllerHome($url);
            }
        }
        // Gestion des erreurs
        catch (Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}
