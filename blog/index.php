<?php
//routeur
require_once("src/controllers/homepage.php");
require_once("src/controllers/post.php");
require_once("src/controllers/modify_page.php");
require_once("src/controllers/post/add_post.php");
require_once("src/controllers/post/delete_post.php");
require_once("src/controllers/post/modify_post.php");
require_once("src/controllers/comment/add_comment.php");
require_once("src/controllers/comment/delete_comment.php");

try {

    if(isset($_GET["action"]) && $_GET["action"] !== ""){

        switch($_GET["action"]) {

            case $_GET["action"] === "post":

                if(isset($_GET["id"]) && $_GET["id"] > 0) {

                    $identifier = $_GET["id"];
        
                    post($identifier);
                
                } else {
                
                    throw new Exception("Erreur : aucun identifiant de billet envoyé");
                
                }
                break;

            case $_GET["action"] === "addPost":

                    addPost($_POST);
    
                break;

            case $_GET["action"] === "deletePost":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifier = $_GET["id"];

                    deletePost($identifier);

                }

                break;

            case $_GET["action"] === "modifyPost":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifier = $_GET["id"];

                    modifyPost($identifier, $_POST); 

                }

                break;
            
            case $_GET["action"] === "modifyPage":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifier = $_GET["id"];

                    modifyPage($identifier); 

                }

                break;

            case $_GET["action"] === "addComment":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifier = $_GET["id"];

                    addComment($identifier, $_POST);

                } else {

                    throw new Exception("Erreur : auccun identifiant de billet envoyé");

                }

                break;

            case $_GET["action"] === "deleteComment":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifierComment = $_GET["id"];
                    $identifierPost = $_GET["postId"];

                    deleteComment($identifierComment,$identifierPost);

                }  
                
                break;

            default:
                throw new Exception("Erreur 404 : la page que vous rechercher n'existe pas ");
        }

    } else {

        homepage();

    }

} catch(Exception $e) {

    $errorMessage = "Erreur :" . $e->getMessage();

    require_once("templates/error.php");
}