<?php 
//We connect to the database
function dbConnect(){
    try{

        $database = new PDO('mysql:host=localhost;dbname=blog_form_php;charset=utf8', 'root', '');

        return $database;
    
        } catch(Exception $e) {
    
        die( 'Erreur : '.$e->getMessage()   );
    
    }
}