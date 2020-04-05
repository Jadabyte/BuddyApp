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

    public function find(){
        $conn = Db::getConnection();
        $statement = $conn->prepare(
            "select * from users where firstname like :searchItem 
                OR lastname like :searchItem");
            
            /*UNION
        
            select * from interesses where klas like :searchItem 
                OR muziek like :searchItem 
                OR film like :searchItem 
                OR hobby like :searchItem 
                OR favoriet like :searchItem*/
    
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