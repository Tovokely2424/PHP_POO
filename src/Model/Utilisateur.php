<?php
 class Utilisateur{
    private $errors= [],
            $id,
            $lastName,
            $firstName,
            $phoneNumber = "",
            $email;
    
    const FIRSTNAME_INVALIDE = 1,
        LASTNAME_INVALIDE = 2,
        EMAIL_INVALIDE =3,
        TELEPHONE_INVALIDE = 4;

    public function __construct($data = []){
        if (!empty($data)) {
            $this->hidrate($data);
        }
    }
    public function hidrate($data){
        foreach ($data as $attribute => $value) {
            $setterMethods = 'set'.ucfirst($attribute);
            $this->$setterMethods($value);
        }
    }

    //Setters
    public function setId($id){
        if (!empty($id) && is_numeric($id)) {
            $this->id = $id;
        }
    }
    public function setFirstName($firstName){
        if (!empty($firstName) && is_string($firstName)) {
            $this->getFirstName;
        }
        else{
            $this->errors[] = self::FIRSTNAME_INVALIDE;
        }
    }
    public function setLastName($lastName){
        if (!empty($lastName) && is_string($lastName)) {
            $this->lastName = $lastName;
        }
        else{
            $this->errors[] = self::LASTNAME_INVALIDE;
        }
    }
    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }
    public function setEmail($email){
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
        else{
            $this->errors[] = self::EMAIL_INVALIDE;
        }
    }

    //Getters
    public function getId(){
        return $this->id;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getPhoneNumber(){
        return $this->phoneNumber;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getErrors(){
        return $this->errors;
    }
    public function isValideUser(){
        return !(empty($this->nom) || empty($this->firstName) || empty($this->lastName) || empty($this->email));
    }
 }

?>