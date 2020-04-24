<?php
class Message{
    private $text;
    private $messageId;
    private $userId;

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of postId
     */ 
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set the value of postId
     *
     * @return  self
     */ 
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function save(){
        $conn = new PDO("mysql:host=localhost;dbname=Buddyapp_Master,root, root");
        $statement = $conn->prepare("insert into messages (text, messageId, userId)values(:text, :messageId, :userId");
        $text = $this->getText();
        $messageId = $this->getMessageId();
        $userId = $this->getUserId();

        $statement->bindValue(":text", $text);
        $statement->bindValue(":messageId", $messageId);
        $statement->bindValue(":userId", $userId);

        $result = $statement->execute();
        return $result;
    }

    public static function getAll($messageId){
        $conn = new PDO("mysql:host=localhost;dbname=Buddyapp_Master,root, root");
        $statement = $conn->prepare('select * from messages where messageId =:messageId');
        $statement->bindValue(':messageId', $messageId);
        $result = $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>