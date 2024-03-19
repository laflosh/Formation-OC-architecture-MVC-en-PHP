<?php 
    //We connect to the database
    try{

        $database = new PDO('mysql:host=localhost;dbname=blog_form_php;charset=utf8', 'root', '');
    
        } catch(Exception $e) {
    
        die( 'Erreur : '.$e->getMessage()   );
    
    }
?>