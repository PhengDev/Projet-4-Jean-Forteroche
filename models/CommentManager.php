<?php

class CommentManager extends Model {

   /*Insérer des commentaires dans la base de données*/
   public function insertComment($id, $title, $author, $comment)
   {
  
       $req = $this->getDb()->prepare('INSERT INTO comments(id_post, title_post, author, comment) VALUES (:id_post, :title_post, :author, :comment)');
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
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Comment($data);
        }
        $req->closeCursor();
        return $var;
    }
}