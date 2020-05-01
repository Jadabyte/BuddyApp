<?php
    class Todo {
        private $content;
        private $userMail;

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
         * Get the value of userMail
         */ 
        public function getUserMail()
        {
                return $this->userMail;
        }

        /**
         * Set the value of userMail
         *
         * @return  self
         */ 
        public function setUserMail($userMail)
        {
                $this->userMail = $userMail;

                return $this;
        }

        public function saveTodo(){
            $conn = Db::getConnection();
            /*
            $statement = $conn->prepare("SELECT users.id FROM users WHERE users.email = :email");
           
            $userMail = $this->getUserMail();
            $statement->bindValue(":email", $userMail);
            
            $id = $statement->execute();
            var_dump($id);
            */
            $statement = $conn->prepare("insert into todo (text) values (:content)");

            $content = $this->getContent();

            $statement->bindValue(":content", $content);
            //$statement->bindValue(":id", $id);

            $result = $statement->execute();
            return $result;
        }

        public static function getId($userMail){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT id FROM `users` WHERE `email` = :email");
            
            //$email = $this->getUserMail();
            $statement->bindValue(":email", $userMail);
    
            $result = $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }