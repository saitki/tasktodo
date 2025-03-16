<?php 
require_once "../Models/user.php";
class userController {
    public $userModel;

    public function __construct(){
        $this->userModel = new user();
    }
    public function getAuthentication($email, $password) {
        $user = $this->userModel->getDataLogin($email, $password);
        return $user;
    }
    public function getEmailValid($email) {
        $user = $this->userModel->getEmail($email);
        return $user;
    }
    public function registerUser($name, $email, $password) {
        $user = $this->userModel->createUser($name, $email, $password);
        return $user;
    }
}

?>