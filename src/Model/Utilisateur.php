<?php
 class Utilisateur{
    private $errors= [],
            $id,
            $username = "",
            $lastName ="",
            $firstName = "",
            $phoneNumber = "",
            $confirm,
            $password,
            $email,
            $token;
    
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
    public function setUsername($username) : void{
        if (!empty($username) && is_string($username)) {
            $this->username = $username;
        }
    }
    public function setFirstName($firstName){
        if (!empty($firstName) && is_string($firstName)) {
            $this->firstName = $firstName;
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
    public function setConfirm($confirm) : void{
        if ($confirm==1 || $confirm==0) {
            $this->confirm = $confirm;
        }
    }
    public function setToken($lenght) :  void{
        $tablecontent = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!+}{[]}";
        $tokeno = "";
        for ($i=0; $i< $lenght; $i++) { 
            $tokeno.=$tablecontent[rand(0, strlen($tablecontent)-1)];
        }
        $this->token = $tokeno;
    }
    public function setPassword($password) : string{
        $this->password = password_hash($password, PASSWORD_DEFAULT);
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
    public function getId() : int{
        return $this->id;
    }
    public function geUsername() : string{
        return $this->username();
    }
    public function getLastName() : string{
        return $this->lastName;
    }
    public function getFirstName() : string{
        return $this->firstName;
    }
    public function getPhoneNumber() : string{
        return $this->phoneNumber;
    }
    public function getPassword() : string{
        return $this->password();
    }
    public function getToken() : string{
        return $this->token;
    }
    public function getConfirm() : int{
        return $this->confirm;
    }
    public function getEmail() : string{
        return $this->email;
    }
    public function getErrors() : array{
        return $this->errors;
    }
    public function isValideUser(){
        return !(empty($this->firstName) || empty($this->lastName) || empty($this->email));
    }

 }

?>