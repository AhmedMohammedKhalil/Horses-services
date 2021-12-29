<?php 
include_once('connect.php');
class Doctor extends DB{

    protected $table;
    protected $con;
    public function __construct()
    {
        $this->table = 'doctors';
        $db=new DB();
        $this->con = $db->connect();
    }
    public function select($data) 
    {
        $email=$data[0];
        $password=$data[1];
        $encoded= json_encode(['email'=>$email]);
        $query = $this->con->prepare("SELECT * FROM doctors WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {

            $error=json_encode(['email_error'=>"this email not found"]);
            header("location: ../doctor/login.php?error={$error}&data={$encoded} " );
            exit();
        } else {
            if (password_verify($password, $result['password'])) {
                
                $_SESSION['doctor'] = $result;    
                $_SESSION['username'] = $result['name'];
                $_SESSION['type'] ="doctor";
            
                header('location: ../index.php' );
                exit();
            } else {
                
                $error=json_encode(['password_error'=>"Wrong password "]);

                header("location: ../doctor/login.php?error={$error}&data={$encoded} " );
                exit();
            }
        }
    }

    public function add($data)
    {   
       // $data = [$name,$email,$password,$confirm_password,$specialization,$mobile,$address,$description];
        $error=[];
        $name=$data[0];
        $email=$data[1];
        $password=$data[2];
        $confirm_password=$data[3];
        $specialization=$data[4];
        $phone=$data[5];
        $address=nl2br($data[6]);
        $description=nl2br($data[7]);
        if($password ==$confirm_password)
        {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $encoded= json_encode(['email'=>$email ,'name'=>$name ,
             'specialization'=>$specialization,'phone'=>$phone ,'address'=>$address
             ,'description'=>$description
            ]);
            $query = $this->con->prepare("SELECT * FROM doctors WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                $error=json_encode(['email_error'=>"this email exist"]);
                header("location: ../doctor/register.php?error={$error}&data={$encoded} " );
                exit();
            } 
            else
            {
                if ($query->rowCount() == 0) {
                   
                    $query = $this->con->prepare("INSERT INTO doctors(name,email,password,specialization,phone,address,description) VALUES (:name,:email,:password_hash,:specialization,:phone,:address,:description)");
                    $query->bindParam("name", $name, PDO::PARAM_STR);
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                    $query->bindParam("specialization", $specialization, PDO::PARAM_STR);
                    $query->bindParam("phone", $phone, PDO::PARAM_STR);
                    $query->bindParam("address", $address, PDO::PARAM_STR);
                    $query->bindParam("description", $description, PDO::PARAM_STR);
                    $insert_result = $query->execute();
                    if($insert_result){
                        $query = $this->con->prepare("SELECT * FROM doctors WHERE email=:email");
                        $query->bindParam("email", $email, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['doctor'] = $result;    
                        $_SESSION['username'] = $result['name'];
                        $_SESSION['type'] ="doctor";
                    header('location: ../index.php' );
                    exit();
                    }else{
                        $error=json_encode(['server_error'=>"sever error exist"]);
                        header("location: ../doctor/register.php?error={$error}&data={$encoded} " );
                        exit();
                    }
                    
                } 
            }
        }
        else {
            $encoded= json_encode(['email'=>$email ,'name'=>$name]);        
            $error=json_encode(['password_error'=>"password and confirm not matched "]);
            header("location: ../doctor/register.php?error={$error}&data={$encoded} " );
            exit();
        }
        
    }
}