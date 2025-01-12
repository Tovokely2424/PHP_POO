<?php
    class DB_conect{
        private $dbUser,
                $dbPassword;

        const SGBD = 'mysql',
                HOST = 'localhost',
               DBNAME = 'cntmad';

        public function __construct($data = []){
            if (!empty($data)) {
                hidrate($data);
                $db_conect = new PDO(self::SGBD.':host='.self::HOST.';dbname='.self::DBNAME,$this->getDbUser(),$this->getDbPassword());
                $db_conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db_conect;
            }
        }

        private function hidrate($data){
            foreach($data as $attribute => $value){
                $etterMethods = 'set'.ucfirst($attribute);
                $this->$setterMethods($value);
            }
        }

        //Getters
        public function getSGBD(){
            return self::SGBD;
        }
        public function getHOST(){
            return self::HOST;
        }
        public function getDBNAME(){
            return self::DBNAME;
        }
        public function getDbUser(){
            return $this->dbUser;
        }
        public function geDbPassword(){
            return $this->dbPassword;
        }

        //Setters
        public function setDbUser($dbUser){
            $this->dbUser = $dbUser;
        }
        public function setDbPassword(){
            $this->dbPassword = $dbPassword;
        }
    }
?>