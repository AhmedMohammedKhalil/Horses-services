<?php
include_once ('../models/User.php');
include_once('../models/UserOrder.php');

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
                if(empty($email)) {
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
                        'password_error' => isset($passwordError) ? $passwordError : ''
                    ]);                    
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
                if (empty($email)) {
                    $error=json_encode(['email_error'=>"email required"]);
                    header("location: ../user/register.php?error={$error}&data={$encoded} " );
                    exit();
                } 
                if (empty($password)) {
                    $error=json_encode(['password_error'=>"password required"]);
                    header("location: ../user/register.php?error={$error}&data={$encoded} " );
                    exit();
                } 
                if (strlen($password)>0 && strlen($password)<8) {
                    $error=json_encode(['password_error'=>"password less than 8 digit"]);
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

    public static function buy_Product($id)
    {
        $product_id=$id;
        $user_id=$_SESSION['user']['id'];
        $order= new UserOrder();
        $data =[$user_id,$product_id];
        $order->storeOrder($data);
    }

    public function showPurchases()
    {
        if(isset($_SESSION['user']))
        {
            $user_id=$_SESSION['user']['id'];
            $data=[$user_id];
            $order= new UserOrder();
            $order->getPurchases($data);
        }

    }
    public function userProfile()
    {
        include_once('../models/User.php');
        
        $user_id=$_SESSION['user']['id'];
        $user = new User();  
        $user = $user->getUser('*','users','id',"id ={$user_id}");
        $data =  json_encode(['user' => $user]);
        header("location: ../user/profile.php?data={$data}");
    }
    public function userSettings ($userroute = '../user/') {
        header('Location: '.$userroute.'settings.php');
    }

    public function editUser($userroute = '../user/')
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {  if(isset($_POST['userEdit'])) 
            {
            $name=trim($_POST['name']);
            $email = trim($_POST['email']);
            $photoName = $_FILES['photo']['name'];
            $photoSize = $_FILES['photo']['size'];
            $photoTmp	= $_FILES['photo']['tmp_name'];
            $photoAllowedExtension = array("jpeg", "jpg", "png");
            $explode = explode('.', $photoName);
            $photoExtension = strtolower(end($explode));
            $data = [
                'email'=>$email,
                'name'=>$name,
            ];
            $encoded= json_encode($data);
            $error=[];

            if (! empty($photoName) && ! in_array($photoExtension, $photoAllowedExtension)) {
                $error[] = 'This Extension Is Not <strong>Allowed</strong>';
            }
            if ($photoSize > 4194304) {
                $error[] = 'photo Cant Be Larger Than <strong>4MB</strong>';
            }
            if (empty($name)) {
                array_push($error,"Username required");
            } 

            if(!empty($error))
            {
                $error=json_encode($error);
                header("location: {$userroute}settings.php?errors={$error}&data={$encoded}" );
                exit();
            }
            $user_id = $_SESSION['user']['id'];
                $oldphoto = $_SESSION['user']['photo'];
                $path = '../files/users/'.$user_id;
            if(!is_dir($path)) {
                mkdir($path);
            } 
            if($oldphoto != null) {
                unlink($path.'/'.$oldphoto);
            }
            move_uploaded_file($photoTmp, '../files/users/'.$user_id.'/'. $photoName);

            $user = new User();
            $success = $user->update($user_id,$data,$photoName);
            if($success) {
                $_SESSION['user']['name'] = $name;
                $_SESSION['username'] = $name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['photo'] = $photoName;
                header('Location: Controller.php?do=showUserProfile'); 
            }

        }
        }
    }

    public function showChangePassword ($userroute = '../user/') {
        header('Location: '.$userroute.'changepassword.php');
    }
    public function changePassword ($userroute = '../user/') 
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
                    header("location: {$userroute}changepassword.php?errors={$error}" );
                    exit();
                }
                $user = new User();
                $user_id = $_SESSION['user']['id'];
                $success = $user->changePassword($user_id,$data);
                if($success) {
                    $_SESSION['user']['password'] = password_hash($password, PASSWORD_BCRYPT);
                    header('Location: Controller.php?do=showUserProfile'); 
                }

            }
        }
        
    }
}