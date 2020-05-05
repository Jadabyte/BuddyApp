<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/forumPost.php");

session_start();

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
        $reg_id = $_SESSION['email'];

        $statement = $conn->prepare("INSERT INTO comment(comment, user_id)
                                     SELECT (:comment), id  FROM users WHERE email = '$reg_id'");
                                     // ID FROM question 
        $antwoord = $this->getAnswer();

        $statement->bindValue(":comment", $antwoord);

        $result = $statement->execute();

        return $result;
        }

        public function seeAnswer(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("SELECT u.username, c.comment FROM comment c INNER JOIN users u ON u.id = c.user_id 
            INNER JOIN question q ON c.question_id = q.id");
            

            $statement->execute();
            $seeanwser = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $seeanwser;
            }

}
?>