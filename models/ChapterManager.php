<?php

class ChapterManager extends Model
{

    /*Récupère tous les chapitre*/
    public function getChapters()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Chapter($data);
        }
        return $var;
        $req->closeCursor();
    }

    /*Récupère les derniers chapitres à affichier sur la page d'accueil*/
    public function getChaptersHome()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 3');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Chapter($data);
        }
        return $var;
        $req->closeCursor();
    }

    /*Récupère un chapitre en fonction de son ID*/
    public function getChapter($id)
    {
        $req = $this->getDb()->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return new Chapter($data);
        $req->closeCursor();
    }
}
