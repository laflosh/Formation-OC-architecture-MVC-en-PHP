<?php
require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;

function modifyPost(int $id ,array $input){
    
    if(!empty($input["title"]) && !empty($input["content"])) {

        $title = $input["title"];
        $content = $input["content"];

    }

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $succes = $postRepository->modifyPost($id, $title, $content);

    if(!$succes){

        throw new Exception("impossible de modifier le billet !");

    } else {

        header("location: index.php?action=post&id=" . $id);

    }
}