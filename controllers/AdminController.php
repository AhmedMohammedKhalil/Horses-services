<?php
include_once ('../models/Admin.php');
class AdminController {

    

    public static function show_login($adminroute = '../admin/') {
        header('Location: '.$adminroute.'login.php');
    }

    public function login($adminroute = '../admin/') 
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
                    header('Location: '.$adminroute."login.php?error={$error}&data={$encoded}");
                    exit();
                }
                $data = [$email,$password];
                $admin = new Admin();
                $admin->select($data);

            }
        }
        
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['type']);
        unset($_SESSION['username']);
        header('location:../index.php');
    }
    
}