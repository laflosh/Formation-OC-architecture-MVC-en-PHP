<?php
require_once('src/lib/database.php');
require_once('src/model/comment.php');

function deleteComment($comment, $post){

    $connection = new DatabaseConnection();

    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $succes = $commentRepository->deleteComment($comment);

    if(!$succes){

        throw new Exception("impossible de supprimer le billet !");

    } else {

        header("location:index.php?action=post&id=" . $post);

    }

}