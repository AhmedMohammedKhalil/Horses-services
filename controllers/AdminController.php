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

    public function adminProfile()
    {
        include_once('../models/Admin.php');
        
        $admin_id=$_SESSION['admin']['id'];
        $admin = new Admin();  
        $admin = $admin->getAdmin('*','admins','id',"id ={$admin_id}");
        $data =  json_encode(['admin' => $admin]);
        header("location: ../admin/profile.php?data={$data}");
    }
    public function adminSettings ($adminroute = '../admin/') {
        header('Location: '.$adminroute.'settings.php');
    }

    public function editAdmin($adminroute = '../admin/')
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {  if(isset($_POST['adminEdit'])) 
            {
            $name=trim($_POST['name']);
            $email = trim($_POST['email']);
           
            $data = [
                'email'=>$email,
                'name'=>$name,
            ];
            $encoded= json_encode($data);
            $error=[];

            if (empty($name)) 
            {
                array_push($error,"Username required");
            } 

            if(!empty($error))
            {
                $error=json_encode($error);
                header("location: {$adminroute}settings.php?errors={$error}&data={$encoded}" );
                exit();
            }
            $admin_id = $_SESSION['admin']['id'];
            $admin = new Admin();
            $success = $admin->update($admin_id,$data);
            if($success) {
                $_SESSION['admin']['name'] = $name;
                $_SESSION['username'] = $name;
                $_SESSION['admin']['email'] = $email;
                header('Location: Controller.php?do=showAdminProfile'); 
            }

        }
        }
    }

    public function showChangePassword ($adminroute = '../admin/') {
        header('Location: '.$adminroute.'changepassword.php');
    }
    public function changePassword ($adminroute = '../admin/') 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        { 
            if(isset($_POST['change_password'])) {
                $password = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_passowrd']);
                $data = [
                    'password' => $password
                ];
                $error=[];
                if(strlen($password)<8) {
                    array_push($error,"please enter password greater than 8 digits");
                } 
                if ($password!=$confirm_password) {
                    array_push($error,"passwords not matched");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: {$adminroute}changepassword.php?errors={$error}" );
                    exit();
                }
                $admin = new Admin();
                $admin_id = $_SESSION['admin']['id'];
                $success = $admin->changePassword($admin_id,$data);
                if($success) {
                    $_SESSION['admin']['password'] = password_hash($password, PASSWORD_BCRYPT);
                    header('Location: Controller.php?do=showAdminProfile'); 
                }

            }
        }
        
    }
    
}