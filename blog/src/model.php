<?php 
function getPosts() {
    
    require("database/databaseAcces.php");
    //We retrieve the  last blog posts
    $statement = $database -> query(
    "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') 
    AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5"
    );

    $posts = [];

    while(($row = $statement->fetch())) {

    $post = [
        "title" => $row["titre"],
        "french_creation_data" => $row["date_creation_fr"],
        "content" => $row["contenu"],
    ];

    $posts[] = $post;

    }

    return $posts;
}
?>