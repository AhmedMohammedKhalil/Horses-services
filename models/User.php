<?php 
include_once('connect.php');
class User {
    protected $table;
    protected $con;
    public function __construct()
    {
        $this->table = 'users';
        $db=new DB();
        $this->con = $db->connect();
    }

    public function insert() 
    {
    }

    public function select($data) 
    {
        $email=$data[0];
        $password=$data[1];
        $encoded= json_encode(['email'=>$email]);
        $query = $this->con->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {

            $error=json_encode(['email_error'=>"this email not found"]);
            header("location: ../user/login.php?error={$error}&data={$encoded} " );
            exit();
        } else {
            if (password_verify($password, $result['password'])) {
                
                $_SESSION['user'] = $result;    
                $_SESSION['username'] = $result['name'];
                $_SESSION['type'] ="user";
            
                header('location: ../index.php' );
                exit();
            } else {
                
                $error=json_encode(['password_error'=>"Wrong password "]);

                header("location: ../user/login.php?error={$error}&data={$encoded} " );
                exit();
            }
        }
    }

    public function add($data)
    {
        $name=$data[0];
        $email=$data[1];
        $password=$data[2];
        $confirm_password=$data[3];
        if($password ==$confirm_password)
        {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $encoded= json_encode(['email'=>$email ,'name'=>$name]);
            $query = $this->con->prepare("SELECT * FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                $error=json_encode(['email_error'=>"this email exist"]);
                header("location: ../user/register.php?error={$error}&data={$encoded} " );
                exit();
            } 
            else
            {
                if ($query->rowCount() == 0) {
                   
                    $query = $this->con->prepare("INSERT INTO users(name,email,password) VALUES (:name,:email,:password_hash)");
                    $query->bindParam("name", $name, PDO::PARAM_STR);
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                    $insert_result = $query->execute();
                    if($insert_result){
                        $query = $this->con->prepare("SELECT * FROM users WHERE email=:email");
                        $query->bindParam("email", $email, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['user'] = $result;    
                        $_SESSION['username'] = $result['name'];
                        $_SESSION['type'] ="user";
                    header('location: ../index.php' );
                    exit();
                    }else{
                        $error=json_encode(['server_error'=>"sever error exist"]);
                        header("location: ../user/register.php?error={$error}&data={$encoded} " );
                        exit();
                    }
                    
                } 
            }
        }
        else {
            $encoded= json_encode(['email'=>$email ,'name'=>$name]);        
            $error=json_encode(['password_error'=>"password and confirm not matched "]);
            header("location: ../user/register.php?error={$error}&data={$encoded} " );
            exit();
        }
        
    }

}