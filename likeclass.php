<?php
class Like{
    private $messageId;
    private $userId;

    public function save()
    {
        $conn = new PDO('mysql:host=localhost;dbname="Buddyapp_Master"; "root", "root"');
        $statement = $conn->prepare("insert into likes (messageId, userId) values(:messageId, :userId");
        $messageId = $this->getMessageId();
        $userId = $this->getUserId();

        $statement->bindValue(":messageId", $messageId);
        $statement->bindValue(":userId", $userId);

        $result = $statement->execute();
        return $result;
    }

    public function getAll($messageId){
        $conn = new PDO('mysql:host=localhost;dbname="Buddyapp_Master"; "root", "root"');
        $statement = $conn->prepare('select * from message where messageId = :messageId');
        $statement->bindValue(':messageId', $messageId);
        $result = $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
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

    /**
     * Get the value of messageId
     */ 
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set the value of messageId
     *
     * @return  self
     */ 
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }
}
?>