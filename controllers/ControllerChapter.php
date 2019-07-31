<?php
session_start();

<<<<<<< HEAD
require_once('views/View.php');
=======
require_once('views/frontend/View.php');
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

class ControllerChapter {
    
    private $_chapterManager;
    private $_view;
    private $_commentManager;

    protected $id;
    protected $id_post;
    protected $author;
    protected $comment;

    public $error;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'chapter')
        {
            if(isset($_POST['submit']))
            {
                $this->checkComment();
            }
            else
            {
                $this->id = $_GET['id'];
                $this->checkId($this->id);
            }
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
            $this->chapter($id);
        }
    }

    /*Récupère le chapitre et les commentaires via l'ID*/
    private function chapter($id)
    {
        $this->_chapterManager = new ChapterManager;
        $chapter = $this->_chapterManager->getChapter($id);

        $this->_commentManager = new CommentManager;
        $comments = $this->_commentManager->getComments($id);

        $this->_view = new View('Chapter');
        $this->_view->generate(array(
            'chapter' => $chapter,
            'comments' => $comments,
            'error' => $this->error
        ));
    }

    /*Vérifie le commentaire*/
    private function checkComment()
    {
        if(!empty($_POST['comment']))
        {
            $this->author = $_SESSION['pseudo'];
            $this->id = $_GET['id'];
            $this->comment = htmlspecialchars($_POST['comment']);

            $this->_chapterManager = new ChapterManager;
            $chapter = $this->_chapterManager->getChapter($this->id);

            $this->_commentManager = new CommentManager;
            $this->_commentManager->insertComment($this->id, $chapter->title(), $this->author, $this->comment);
            $this->chapter($this->id);
        }
        else
        {
            $this->error = "Veuillez écrire un commentaire !";
            $this->id = $_GET['id'];
            $this->chapter($this->id);
        }
    }
}