<?php
include_once(__DIR__ . "/Db.php");

class Post{
    private $question;


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

        session_start();
        $reg_id = $_SESSION['email'];
        $statement = $conn->prepare("INSERT INTO question(question, user_id)
                                            SELECT (:question), id FROM users WHERE email = '$reg_id'");

        $question = $this->getQuestion();

        $statement->bindValue(":question", $question);

        $result = $statement->execute();

        return $result;
        }

        public static function seePost(){
            $conn = Db::getConnection();
    
            $statement = $conn->prepare("SELECT u.username, q.question FROM question q INNER JOIN users u ON u.id = q.user_id");
            $statement->execute();
            $seeposts = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
            return $seeposts;
            }    

        }
?>