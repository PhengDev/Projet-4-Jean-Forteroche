<?php

class ProfileManager extends Model
{

    /*GET*/
    public function getProfile($id)
    {
        $req = $this->getDb()->prepare('SELECT id, pseudo, email, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS creation_date_fr  FROM members WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        $req->closeCursor();
        return new Profile($data);
    }

    /*UPDATE*/
    public function updatePseudo($newPseudo, $id)
    {
        $req = $this->getDb()->prepare('UPDATE members SET pseudo = ? WHERE id = ?');
        $req->execute(array($newPseudo, $id));
        $req->closeCursor();
    }

    public function updateEmail($newEmail, $id)
    {
        $req = $this->getDb()->prepare('UPDATE members SET email = ? WHERE id = ?');
        $req->execute(array($newEmail, $id));
        $req->closeCursor();
    }

    public function updatePassword($newPassword, $id)
    {
        $req = $this->getDb()->prepare('UPDATE members SET pass = ? WHERE id = ?');
        $req->execute(array($newPassword, $id));
        $req->closeCursor();
    }
}