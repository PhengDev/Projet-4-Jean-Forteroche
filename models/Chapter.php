<?php

<<<<<<< HEAD
class Chapter
{
=======
class Chapter {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

    private $_id;
    private $_title;
    private $_author;
    private $_content;
    private $_creation_date_fr;
    private $_modification_date_fr;

<<<<<<< HEAD

    // CONSTRUCTOR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
=======
   
    // CONSTRUCTOR
    public function __construct(array $data) {
        $this->hydrate($data);
    }

     // HYDRATATION
     public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)) {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
                $this->$method($value);
            }
        }
    }
<<<<<<< HEAD
=======
    
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

    /*SETTER*/
    public function setId($id)
    {
        $id = (int) $id;

<<<<<<< HEAD
        if ($id > 0) {
=======
        if($id > 0)
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            $this->_id = $id;
        }
    }

    public function setTitle($title)
    {
<<<<<<< HEAD
        if (is_string($title)) {
=======
        if(is_string($title))
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            $this->_title = $title;
        }
    }

    public function setAuthor($author)
    {
<<<<<<< HEAD
        if (is_string($author)) {
=======
        if(is_string($author))
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            $this->_author = $author;
        }
    }

    public function setContent($content)
    {
<<<<<<< HEAD
        if (is_string($content)) {
=======
        if(is_string($content))
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            $this->_content = $content;
        }
    }

    public function setCreation_Date_Fr($dateCreation)
    {
        $this->_creation_date_fr = $dateCreation;
    }

    public function setModification_Date_Fr($dateModification)
    {
        $this->_modification_date_fr = $dateModification;
    }

    /*GETTER*/
    public function id()
    {
        return $this->_id;
    }

    public function title()
    {
        return $this->_title;
    }

    public function author()
    {
        return $this->_author;
    }

    public function content()
    {
        return $this->_content;
    }

    public function date()
    {
        return $this->_creation_date_fr;
    }

    public function dateModification()
    {
        return $this->_modification_date_fr;
    }
<<<<<<< HEAD
}
=======

}
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
