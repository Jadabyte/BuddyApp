<?php
    class Db{

        private static $conn;

        public static function getConnection(){
            if(self::$conn===null){
                self::$conn = newPDO ('mysql...');
                return self::$conn;
            } else{
                return self::$conn;
            }
        }
    }

?>