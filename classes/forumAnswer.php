<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/Post.php");


class Answer{

private $answer;

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

    public function submitAnswer(){
        $conn = Db::getConnection();
        
        $statement = $conn->prepare("INSERT INTO answer (post_input) VALUES (:post_input)");

        $antwoord = $this->getAnswer();

        $statement->bindValue(":post_input", $antwoord);

        $result = $statement->execute();

        return $result;
        }

        public function seeAnswer(){
            $conn = Db::getConnection();
    
            //$statement = $conn->prepare("SELECT a.post_input FROM answer a INNER JOIN post p ON a.post_ID = p.ID WHERE p.ID = '1' ");
            $statement = $conn->prepare("SELECT a.post_input FROM answer a INNER JOIN post p ON a.post_ID = p.ID ");
            $statement->execute();
            $seeanwser = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
            return $seeanwser;
            } 

}
?>