<?php
session_start();

<<<<<<< HEAD
require_once('views/View.php');
=======
require_once('views/frontend/View.php');
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

class ControllerBook {
    
    private $_chapterManager;
    private $_view;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else
        {
            $this->chapters();
        }
    }

    /*Récupère tous nos chapitre puis on génère la vue*/
    private function chapters()
    {
        $this->_chapterManager = new ChapterManager;
        $chapters = $this->_chapterManager->getChapters();

        $this->_view = new View('Book');
        $this->_view->generate(array('chapters' => $chapters));
    }
}