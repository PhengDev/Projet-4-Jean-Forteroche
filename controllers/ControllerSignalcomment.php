<?php
session_start();

require_once('views/View.php');

class ControllerSignalcomment
{

    private $_commentManager;

    protected $id;
    protected $id_post;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if (isset($url) && count($url) > 1) {
            echo "Error 404";
        } else if (isset($_GET['url']) == 'signalcomment' and isset($_GET['id_post']) and !empty($_SESSION)) {
            $this->id = $_GET['id'];
            $this->id_post = $_GET['id_post'];
            $this->signalComment($this->id, $this->id_post);
        } else {
            throw new Exception('Page introuvable !');
        }
    }

    /*Signaler un commentaire*/
    public function signalComment($id, $id_post)
    {
        if (!empty($_SESSION)) {
            $this->_commentManager = new CommentManager;
            $this->_commentManager->signalComment($id_post);
            header('Location: chapter&id=' . $id);
        } else {
            throw new Exception('Impossible d\'utiliser cette fonction !');
        }
    }
}