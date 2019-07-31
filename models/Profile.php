<?php

class Profile
{

    private $_id;
    private $_pseudo;
    private $_pass;
    private $_email;
    private $_creation_date_fr;

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

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }

    public function setPass($pass)
    {
        if (is_string($pass)) {
            $this->_pass = $pass;
        }
    }

    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_email = $email;
        }
    }

    public function setCreation_date_fr($date)
    {

        $this->_creation_date_fr = $date;
    }

    /*GETTER*/
    public function id()
    {
        return $this->_id;
    }

    public function pseudo()
    {
        return $this->_pseudo;
    }

    public function pass()
    {
        return $this->_pass;
    }

    public function email()
    {
        return $this->_email;
    }

    public function dateInscription()
    {
        return $this->_creation_date_fr;
    }
}
