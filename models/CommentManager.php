<?php

<<<<<<< HEAD
class CommentManager extends Model
{

    /*Insérer des commentaires dans la base de données*/
    public function insertComment($id, $title, $author, $comment)
    {

        $req = $this->getDb()->prepare('INSERT INTO comments(id_post, title_post, author, comment) VALUES (:id_post, :title_post, :author, :comment)');
=======
class CommentManager extends Model {

   /*Insérer des commentaires dans la base de données*/
    public function insertComment($id, $title, $author, $comment)
    {
        $req = $this->getDb()->prepare('INSERT INTO comments(id_post, title_post, author, comment, date_comment) VALUES (:id_post, :title_post, :author, :comment, NOW())');
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
        $insertComment = $req->execute(array(
            'id_post' => $id,
            'title_post' => $title,
            'author' => $author,
            'comment' => $comment
        ));
        return $insertComment;
    }

    /*Récupérer les commentaires d'un chapitre avec son id*/
    public function getComments($id)
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS date_comment_fr, DATE_FORMAT(date_modification, \'%d/%m/%Y\') AS date_modification_fr, check_comment FROM comments WHERE id_post = ? ORDER BY date_comment');
        $req->execute(array($id));
<<<<<<< HEAD
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Comment($data);
        }
        $req->closeCursor();
        return $var;
=======
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Comment($data);
        }
        return $var;
        $req->closeCursor();
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
    }

    /*Récupérer les commentaires signalés*/
    public function getSignalComment()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, id_post, title_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr, check_comment FROM comments WHERE check_comment = 2 ORDER BY date_comment');
        $req->execute(array());
<<<<<<< HEAD
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Comment($data);
        }

        $req->closeCursor();
        return $var;
=======
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Comment($data);
        }
        return $var;
        $req->closeCursor();
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
    }

    /*Récupérer un commentaire via son id*/
    public function getComment($id)
    {
        $req = $this->getDb()->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, check_comment FROM comments WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
<<<<<<< HEAD
        $req->closeCursor();
        return new Comment($data);
=======
        return new Comment($data);
        $req->closeCursor();
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
    }

    /*Supprimer un commentaire*/
    public function deleteComment($id)
    {
        $req = $this->getDb()->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $req->execute(array($id));
        return $deleteComment;
    }

<<<<<<< HEAD
=======
    /*Mettre à jour un commentaire*/
    public function updateComment($id, $comment)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET comment = :newcomment, date_modification = NOW() WHERE id =' . $id);
        $updateComment = $req->execute(array(
            'newcomment' => $comment
        ));
        return $updateComment;
    }

>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
    /*Approuver un commentaire*/
    public function confirmeComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET check_comment = 1 WHERE id = ?');
        $confirmeComment = $req->execute(array($id));
        return $confirmeComment;
    }

<<<<<<< HEAD
    /*Vérifier qu'un id corresponde bien à un commentaire*/
    public function checkCommentId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($id));
        $checkCommentId = $req->rowCount();
        $req->closeCursor();
        return $checkCommentId;
=======
    /*Annuler un commentaire*/
    public function cancelComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET check_comment = 0 WHERE id = ?');
        $cancelComment = $req->execute(array($id));
        return $cancelComment;
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
    }

    /*Signaler un commentaire*/
    public function signalComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET check_comment = 2 WHERE id = ?');
        $signalComment = $req->execute(array($id));
        return $signalComment;
    }

<<<<<<< HEAD
    /*Censurer un commentaire*/
    public function censorComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET check_comment = 0 WHERE id = ?');
        $censorComment = $req->execute(array($id));
        return $censorComment;
    }

}
=======
    /*Vérifier qu'un id corresponde bien à un commentaire*/
    public function checkCommentId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($id));
        $checkCommentId = $req->rowCount();
        return $checkCommentId;
        $req->closeCursor();
    }

}
>>>>>>> 565928eb8b1d596b75d72e85f9aa745f3de721c0
