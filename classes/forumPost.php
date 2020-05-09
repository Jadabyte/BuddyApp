<?php
include_once(__DIR__ . "/Db.php");

class Post{
    private $question;   
    private $questionId;

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

        $reg_id = $_SESSION['userId'];
        $statement = $conn->prepare("INSERT INTO question(question, user_id)
                                            SELECT (:question), id FROM users WHERE id = '$reg_id'");

        $question = $this->getQuestion();

        $statement->bindValue(":question", $question);

        $result = $statement->execute();

        return $result;
        
        }

    public static function seePost(){
        $conn = Db::getConnection();
    
        $statement = $conn->prepare("SELECT u.username, q.question, q.ID  FROM question q INNER JOIN users u ON u.id = q.user_id");
        $statement->execute();
        $seeposts = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
         return $seeposts;
         }   
            
    public  function pinPost(){
        $conn = Db::getConnection();
            
        $statement = $conn->prepare("UPDATE question SET pinmode='1' WHERE id = (:id) "); 

        $pinmode = $this->getQuestionId();
        
        $statement->bindValue(":id", $pinmode);

        $result = $statement->execute();   

        return $result ;
    }        

    /**
     * Get the value of questionId
     */ 
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set the value of questionId
     *
     * @return  self
     */ 
    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;

        return $this;
    }
}
?>