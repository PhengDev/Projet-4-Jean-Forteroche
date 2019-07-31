<?php

<<<<<<< HEAD
class ChapterManager extends Model
{
=======
class ChapterManager extends Model {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0

    /*Récupère tous les chapitre*/
    public function getChapters()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date');
        $req->execute();
<<<<<<< HEAD
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
=======
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
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
<<<<<<< HEAD
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
=======
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            $var[] = new Chapter($data);
        }
        return $var;
        $req->closeCursor();
    }

    /*Récupère un chapitre en fonction de son ID*/
    public function getChapter($id)
    {
<<<<<<< HEAD
        $req = $this->getDb()->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
=======
        $req = $this->getDb()->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y à %Hh%imin%ss\') AS modification_date_fr FROM posts WHERE id = ?');
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
        $req->execute(array($id));
        $data = $req->fetch();
        return new Chapter($data);
        $req->closeCursor();
    }

    /*Insérer un nouveau chapitre dans la base de données*/
    public function insertChapter($title, $author, $content)
    {
        $req = $this->getDb()->prepare('INSERT INTO posts(title, author, content, creation_date) VALUES (:title, :author, :content, NOW())');
        $insertChapter = $req->execute(array(
            'title' => $title,
            'author' => $author,
            'content' => $content
        ));
        return $insertChapter;
    }

    /*Supprimer un chapitre de la base de données*/
    public function deleteChapter($id)
    {
        $req = $this->getDb()->prepare('DELETE FROM posts WHERE id = ?');
        $deleteChapter = $req->execute(array($id));
        return $deleteChapter;
    }

    /*Mettre à jour un chapitre*/
    public function updateChapter($id, $title, $author, $content)
    {
<<<<<<< HEAD
        $req = $this->getDb()->prepare('UPDATE posts SET title = :newtitle, author = :newauthor, content = :newcontent WHERE id = :thisid');
        $updateChapter = $req->execute(array(
            'thisid' => $id,
=======
        $req = $this->getDb()->prepare('UPDATE posts SET title = :newtitle, author = :newauthor, content = :newcontent, modification_date = NOW() WHERE id =' . $id);
        $updateChapter = $req->execute(array(
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
            'newtitle' => $title,
            'newauthor' => $author,
            'newcontent' => $content
        ));
        return $updateChapter;
    }

    /*Vérifier qu'un id corresponde bien à un chapitre*/
    public function checkChapterId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($id));
        $checkChapterId = $req->rowCount();
        return $checkChapterId;
        $req->closeCursor();
    }
<<<<<<< HEAD
}
=======

}
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
