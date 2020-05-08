<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/../forum.php");

session_start();

class Answer{

    private $answer;
    private $questionId;
    

    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     *
     * @return  self
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }


    public  function submitAnswer(){ 
        $conn = Db::getConnection();
        $reg_id = $_SESSION['user'];

        $statement = $conn->prepare("INSERT INTO comment(comment, user_id)
                                     SELECT (:comment), id  FROM users WHERE id = '$reg_id'");
                                     // ID FROM question 
        $comment = $this->getAnswer();
        //$q_id = $this->getQuestionId();

        $statement->bindValue(":comment", $comment);
        //$statement->bindValue(":id", $q_id);

        $result = $statement->execute();

        return $result;
        }

        public static function seeAnswer(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("SELECT u.username, c.comment FROM comment c INNER JOIN users u ON u.id = c.user_id 
            INNER JOIN question q ON c.question_id = q.id");
            

            $statement->execute();
            $seeanwser = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $seeanwser;
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