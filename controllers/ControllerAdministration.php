<?php
session_start();

require_once('views/View.php');

class ControllerAdministration {

    private $_view;
    private $_chapterManager;
    private $_commentManager;

    protected $id;
    protected $id_post;

    /* Constructeur ou l'on récupère l'url et ou on lance les actions */
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        if(isset($_GET['id']) AND !empty($_SESSION) AND $_SESSION['id'] == 1)
        {
            $this->id = $_GET['id'];
            $this->checkId($this->id);
        }
        
        if(isset($_GET['url']) == 'confirmecomment' AND isset($_GET['id_post']) AND !empty($_SESSION) AND $_SESSION['id'] == 1)
        {
            $this->id = $_GET['id'];
            $this->id_post = $_GET['id_post'];
            $this->confirmeComment($this->id, $this->id_post);
        }
        else if(isset($_GET['url']) == 'administration' AND empty($_SESSION))
        {
            throw new Exception('Page introuvable');
        }
        else if(isset($_GET['url']) == 'administration' AND $_SESSION['id'] == 1)
        {
            if(isset($_GET['deletechapter']))
            {
                $this->id = $_GET['id'];
                $this->deleteChapter($this->id);
            }
            else
            {
                $this->editionChapter();
            }
        }
        else
        {
            throw new Exception('Accès refusé !');
        }
    }

    /* Fonction qui génère la vue et affiche les données des chapitres et les commentaires signalés*/
    private function editionChapter()
    {
        $this->_chapterManager = new ChapterManager;
        $chapters = $this->_chapterManager->getChapters();

        $this->_commentManager = new CommentManager;
        $signalsComments = $this->_commentManager->getSignalComment();

        $this->_view = new View('Administration');
        $this->_view->generate(array(
            "chapters" => $chapters,
            "signalsComments" => $signalsComments
        ));
    }

    /* Fonction pour supprimer un chapitre*/
    private function deleteChapter($id)
    {
        $this->_chapterManager = new ChapterManager;
        $this->_chapterManager->deleteChapter($id);
        header('Location: administration');
    }

    private function confirmeComment($id, $id_post)
    {
        if(!empty($_SESSION) AND $_SESSION['id'] == 1)
        {
            $this->_commentManager = new CommentManager;
            $this->_commentManager->confirmeComment($id_post);
            header('Location: comment&id=' . $id);
        }
        else
        {
            throw New Exception('Impossible d\'approuver le commentaire !');
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

        $this->_view = new View('EditComment');
        $this->_view->generate(array(
            'chapter' => $chapter,
            'comments' => $comments
        ));
    }
}