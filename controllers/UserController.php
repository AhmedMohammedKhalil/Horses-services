<?php
include_once ('../models/User.php');
class UserController {

    
    public static function show_login($userroute = '../user/') {
        header('Location: '.$userroute.'login.php');
    }

    public static function show_register($userroute = '../user/') {
        header('Location: '.$userroute.'register.php');
    }

    public function login($userroute = '../user/') 
    {
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $data = [$email,$password];
               $encoded= json_encode(['email'=>$email]);
                if(strlen($password)<8){
                    $passwordError="password must be greater than 8 digit";
                    $error=json_encode(['password_error'=>$passwordError]);
                    header('Location: '.$userroute."login.php?error={$error}&data={$encoded}");
                    exit();
                }
                $data = [$email,$password];
                $user = new User();
                $user->select($data);

            }
        }
        
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['type']);
        unset($_SESSION['username']);
        header('location:../index.php');
    }

    public function register($userroute = '../user/')
    { 
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['register'])) {
                $name=trim($_POST['name']);
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $encoded= json_encode(['email'=>$email ,'name'=>$name]);
                if (strlen($password)<8) {
                    $error=json_encode(['password_error'=>"password this less than 8 digit"]);
                    header("location: ../user/register.php?error={$error}&data={$encoded} " );
                    exit();
                } 
                if ($password!=$confirm_password) {
                    $error=json_encode(['password_error'=>"passwords not match"]);
                    header("location: ../user/register.php?error={$error}&data={$encoded} " );
                    exit();
                } 
                $data = [$name,$email,$password,$confirm_password];
                $user = new User();
                $user->add($data);

            }
        }

    }

}