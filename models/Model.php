<?php

abstract class Model
{
    private static $_db;

    // INSCANCIE DE LA CONNEXION A LA BDD
    private static function setDb()
    {
        self::$_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // RECUPERE LA CONNEXION A LA BDD
    protected function getDb()
    {
        self::setDb();
        return self::$_db;
    }

    // RECUPERE TOUTES LES DONNES D'UNE TABLE
    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM ' . $table . ' ORDER BY id DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}
