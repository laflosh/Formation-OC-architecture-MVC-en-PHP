<?php 

namespace Application\Model\Post;

require_once("src/lib/database.php");

class Post {

    public string $title;
    public string $fenchCreationDate;
    public string $content;
    public int $identifier;

}

class PostRepository{

    public \DatabaseConnection $connection;

    public function getPost($identifier) : Post {

        $statement = $this->connection->getConnection()-> prepare(
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

    
    public function getPosts() : array {
        //We retrieve the  last blog posts
        
        $statement = $this->connection->getConnection() -> query(
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

    public function createPost(string $title,string $content){

        $statement = $this->connection->getConnection() -> prepare(
            "INSERT INTO posts(title, content, creation_date) VALUES (? ,? , NOW())"
        );
        $affectedLines = $statement->execute([$title,$content]);

        return ($affectedLines > 0);

    }

    public function deletePost($post){

        $statement = $this->connection->getConnection() ->prepare(
            "DELETE FROM posts WHERE id = :id"
        );
        $affectedLines = $statement->execute(["id" => $post]);

        return ($affectedLines > 0);

    }
}