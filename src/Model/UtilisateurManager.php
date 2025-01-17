<?php
    require 'Utilisateur.php';
    class UtilisateurManager{
        private $dbPDO_conect;
        public function __construct(PDO $dbPDO_conect){
            $this->setDbPDO_Conect($dbPDO_conect);
        }

        public function userInsert(Utilisateur $user){
            $request = $this->dbPDO_Conect->prepare("INSERT INTO user (nom, prenom, email) VALUES (:nom, :prenom, :email)");
            $request->bindParam(':nom', $user->getLastName(), PDO::PARAM_STR);
            $request->bindParam(':prenom', $user->getFirstName(), PDO::PARAM_STR);
            $request->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
            $request->execute();
        }

        public function getAllUsers(){
            $request = $this->dbPDO_conect->query("SELECT * FROM user ORDER BY id ASC");
            $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateur');
            $allUsers = [];
            while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
                $user = new Utilisateur(
                    [
                        'id' => $row['id'],
                        'lastName' => $row['nom'],
                        'firstName' => $row['prenom'],
                        'phoneNumber' => $row['telephone'],
                        'email' => $row['email']
                    ]
                );
                $allUsers[] = $user;
            }
            $request->closeCursor();
            if (empty($allUsers)) {
                echo "Aucun utilisateur trouvé dans la base de données.";
            }
        
            return $allUsers;
        }

        public function getUser($id){
            $request=$this->dbPDO_conect->prepare("SELECT * FROM user WHERE id=:id");
            $request->bindvalue(':id', intval(id), PDO::PARAM_INT);
            $request->execute();
            $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateur');
            $user = $request->fetch();
            $request->closeCursor();
            return $user;
        }

        public function upadateUser(Utilisateur $user){
            $request = $this->dbPDO_conect->prepare("UPDATE user SET username=:username, nom=:nom, prenom=:prenom, email=:email, telephone=:telephone WHERE id=:id");
            $request->bindParam(':username', $user->getId(), PDO::PARAM_INT);
            $request->bindParam(':nom', $user->getLastName(), PDO::PARAM_STR);
            $request->bindParam(':prenom', $user->getFirstName(), PDO::PARAM_STR);
            $request->bindParam(':email', $user-getEmail(), PDO::PARAM_STR);
            $request->bindParam(':telephone', $user->GetPhoneNumber(), PARAM_STR);
            $request->execute();
        }

        public function deleteUSer($id){
            $request = $this->dbPDO_conect->prepare("DELETE FROM user WHERE id=:id");
            $request->bindParam(':id', intval($id, PDO::PARAM_INT));
            $request->execute();
        }

        public function setDbPDO_conect($dbPDO_conect){
            $this->dbPDO_conect = $dbPDO_conect;
        }

        public function seConnecter($email, $password){
            $user = getUserByEmail($email);
            if ($email == $user->getEmail() && password_verify($password, $usr->getPassword())) {
                session_start();
                $_SESSION['id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['fisrtName'] = $user->getFirstName();
                $_SESSION['lastName'] = $user->getLastName();
                return true;
            }
            else
            {
                return false;
            }
        }
        public function seDeconnecter(){
            session_start();
            session_unset();
            session_destroy();
        }
        private function getUserByEmail($email){
            $request = $this->dbPDO_conect->prepare("SELECT *FROM user WHERE email=:email");
            $request->bindParam(':email', $email, PDO::PARAM_STR);
            $request->execute();
            $request->setFetchMode(PDO::FETCH_CLASS, PDO::FETCH_PROPS_LATE, 'Utilisateur');
            $user = $request->fetch();
            $request->closeCursor();
            return $user;
        }
    }
?>