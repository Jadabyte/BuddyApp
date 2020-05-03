<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/forumPost.php");


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

        session_start();
        $reg_id = $_SESSION['email'];

        $statement = $conn->prepare("INSERT INTO comment(comment, user_id) 
                                                        -- question_id moet nog gedaan worden
                                            SELECT (:comment), id  FROM users WHERE email = '$reg_id'");

        $antwoord = $this->getAnswer();

        $statement->bindValue(":comment", $antwoord);

        $result = $statement->execute();

        return $result;
        }

        public function seeAnswer(){
            $conn = Db::getConnection();

           // $post= ($_POST['postinput']);
            $statement = $conn->prepare("SELECT comment FROM comment ");
           // c INNER JOIN question q ON c.question_id = q.ID  
            // WHERE $post = q.ID

            $statement->execute();
            $seeanwser = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $seeanwser;
            }

}
?>