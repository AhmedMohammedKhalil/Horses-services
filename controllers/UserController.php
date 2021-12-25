<?php
include '../models/User.php';
class UserController {

    
    public static function show_login($userroute = '../user/') {
        header('Location: '.$userroute.'login.php');
    }

    public static function show_register($userroute = '../user/') {
        header('Location: '.$userroute.'register.php');
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                //make validation
                $data = [$email,$password];
                $user = new User();
                $user->select($data);

            }
        }
        
    }

}