<?php

include_once(__DIR__ . "/Db.php");
class User{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

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

        $statement = $conn->prepare("insert into tl_user (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)");

        $firstname = $this->getFirstname();
        $lastname = $this->getLastname();
        $email = $this->getEmail();
        $password = $this-> getPassword();

        $statement->bindValue(":firstname", $firstname);
        $statement->bindValue(":lastname", $lastname);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);

        $result = $statement->execute();

        return $result;
    }

    public function checkDuplicate(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("select email from tl_user where  email = '" . $_POST['email'] . "'");
        $statement->bindParam(1, $_GET['id'], PDO::PARAM_INT);
        $statement->execute();

        if($statement->fetchColumn()){ 
            throw new Exception("Please use a different email address");
        }
    }

    public function encrypt($error){
        if(!isset($error)){
            echo 'ready to encrypt';
            //$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
        }
    }
}

?>