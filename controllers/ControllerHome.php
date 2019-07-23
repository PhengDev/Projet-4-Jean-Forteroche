<?php
session_start();

require_once('views/frontend/View.php');

class ControllerHome {

    private $_chapterManager;
    private $_view;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count([$url]) > 1)
        {
            echo "Error 404";
        }
        else
        {
            $this->chapters();
        }
    }

    /*Récupère tous nos chapitres puis on génère la vue*/
    private function chapters()
    {
        $this->_chapterManager = new ChapterManager;
        $chapters = $this->_chapterManager->getChaptersHome();

        $this->_view = new View('Home');
        $this->_view->generate(array('chapters' => $chapters));
    }

}