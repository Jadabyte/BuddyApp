<?php

include_once(__DIR__ . "/Db.php");

class Search{
    private $searchItem;

    /**
     * Get the value of searchItem
     */ 
    public function getSearchItem()
    {
        return $this->searchItem;

    }

    /**
     * Set the value of searchItem
     *
     * @return  self
     */ 
    public function setSearchItem($searchItem)
    {
        $this->searchItem = $searchItem;

        return $this;
    }

    public function findUser(){
        $conn = Db::getConnection();
        $statement = $conn->prepare(
            "select * from users, interesses 
                where firstname like :searchItem
	            OR lastname like :searchItem
                OR users.interessesId = interesses.id AND muziek like :searchItem
                OR users.interessesId = interesses.id AND film like :searchItem
                OR users.interessesId = interesses.id AND hobby like :searchItem
                OR users.interessesId = interesses.id AND favoriet like :searchItem
                group by users.id");

        $searchItem = $this->getSearchItem();
        $statement->bindValue(":searchItem", '%' . $searchItem . '%', PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($searchItem);
        //var_dump($results);
        
        return $results;
    }

    public function findClassroom(){
        $conn = Db::getConnection();
        $statement = $conn->prepare(
            "select * from classrooms 
                where name like :searchItem
	            OR campus like :searchItem
                OR floor like :searchItem");

        $searchItem = $this->getSearchItem();
        $statement->bindValue(":searchItem", '%' . $searchItem . '%', PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($searchItem);
        //var_dump($results);
        
        return $results;
    }
}
?>