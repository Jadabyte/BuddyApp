<?php

//include_once(__DIR__ . "/Db.php")

class Interesse{
    private $klas;
    private $muziek;
    private $film;
    private $hobby;
    private $favoriet;


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

    function canSubmit($klas, $muziek, $film, $hobby, $favoriet){

        if (isset($_POST['insert'])){
            $errors = "Je bent iets vergeten aan te duiden";
            $succes = "Super!";
          
            if ($_POST['klas'] === 'default' or $_POST['muziek'] === 'default' or $_POST['film'] === 'default' or $_POST['hobby'] === 'default' or $_POST['favoriet'] === 'default'){
                    echo $errors;          
            }else{
                    $conn=new PDO("mysql:host=localhost;dbname=code3_buddyapp", "root", "root");
          
                    $klas=$_POST['klas'];
                    $muziek=$_POST['muziek'];
                    $film=$_POST['film'];
                    $hobby=$_POST['hobby'];
                    $favoriet=$_POST['favoriet'];
          
                    $sql=$conn-> prepare("INSERT INTO interesses (klas, muziek, film, hobby, favoriet) VALUES ( '$klas', '$muziek', '$film', '$hobby', '$favoriet')");
                   
                    $result=$sql->execute(); 
                   
                    echo $succes;
            }
          }
}
}

?>