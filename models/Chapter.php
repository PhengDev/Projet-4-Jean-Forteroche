<?php

class Chapter
{

    private $_id;
    private $_title;
    private $_author;
    private $_content;
    private $_creation_date_fr;
    private $_modification_date_fr;


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

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
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
}
