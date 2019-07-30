<?php
session_start();

require_once('views/View.php');

class Controllercensorcomment {

    private $_commentManager;
    
    protected $id;
    protected $id_post;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'censorcomment' AND isset($_GET['id_post']) AND !empty($_SESSION) AND $_SESSION['id'] == 1)
        {
            $this->id = $_GET['id'];
            $this->id_post = $_GET['id_post'];
            $this->censorComment($this->id, $this->id_post);
        }
        else
        {
            throw New Exception('Page introuvable !');
        }
    }

    /*Censurer un commentaire*/
    private function censorComment($id, $id_post)
    {
        if(!empty($_SESSION) AND $_SESSION['id'] == 1)
        {
            $this->_commentManager = new CommentManager;
            $this->_commentManager->censorComment($id_post);
            header('Location: comment&id=' . $id);
        }
        else
        {
            throw New Exception('Impossible de censurer le commentaire !');
        }  
    }

}