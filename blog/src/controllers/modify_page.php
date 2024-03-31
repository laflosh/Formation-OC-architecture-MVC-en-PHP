<?php
require_once("src/lib/database.php");
require_once("src/model/post.php");

use Application\Model\Post\PostRepository;

function modifyPage($id){

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $post = $postRepository->getPost($id);

    require("templates/modify.php");

}