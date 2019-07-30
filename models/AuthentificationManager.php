<?php

class AuthenticationManager extends Model {

    /*Jointure avec la table des rôles et récupère les informations d'un utilisateur*/
    public function checkUser($emailConnect)
    {
      
        $req = $this->getDb()->prepare('SELECT * FROM members WHERE email = :email');
        $req->execute(array('email' => $emailConnect));
        $checkUser = $req->fetch(PDO::FETCH_ASSOC);
        return $checkUser;
    }

}