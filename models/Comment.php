<?php

class Comment
{

    private $_id;
    private $_id_post;
    private $_title_post;
    private $_author;
    private $_comment;
    private $_date_comment_fr;
    private $_date_modification_fr;
    private $_check_comment;

    /*CONSTRUCTOR*/
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /*HYDRATATION*/
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /*SETTER*/
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setId_Post($id_post)
    {
        $id_post = (int) $id_post;

        if ($id_post > 0) {
            $this->_id_post = $id_post;
        }
    }

    public function setTitle_Post($title_post)
    {
        if (is_string($title_post)) {
            $this->_title_post = $title_post;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setComment($comment)
    {
        if (is_string($comment)) {
            $this->_comment = $comment;
        }
    }

    public function setDate_Comment_Fr($dateComment)
    {
        $this->_date_comment_fr = $dateComment;
    }

    public function setDate_Modification_Fr($dateModification)
    {
        $this->_date_modification_fr = $dateModification;
    }

    public function setCheck_Comment($checkComment)
    {
        $this->_check_comment = $checkComment;
    }

    /*GETTER*/
    public function id()
    {
        return $this->_id;
    }

    public function idPost()
    {
        return $this->_id_post;
    }

    public function titlePost()
    {
        return $this->_title_post;
    }

    public function author()
    {
        return $this->_author;
    }

    public function comment()
    {
        return $this->_comment;
    }

    public function dateComment()
    {
        return $this->_date_comment_fr;
    }

    public function dateModification()
    {
        return $this->_date_modification_fr;
    }

    public function checkComment()
    {
        return $this->_check_comment;
    }
}
