<?php
require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once("src/model/comment.php");

use Application\Model\Post\PostRepository;

function deletePost($post){

    $connection = new DatabaseConnection();

    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $commentRepository->deleteCommentForOnePost($post);

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $succes = $postRepository->deletePost($post);

    if(!$succes){

        throw new Exception("impossible de supprimer le billet !");

    } else {

        header("location:index.php");

    }

}