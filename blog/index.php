<?php 
//Homepage controlleur
require("src/model.php");

$posts = getPosts();

require("templates/homepage.php");