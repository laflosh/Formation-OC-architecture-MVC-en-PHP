<?php
//routeur
require_once("src/controllers/homepage.php");
require_once("src/controllers/post.php");
require_once("src/controllers/comment/add_comment.php");
require_once("src/controllers/post/add_post.php");

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

            case $_GET["action"] === "addComment":

                if(isset($_GET["id"]) && $_GET["id"] > 0){

                    $identifier = $_GET["id"];

                    addComment($identifier, $_POST);

                } else {

                    throw new Exception("Erreur : auccun identifiant de billet envoyé");

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