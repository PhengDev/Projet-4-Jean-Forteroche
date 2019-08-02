<?php
session_start();

require_once('views/View.php');

class ControllerNewchapter {

    private $_view;
    private $_chapterManager;

    protected $title;
    protected $content;
    protected $author;

    public $error;
    public $msg;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'newchapter' AND empty($_SESSION))
        {
            throw new Exception('Page introuvable');
        }
        else if(isset($_GET['url']) == 'newchapter' AND $_SESSION['id'] == 1)
        {
            if(isset($_POST['submit']))
            {
                $this->_chapterManager = new ChapterManager;
                $this->checkChapter();
                $this->newChapter();
            }
            else
            {
                $this->newChapter();
            }
        }
        else
        {
            throw new Exception('Accès refusé !');
        }
    }

    /*Génère la vue de la page de publication d'un article*/
    private function newChapter()
    {
        $this->_view = new View('Newchapter');
        $this->_view->generate(array(
            'error' => $this->error,
            'msg' => $this->msg
        ));
    }

    /*Vérifie les champs et insert le chapitre dans la base de données*/
    private function checkChapter()
    {
        if(isset($_POST['chapter_title']) AND !empty($_POST['chapter_title']) AND isset($_POST['chapter_content']) AND !empty($_POST['chapter_title']))
        {
            $this->title = htmlspecialchars($_POST['chapter_title']);
            $this->author = 'Jean Forteroche';
            $this->content = htmlspecialchars($_POST['chapter_content']);

            $this->_chapterManager->insertChapter($this->title, $this->author, $this->content);
            $this->msg = "Votre chapitre a été publié !";
        }
        else
        {
            $this->error = "Veuillez remplir tous les champs !";
        } 
    }

}