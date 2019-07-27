<?php

class Comment
{

    private $_id;
    private $_id_post;
    private $_title_post;
    private $_author;
    private $_comment;
    private $_date_comment_fr;
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

       /*GETTER*/
    public function id()
    {
        return $this->_id;
    }

}