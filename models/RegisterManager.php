<?php

class RegisterManager extends Model
{

    /*CHECK INFO BDD*/
    public function checkPseudo($pseudo)
    {
        $req = $this->getDb()->prepare('SELECT * FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $checkPseudo = $req->rowCount();
        return $checkPseudo;
        $req->closeCursor();
    }

    public function checkEmail($email)
    {
        $req = $this->getDb()->prepare('SELECT * FROM members WHERE email = ?');
        $req->execute(array($email));
        $checkEmail = $req->rowCount();
        return $checkEmail;
        $req->closeCursor();
    }

    public function newRegister($pseudo, $passwordHash, $email)
    {
        $req = $this->getDb()->prepare('INSERT INTO members(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $newRegister = $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $passwordHash,
            'email' => $email
        ));
        return $newRegister;
        $newRegister->closeCursor();
    }
}