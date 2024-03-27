<?php
//routeur
require_once("src/controllers/homepage.php");
require_once("src/controllers/post.php");
require_once("src/controllers/add_comment.php");

if(isset($_GET["action"]) && $_GET["action"] !== ""){

    switch($_GET["action"]) {

        case $_GET["action"] === "post":

            if(isset($_GET["id"]) && $_GET["id"] > 0) {

                $identifier = $_GET["id"];
    
                post($identifier);
            
            } else {
            
                echo "Erreur : aucun identifiant de billet envoyé";
            
                die;
            
            }
            break;

        case $_GET["action"] === "addComment":

            if(isset($_GET["id"]) && $_GET["id"] > 0){

                $identifier = $_GET["id"];

                addComment($identifier, $_POST);

            } else {

                echo "Erreur : auccun identifiant de billet envoyé";

                die;

            }

            break;
            
        default:
            echo "Erreur 404 : la page que vous rechercher n'existe pas ";
    }

} else {

    homepage();

}