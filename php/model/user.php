<?php
class User{
    private $email;
    private $secretKey;
    private $token;
    
    public function __construct($email, $secretKey)
    {
        $this->email = $email;
        $this->secretKey = $secretKey;
        
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSecret(){
        return $this->secretKey;
    }
    public function getToken(){
        return $this->token;
    }
}
?>