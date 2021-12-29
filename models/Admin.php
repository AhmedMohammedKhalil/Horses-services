<?php 
include_once('connect.php');
class Admin extends DB{
    protected $table;
    protected $con;
    public function __construct()
    {
        $this->table = 'admins';
        $db=new DB();
        $this->con = $db->connect();
    }

    public function select($data) 
    {
        $email=$data[0];
        $password=$data[1];
        $encoded= json_encode(['email'=>$email]);
        $query = $this->con->prepare("SELECT * FROM admins WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {

            $error=json_encode(['email_error'=>"this email not found"]);
            header("location: ../admin/login.php?error={$error}&data={$encoded} " );
            exit();
        } else {
            if (password_verify($password, $result['password'])) {
                
                $_SESSION['admin'] = $result;    
                $_SESSION['username'] = $result['name'];
                $_SESSION['type'] ="admin";
            
                header('location: ../index.php' );
                exit();
            } else {
                
                $error=json_encode(['password_error'=>"Wrong password "]);

                header("location: ../admin/login.php?error={$error}&data={$encoded} " );
                exit();
            }
        }
    }
}