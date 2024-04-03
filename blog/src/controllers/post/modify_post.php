<?php
require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;

function modifyPost(int $id ,array $input){
    
    $title = trim($input["title"]);
    $content = trim($input["content"]);

    if(empty($title) || empty($content) ){
        throw new Exception("impossible de modifier le billet ! Les données sont vides");
    }

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $succes = $postRepository->modifyPost($id, $title, $content);

    if(!$succes){

        throw new Exception("impossible de modifier le billet !");

    } else {

        if(!headers_sent()){
            header("location: index.php?action=post&id=" . $id);
        }

    }
}