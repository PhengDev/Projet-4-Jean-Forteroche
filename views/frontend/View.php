<?php

class View
{

    private $_file;
    private $_t;

    /* Récupère le nom de la vue dans le constructeur*/
    public function __construct($action)
    {
        $this->_file = 'views/frontend/view' . $action . '.php';
    }

    /*Génère et affiche la vue*/
    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);
        $view = $this->generateFile('views/frontend/template.php', array(
            't' => $this->_t,
            'content' => $content
        ));

        // Affichage de la vue
        echo $view;
    }

    /*Génère un fichier vue et renvoie le résultat produit*/
    private function generateFile($file, $data)
    {
        // Si le fichier existe
        if (file_exists($file)) {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        } else {
            throw new Exception('Fichier ' . $file . ' introuvable');
        }
    }
}