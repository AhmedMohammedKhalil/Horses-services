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
        $address=$data[2];
        $phone=$data[3];
        $password=$data[4];
        
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $encoded= json_encode(['email'=>$email ,'name'=>$name,'address'=>$address ,'phone'=>$phone]);
            $query = $this->con->prepare("SELECT * FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                $error=json_encode(["this email exist"]);
                header("location: ../user/register.php?error={$error}&data={$encoded} " );
                exit();
            } 
            else
            {
                if ($query->rowCount() == 0) {
                   
                    $query = $this->con->prepare("INSERT INTO users(name,email,password,address,phone) VALUES (:name,:email,:password_hash,:address,:phone)");
                    $query->bindParam("name", $name, PDO::PARAM_STR);
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                    $query->bindParam("address", $address, PDO::PARAM_STR);
                    $query->bindParam("phone", $phone, PDO::PARAM_STR);

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
                        $error=json_encode(["sever error exist"]);
                        header("location: ../user/register.php?error={$error}&data={$encoded} " );
                        exit();
                    }
                    
                } 
            }
        
    }

    public function getUser($select, $table, $order)
    {
        $statment = $this->con->prepare("SELECT $select FROM $table ORDER BY $order DESC");
		$statment->execute();

		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
    }

    public function update($user_id,$data,$photoName) 
    {
        extract($data);
        $query = $this->con->prepare("UPDATE users SET name=:name , email = :email , photo =:photoName ,phone =:phone , address =:address WHERE id={$user_id}");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("photoName", $photoName, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }

    public function changePassword($user_id,$data) {
        extract($data);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->con->prepare("UPDATE users SET password=:hash WHERE id={$user_id}");
        $query->bindParam("hash", $hash, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }

    public function count() {
        $statment = $this->con->prepare("SELECT count(*) as count FROM users");
		$statment->execute();
		$rows = $statment->fetch(PDO::FETCH_ASSOC);
        $count = $rows['count'];
		return $count;
    }

    public function getUsers($select, $table, $order)
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table  ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
}