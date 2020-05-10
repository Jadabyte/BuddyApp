<?php
include_once(__DIR__ . "/Db.php");

class Faq{
    public static function viewPin(){
        $conn = Db::getConnection();
    
        $statement = $conn->prepare("SELECT question FROM question WHERE pinmode= '1'");
        $statement->execute();
        $seeposts = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
        return $seeposts;
    }
}