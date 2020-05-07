<?php
    include_once(__DIR__ . "/Db.php");
    class Posts{
        private $content;
        private $user;

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }
        public function savePost(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into posts (text, active, user_id) values (:content, '1', :id)");

            $user = $this->getUser();
            $content = $this->getContent();
            $statement->bindValue(":id", $user);
            $statement->bindValue(":content", $content);

            $result = $statement->execute();
            return $result;
        }

        public static function getAllPosts($user){
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from posts where active = '1' and user_id = $user order by id desc");

            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getId($user){
            $conn = Db::getConnection();
            $statement = $conn->prepare("select id from users where email = :email");
            $statement->bindValue(":email", $user);

            $result = $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }