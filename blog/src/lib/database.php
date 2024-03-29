<?php

class DatabaseConnection {

    public ?PDO $database = null;

    public function getConnection() : PDO {

        if($this->database === null){
    
            require("database/config.php");
    
            $this->database = new PDO(
                sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
                MYSQL_USER,
                MYSQL_PASSWORD,
            );
    
        }

        return $this->database;
    
    }
}