<?php 

class Post {

    public string $title;
    public string $fenchCreationDate;
    public string $content;
    public int $identifier;

}

class PostRepository{

    public ?PDO $database = null;

    public function getPost($identifier){

        require_once("database/databaseAcces.php");

        $this->dbConnect();
        $statement = $this->database-> prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
            AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);
    
        $row = $statement->fetch();
    
        $post = new Post();
        $post->title = $row["title"];
        $post->frenchCreationDate = $row["french_creation_date"];
        $post->content = $row["content"];
        $post->identifier = $row["id"];
    
        return $post;
    
    }

    
    public function getPosts() {
        //We retrieve the  last blog posts
        
        $this->dbConnect();
        $statement = $this->database -> query(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
            AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );

        $posts = [];

        while(($row = $statement->fetch())) {

            $post = new Post();
            $post->title = $row["title"];
            $post->frenchCreationDate = $row["french_creation_date"];
            $post->content = $row["content"];
            $post->identifier = $row["id"];

            $posts[] = $post;

        }

        return $posts;
    }

    public function dbConnect(){

        if($this->database === null){
    
            require("database/config.php");
    
            $this->database = new PDO(
                sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
                MYSQL_USER,
                MYSQL_PASSWORD,
            );
    
        }
    
    }

}