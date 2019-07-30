<?php
session_start();

require_once('views/View.php');

class ControllerEditcomment {

    private $_view;
    private $_chapterManager;
    private $_commentManager;

    protected $id;
    protected $id_post;
    protected $newComment;

    public $error;
    public $msg;

    /*CONSTRUCTOR*/
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            echo "Error 404";
        }
        else if(isset($_GET['url']) == 'editcomment' AND !empty($_SESSION))
        {
            $this->id = $_GET['id'];
            $this->id_post = $_GET['id_post'];
            $this->checkId($this->id);
            $this->checkCommentId($this->id_post);

            if(isset($_POST['submit']))
            {
                $this->editComment($this->id, $this->id_post);
            }
            else
            {
                $this->editComment($this->id, $this->id_post);
            }
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
    }

    /*Vérifie que le commentaire existe via son Id*/
    private function checkCommentId($id_post)
    {
        $this->_commentManager = new CommentManager;
        $checkCommentId = $this->_commentManager->checkCommentId($id_post);

        if($checkCommentId == 0)
        {
            throw New Exception('Commentaire introuvable !');
        }
    }
}