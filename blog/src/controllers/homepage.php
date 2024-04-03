<?php 
//Homepage controlleur
require_once("src/lib/database.php");
require_once("src/model/post.php");

use Application\Model\Post\PostRepository;

function homepage(){

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository($connection);
    $postRepository->connection = $connection;
    $posts = $postRepository->getPosts();

    require("templates/homepage.php");

}