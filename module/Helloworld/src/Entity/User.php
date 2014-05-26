<?php

namespace Helloworld\Entity;

class User{
    
    protected $id;
    protected $name;
    protected $email;
    protected $userAddress;
    
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    
    public function setName($name){
        $this->email = $name;
    }
    public function getName(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setUserAddress($userAddress){
        $this->userAddress = $userAddress;
    }
    
    public function getUserAddress(){
        return $this->userAddress;
    }
}

