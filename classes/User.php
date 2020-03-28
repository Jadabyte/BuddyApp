<?php

include_once(__DIR__ . "/Db.php");
class User{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $username;
    private $klas;
    private $muziek;
    private $film;
    private $hobby;
    private $favoriet;


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
        if(empty($email)){
            throw new Exception("Email cannot be empty");
        }

        if(!preg_match('/@student.thomasmore.be/', $email)){
            throw new Exception("You must have a Thomas More student email adress");
        }
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

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        if(empty($username)){
            throw new Exception("Username cannot be empty");
        }
        $this->username = $username;

        return $this;
    }

    public function setPassword($password)
    {
        if(empty($password)){
            throw new Exception("Please enter a password");
        }
        if(!isset($error)){
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
        }
        $this->password = $password;

        return $this;
    }

    public function submit(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("insert into users (firstname, lastname, email, password, username) values (:firstname, :lastname, :email, :password, :username)");

        $firstname = $this->getFirstname();
        $lastname = $this->getLastname();
        $email = $this->getEmail();
        $password = $this-> getPassword();
        $username = $this-> getUsername();

        $statement->bindValue(":firstname", $firstname);
        $statement->bindValue(":lastname", $lastname);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":username", $username);

        $result = $statement->execute();

        return $result;
    }

    public function checkDuplicate(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("select email from users where  email = '" . $_POST['email'] . "'");
        $statement->bindParam(1, $_GET['id'], PDO::PARAM_INT);
        $statement->execute();

        if($statement->fetchColumn()){ 
            throw new Exception("Please use a different email address");
        }
    }

    public function canLogin($email, $password)
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

    /**
     * Get the value of klas
     */ 
    public function getKlas()
    {
        return $this->klas;
    }

    /**
     * Set the value of klas
     *
     * @return  self
     */ 
    public function setKlas($klas)
    {
        $this->klas = $klas;

        return $this;
    }

    /**
     * Get the value of muziek
     */ 
    public function getMuziek()
    {
        return $this->muziek;
    }

    /**
     * Set the value of muziek
     *
     * @return  self
     */ 
    public function setMuziek($muziek)
    {
        $this->muziek = $muziek;

        return $this;
    }

    /**
     * Get the value of film
     */ 
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set the value of film
     *
     * @return  self
     */ 
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get the value of hobby
     */ 
    public function getHobby()
    {
        return $this->hobby;
    }

    /**
     * Set the value of hobby
     *
     * @return  self
     */ 
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }

    /**
     * Get the value of favoriet
     */ 
    public function getFavoriet()
    {
        return $this->favoriet;
    }

    /**
     * Set the value of favoriet
     *
     * @return  self
     */ 
    public function setFavoriet($favoriet)
    {
        $this->favoriet = $favoriet;

        return $this;
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

}
?>