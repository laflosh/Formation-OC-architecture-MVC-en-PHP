<?php
require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;

function addPost(array $input){

    $title = null;
    $content = null;

    if(!empty($input["title"]) && !empty($input["content"])) {

        $title = $input["title"];
        $content = $input["content"];

    } else {

        throw new Exception("Les données du formulaire sont invalides");

    }

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository($connection);
    $succes = $postRepository->createPost($title,$content);

    if(!$succes){

        throw new Exception("impossible d\' ajouter le billet !");

    } else {

        header("location:index.php");

    }

}