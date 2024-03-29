<?php
//controlleur d'ajoout de commentaire sur un billet 
require_once('src/lib/database.php');
require_once('src/model/comment.php');

function addComment(string $post, array $input) {

    $author = null;
    $comment = null;

    if(!empty($input["author"]) && !empty($input["comment"])) {

        $author = $input["author"];
        $comment = $input["comment"];

    } else {

        throw new Exception("Les données du formulaire sont invalides");

    }

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $succes = $commentRepository->createComment($post, $author, $comment);

    if(!$succes){

        throw new Exception("impossible d\' ajouter le commentaire !");

    } else {
        
        header("location: index.php?action=post&id=" . $post);

    }

}