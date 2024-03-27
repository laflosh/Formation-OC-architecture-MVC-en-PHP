<?php 
//We connect to the database
function dbConnect(){

    $database = new PDO('mysql:host=localhost;dbname=blog_form_php;charset=utf8', 'root', '');

    return $database;

}