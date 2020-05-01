<?php
    include_once(__DIR__ . "/Db.php");
    class Todo{
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
        public function saveTodo(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into todo (text, active) values (:content, '1')");

            $content = $this->getContent();
            $statement->bindValue(":content", $content);

            $result = $statement->execute();
            return $result;
        }

        public static function getAllTodo(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from todo");

            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }