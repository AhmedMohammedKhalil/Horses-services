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
    public function getAdmin($select, $table, $order)
    {
        $statment = $this->con->prepare("SELECT $select FROM $table ORDER BY $order DESC");
		$statment->execute();

		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
    }

    public function update($admin_id,$data) 
    {
        extract($data);
        $query = $this->con->prepare("UPDATE admins SET name=:name , email = :email  WHERE id={$admin_id}");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }

    public function changePassword($admin_id,$data) {
        extract($data);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->con->prepare("UPDATE admins SET password=:hash WHERE id={$admin_id}");
        $query->bindParam("hash", $hash, PDO::PARAM_STR);
        $successed = $query->execute();
        return $successed;
    }
}