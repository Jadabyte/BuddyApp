<?php

include_once __DIR__ . "/Db.php";
//session_start();

class User
{
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
    private $buddy;
    private $userId;
    

    
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
        if (empty($firstname)) {
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
        if (empty($lastname)) {
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

    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

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
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        }
        $this->password = $password;

        return $this;
    }


    public function createUser(){
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

        $statement = $conn->prepare("select email from users where  email = :email"); //change get and post here

        $email = $this->getEmail();
        $statement->bindValue(":email", $email);

        //$statement->bindParam(1, $_GET['id'], PDO::PARAM_INT);
        $statement->execute();

        if($statement->fetchColumn()){ 
            throw new Exception("Please use a different email address");
        }
    }


    public function matchHobby()
    {
        $conn = Db::getConnection();
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



    public static function login($email, $password){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if($result){
            if(password_verify($password, $result['password'])){
                return true;
            } else {
                return false;
            }
        } else{
           return false;
        }

    }


    public static function findOthers($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM users where id != '$id'");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findMatch(){
        $conn = Db::getConnection();

        $klas = $this->getKlas();
        $muziek = $this->getMuziek();
        $film = $this->getFilm();
        $hobby = $this->getHobby();
        $favorite = $this->getFavoriet();
        $userId = $this->getUserId();

        $statKlas = $conn->prepare("SELECT * FROM interesses where klas = '$klas' and userId != '$userId' ");
        $statKlas->execute();
        $klasMatch = $statKlas->fetchAll(PDO::FETCH_ASSOC);

        $statMuziek = $conn->prepare("SELECT * FROM interesses where muziek = '$muziek' and userId != '$userId' ");
        $statMuziek->execute();
        $muziekMatch = $statMuziek->fetchAll(PDO::FETCH_ASSOC);

        $statFilm = $conn->prepare("SELECT * FROM interesses where film = '$film' and userId != '$userId' ");
        $statFilm->execute();
        $filmMatch = $statFilm->fetchAll(PDO::FETCH_ASSOC);

        $statHobby = $conn->prepare("SELECT * FROM interesses where hobby = '$hobby' and userId != '$userId' ");
        $statHobby->execute();
        $hobbyMatch = $statHobby->fetchAll(PDO::FETCH_ASSOC);

        $statFavorite = $conn->prepare("SELECT * FROM interesses where favoriet = '$favorite' and userId != '$userId' ");
        $statFavorite->execute();
        $favoriteMatch = $statFavorite->fetchAll(PDO::FETCH_ASSOC);
       

        if($klasMatch){
            return $klasMatch;
        }else if($muziekMatch){
            return $muziekMatch;
        } else if($filmMatch){
            return $filmMatch;
        }else if($hobbyMatch){
            return $hobbyMatch;
        }else if($favoriteMatch){
            return $favoriteMatch;
        }

        
    }

    public function getMatchInfo($matchId){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM users WHERE id = '$matchId'");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public static function findDrinks(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM food WHERE type = 'drank'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public static function findSnacks(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM food WHERE type = 'broodjes'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public static function findFries(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM food WHERE type = 'frietjes'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    
    public static function findPizza(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM food WHERE type = 'pizza'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

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

function submitIntresses(){
    $conn = Db::getConnection();

    if ($_POST['klas'] === 'default' or $_POST['muziek'] === 'default' or $_POST['film'] === 'default' or $_POST['hobby'] === 'default' or $_POST['favoriet'] === 'default') {
        throw new Exception("Vul het vakje in");

    } else {
        $statement = $conn->prepare("INSERT INTO interesses (klas, muziek, film, hobby, favoriet, userId) VALUES (:klas, :muziek,:film,:hobby,:favoriet,:userId)");

        $klas = $this->getKlas();
        $muziek = $this->getMuziek();
        $film = $this->getFilm();
        $hobby = $this->getHobby();
        $favoriet = $this->getFavoriet();
        $userId = $this->getUserId();

        $statement->bindValue(":klas", $klas);
        $statement->bindValue(":muziek", $muziek);
        $statement->bindValue(":film", $film);
        $statement->bindValue(":hobby", $hobby);
        $statement->bindValue(":favoriet", $favoriet);
        $statement->bindValue(":userId", $userId);

        $result = $statement->execute();

        return $result;
    }
}

public static function pullUpFriends(){

    $conn = Db::getConnection();

    session_start();
    $reg_no = $_SESSION['user'];
    $statement = $conn->prepare("SELECT u.username
                                            FROM (
                                            SELECT f.user_id_2
                                            FROM users u
                                            INNER JOIN friends f
                                                ON u.id = f.user_id_1
                                            WHERE u.id = '$reg_no' AND Accepted = 1
                                            ) a
                                            INNER JOIN users u
                                                ON a.user_id_2 = u.id");

    $statement->execute();
    $friends = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $friends;

}

/**
 * Get the value of buddy
 */
function getBuddy()
{
    return $this->buddy;
}

/**
 * Set the value of buddy
 *
 * @return  self
 */
function setBuddy($buddy)
{
    if (empty($buddy)) {
        throw new Exception("Username cannot be empty");
    }
    $this->buddy = $buddy;

    return $this;
}

    /**
     * Get the value of userId
     */ 
    

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
     function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

function buddyChoice()
{
    $conn = Db::getConnection();

    $buddy = $this->getBuddy();
    $email = $this->getEmail();

    if ($buddy == 'beBuddy') {
        $statement = $conn->prepare("UPDATE Users SET beBuddy = 1, findBuddy = 0 WHERE email = :email");
    } else if ($buddy == 'findBuddy') {
        $statement = $conn->prepare("UPDATE Users SET beBuddy = 0, findBuddy = 1 WHERE email = :email");
    }

    $statement->bindParam(":email", $email);

    $result = $statement->execute();
    return $result;
}

public static function seeUsers(){
    $conn = Db::getConnection();

    $statement = $conn->prepare("SELECT count(*) FROM users");
    $statement->execute();
    $countUsers = $statement->fetch(PDO::FETCH_ASSOC);

    return reset($countUsers);
    }

public static function seeBuddies(){
    $conn = Db::getConnection();

    $statement = $conn->prepare("SELECT count(*) FROM friends");
    $statement->execute();
    $countBuddies = $statement->fetch(PDO::FETCH_ASSOC);

    return reset($countBuddies);
    }    

public function fetchId(){
    $conn = Db::getConnection();

    $statement = $conn->prepare("select users.id from users where email = :email");
    $email = $this->getEmail();
    $statement->bindParam(":email", $email);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

public function fetchUser(){
    //this fetches the user details and their interests

    $conn = Db::getConnection();

    $userId = $this->getUserId();
    $statement = $conn->prepare("SELECT * FROM interesses JOIN users ON users.id = :id AND users.id = interesses.userId");
    
    $statement->bindParam(":id", $userId);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;

}

public function fetchFriend(){
    //this function fetches the most recent friend the user has made

    $conn = Db::getConnection();

    $userId = $this->getUserId();
    $statement =$conn->prepare("select firstname, lastname from users inner join friends on friends.user_id_1 = :id AND friends.user_id_2 = users.id AND friends.accepted = 1 ORDER BY friends.user_id_2 DESC");

    $statement->bindParam(":id", $userId);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    /*$friendId = $result['user_id_2'];
    $statement =$conn->prepare("select firstname, lastname from users where id = '34'");

    $statement->bindParam(":friendId", $friendId);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);*/

    return $result; 

}

    

}

?>
