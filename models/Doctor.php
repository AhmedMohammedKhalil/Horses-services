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
                unset($_SESSION['CAPTCHA_CODE']);

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
        $error=[];
        $name=$data[0];
        $email=$data[1];
        $password=$data[2];
        $confirm_password=$data[3];
        $specialization=$data[4];
        $phone=$data[5];
        $address=$data[6];
        $description=$data[7];
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
                        unset($_SESSION['CAPTCHA_CODE']);

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

    public function getDoctors($select, $table, $order)
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table  ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
    public function getDoctor($select, $table,$order, $where) 
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}

    public function getSearchedDoctor($select, $table,$order,$where) 
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}

    public function update($doctor_id,$data,$photoName) 
    {
        extract($data);
        $query = $this->con->prepare("UPDATE doctors SET name=:name , email = :email , photo =:photoName, specialization =:specialization,phone =:phone ,address =:address ,description=:description WHERE id={$doctor_id}");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("photoName", $photoName, PDO::PARAM_STR);
        $query->bindParam("specialization", $specialization, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }

    public function changePassword($doctor_id,$data) 
    {
        extract($data);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->con->prepare("UPDATE doctors SET password=:hash WHERE id={$doctor_id}");
        $query->bindParam("hash", $hash, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }

    public function count() {
        $statment = $this->con->prepare("SELECT count(*) as count FROM doctors");
		$statment->execute();
		$rows = $statment->fetch(PDO::FETCH_ASSOC);
        $count = $rows['count'];
		return $count;
    }
}