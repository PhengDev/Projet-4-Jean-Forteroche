<?php
session_start();

<<<<<<< HEAD
require_once('views/View.php');
=======
require_once('views/frontend/View.php');
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

class ControllerComment {

    private $_chapterManager;
    private $_commentManager;
    private $_view;

    protected $id;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'comment' AND isset($_GET['id']) AND !empty($_SESSION) AND $_SESSION['pseudo'] == 'admin')
        {
            $this->id = $_GET['id'];
            $this->checkId($this->id);
        }
        else
        {
            throw New Exception('Page introuvable !');
        }
    }

    /*Vérifie que le chapitre existe via son Id*/
    private function checkId($id)
    {
        $this->_chapterManager = new ChapterManager;
        $checkChapterId = $this->_chapterManager->checkChapterId($id);

        if($checkChapterId == 0)
        {
            throw New Exception('Chapitre introuvable !');
        }
        else
        {
            $this->comment($id);
        }
    }
   
    /*Affiche les commentaires d'un chapitre via l'id*/
    public function comment($id)
    {
        $this->_chapterManager = new ChapterManager;
        $chapter = $this->_chapterManager->getChapter($id);

        $this->_commentManager = new CommentManager;
        $comments = $this->_commentManager->getComments($id);

        $this->_view = new View('Comment');
        $this->_view->generate(array(
            'chapter' => $chapter,
            'comments' => $comments
        ));
    }

}