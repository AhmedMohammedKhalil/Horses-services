<?php
include_once ('../models/Trainer.php');
class TrainerController {

   

    public static function show_login($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'login.php');
    }

    public static function show_register($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'register.php');
    }

    public function login($trainerroute = '../trainer/') 
    {
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $data = [$email,$password];
                $encoded= json_encode(['email'=>$email]);
                if (empty($email)) {
                    $emailError="email required";
                } 
                if (empty($password)) {
                    $passwordError="password required";
                } 
                if (strlen($password)>0 && strlen($password)<8) {
                    $passwordError="password must be greater than 8 digit";
                } 
                if(isset($emailError) || isset($passwordError)) 
                {
                    $error = json_encode([
                        'email_error'=> isset($emailError) ? $emailError : '',
                        'password_error'=>isset($passwordError) ? $passwordError : ''
                    ]);
                    header('Location: '.$trainerroute."login.php?error={$error}&data={$encoded}");
                    exit();
                }
                $data = [$email,$password];
                $trainer = new Trainer();
                $trainer->select($data);

            }
        }
        
    }

    public function logout()
    {
        unset($_SESSION['trainer']);
        unset($_SESSION['type']);
        unset($_SESSION['username']);
        header('location:../index.php');
    }

    public function register()
    { 
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['register'])) {
                $name=trim($_POST['name']);
                $email = trim($_POST['email']);
                $specialization = trim($_POST['specialization']);
                $phone = trim($_POST['phone']);
                $address = trim($_POST['address']);
                $description = trim($_POST['description']);
                $recommendation = trim($_POST['recommendation']);
                $password = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_password']);
                $encoded= json_encode(['email'=>$email ,'name'=>$name,'specialization'=>$specialization ,'phone'=>$phone , 'address'=>$address,'description'=>$description,'recommendation'=>$recommendation]);
                $error=[];
                if (empty($name)) {
                    array_push($error,"name required");
                } 
                if (empty($email)) {
                    array_push($error,"email required");
                } 
                if (empty($specialization)) {
                    array_push($error,"specialization required");
                } 
                if (empty($phone) || strlen($phone)<6 || !is_numeric($phone)) {
                    if(empty($phone))
                    {
                        array_push($error,"mobile required");
                    }
                    else if(strlen($phone)<6)
                    {
                        array_push($error,"Must be 6 digit");
                    }
                    else{
                        array_push($error,"mobile number contains numbers only");
                    }
                } 
                if (empty($password)) {
                    array_push($error,"password requires");
                } 
                if (strlen($password)>0 && strlen($password)<8) {
                    array_push($error,"this password less than 8 digit");
                } 
                if (empty($confirm_password)) {
                    array_push($error,"confirm_password requires");
                } 
                if ($password!=$confirm_password) {
                    array_push($error,"passwords not matched");
                } 
                if (empty($address)) {
                    array_push($error,"address required");
                } 
                if (empty($description)) {
                    array_push($error,"description required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../trainer/register.php?error={$error}&data={$encoded} " );
                    exit();
                }
                $data = [$name,$email,$password,$confirm_password,$specialization,$phone,$address,$description,$recommendation];
                $trainer = new Trainer();
                $trainer->add($data);

            }
        }

    }
}