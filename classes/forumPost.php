<?php
include_once(__DIR__ . "/Db.php");

class Post{
    private $username;
    private $question;


    

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    public function submitPost(){
        $conn = Db::getConnection();
        
        $statement = $conn->prepare("INSERT INTO post (username, post_input) VALUES (:username, :post_input)");

        $username = $this->getUsername();
        $question = $this->getQuestion();

        $statement->bindValue(":username", $username);
        $statement->bindValue(":post_input", $question);

        $result = $statement->execute();

        return $result;
        }

        public function seePost(){
            $conn = Db::getConnection();
    
            $statement = $conn->prepare("SELECT username, post_input FROM post");
            $statement->execute();
            $seeposts = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
            return $seeposts;
            }    


    /**
     * Get the value of answer
     */ 
        }

?>