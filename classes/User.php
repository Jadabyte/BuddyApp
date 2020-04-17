<?php

include_once(__DIR__ . "/Db.php");

class User{
    private $email;
    private $password;
    private $username;
    private $klas;
    private $muziek;
    private $film;
    private $hobby;
    private $favoriet;
    private $buddy;


/**
     * Get the value of email
     */ 
    public function getFavoriet()
    {
        return $this->favoriet;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setFavoriet($favoriet)
    {
        $this->favoriet = $favoriet;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getHobby()
    {
        return $this->hobby;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }


     /**
     * Get the value of email
     */ 
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
    }

     /**
     * Get the value of email
     */ 
    public function getMuziek()
    {
        return $this->muziek;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setMuziek($muziek)
    {
        $this->muziek = $muziek;

        return $this;
    }


    /**
     * Get the value of email
     */ 
    public function getKlas()
    {
        return $this->klas;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setKlas($klas)
    {
        $this->klas = $klas;

        return $this;
    }

 /**
     * Get the value of email
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }
 
    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        if(empty($firstname)){
            throw new Exception("Firstname cannot be empty");
        }
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        if(empty($lastname)){
            throw new Exception("Lastname cannot be empty");
        }
        $this->lastname = $lastname;

        return $this;
    }

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
      $statement = $conn->prepare("SELECT * FROM users where e");
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

    public function submitIntresses(){
        //$conn=new PDO("mysql:host=localhost;dbname=code3_buddyapp", "root", "root");
        $conn = Db::getConnection();
        
     if($_POST['klas'] === 'default' or $_POST['muziek'] === 'default' or $_POST['film'] === 'default' or $_POST['hobby'] === 'default' or $_POST['favoriet'] === 'default'){
         throw new Exception("Vul het vakje in");

    }else{
         $statement = $conn->prepare("INSERT INTO interesses (klas, muziek, film, hobby, favoriet) VALUES (:klas, :muziek,:film,:hobby,:favoriet)");

        $klas = $this->getKlas();
        $muziek = $this->getMuziek();
        $film = $this->getFilm();
        $hobby = $this-> getHobby();
        $favoriet = $this-> getFavoriet();

        $statement->bindValue(":klas", $klas);
        $statement->bindValue(":muziek", $muziek);
        $statement->bindValue(":film", $film);
        $statement->bindValue(":hobby", $hobby);
        $statement->bindValue(":favoriet", $favoriet);

        $result = $statement->execute();


        return $result;
        }
    }

    public function pullUpFriends(){

        $conn = Db::getConnection();

        session_start();
        $reg_no = $_SESSION['email'];
        $statement =$conn->prepare("SELECT f.name FROM users u INNER JOIN friend f ON u.User_ID = f.User_ID WHERE u.email = '$reg_no'");
                  
            // moet nog een friends tabel gemaakt worden maar deze zal binnen de volgende gemaakt worden!
            //"SELECT * FROM `friend` f INNER JOIN users u on f.User_ID = u.User_ID WHERE u.email = '$reg_no'"

        //var_dump($statement);
        $statement->execute();
        $friends = $statement->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($friends);

        return $friends; 

    }

    
    /**
     * Get the value of buddy
     */ 
    public function getBuddy()
    {
        return $this->buddy;
    }


 
    /**
     * Set the value of buddy
     *
     * @return  self
     */ 
    public function setBuddy($buddy)
    {
        if(empty($buddy)){
            throw new Exception("Username cannot be empty");
        }
        $this->buddy = $buddy;

        return $this;
    }

    public function buddyChoice(){
        $conn = Db::getConnection();

        $buddy = $this->getBuddy();
        $email = $this->getEmail();

        if($buddy == 'beBuddy'){
            $statement = $conn->prepare("UPDATE Users SET beBuddy = 1, findBuddy = 0 WHERE email = :email");
        }
        else if($buddy == 'findBuddy'){
            $statement = $conn->prepare("UPDATE Users SET beBuddy = 0, findBuddy = 1 WHERE email = :email");
        }

        $statement->bindParam(":email", $email);

        $result = $statement->execute();
        return $result;
    }

    public function seeUsers(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT count(*) FROM users");
        $statement->execute();
        $countUsers = $statement->fetch(PDO::FETCH_NUM);;

        return reset($countUsers);
        }

    public function seeBuddies(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT count(*) FROM friend");
        $statement->execute();
        $countBuddies = $statement->fetch(PDO::FETCH_NUM);;

        return reset($countBuddies);
        }    

    
}
?>
