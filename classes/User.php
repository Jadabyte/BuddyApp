<?php

include_once(__DIR__ . "/Db.php");

class User{
    private $email;
    private $password;
   
    

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    
function matchHobby(){
      $conn =Db::getConnection();
      $statement = $conn->prepare("SELECT * FROM users where e")
}

/*
    public function findOthers($email){
        $conn = Db::getConnection();
        $statement = $conn("SELECT * FROM users where email != :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $others = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $others;
    }

    public function findPerfectMatch($others){
        $others = $this->findOthers();
        foreach ($others as $other => $value) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users where email != :email AND muziek = :muziek AND klas = :klas AND film = :film AND hobby = :hobby AND favoriet = :favoriet");

            $statement->bindValue(":email", $other["email"]);
            $statement->bindValue(":muziek", $other["muziek"]);
            $statement->bindValue(":klas", $other["klas"]);
            $statement->bindValue(":film", $other["film"]);
            $statement->bindValue(":hobby", $other["hobby"]);
            $statement->bindValue(":favoriet", $other["favoriet"]);
            $statement->execute();
            $perfectMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $perfectMatch;
        }
    }*/
}

function canLogin($email, $password){
    // Connectie maken met database
    $conn = new mysqli("localhost", "root", "root", "BuddyApp");
    $email = $conn->real_escape_string($email);
    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);

    //Kijken of het gevonden wordt in de database
    if ($result->num_rows != 1) {
        return false;
    }
    $user = $result->fetch_assoc();
    $hash = $user['password'];
    
    if (password_verify($password, $hash)) {
        return true;
    } else { 
        return false;
    }
    }



?>