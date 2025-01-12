<?php
    class UtilisateurManager{
        private $dbPDO_conect;
        public function __construct(PDO $dbPDO_conect){
            $this->setDbPDO_Conect($dbPDO_conect);
        }

        public function userInsert(Utilisateur $user){
            $request = $this->dbPDO_Conect->prepare("INSERT INTO user (nom, prenom, email) VALUES (:nom, :prenom, :email)");
            $request->bindParam(':nom', $user->getLastName(), PDO::PARAM_STR);
            $request->bindParam(':prenom', $user->getFirstName(), PDO::PARAM_STR);
            $request->bindParam('email', $user->getEmail(), PDO::PARAM_STR);
            $request->execute();
        }

        public function setDbPDO_conect($dbPDO_conect){
            $this->dbPDO_conect = $dbPDO_conect;
        }
    }
?>