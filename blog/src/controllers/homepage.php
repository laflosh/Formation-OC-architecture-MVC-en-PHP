<?php 
//Homepage controlleur
require_once("src/model.php");

function homepage(){

    $posts = getPosts();

    require("templates/homepage.php");

}