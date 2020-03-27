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
}

function canLogin($email, $password)
{
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