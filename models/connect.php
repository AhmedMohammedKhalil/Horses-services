<?php 

class DB {

    protected $dsn,$user,$pass,$option;
    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=horses';
        $this->user = 'root';
        $this->pass = '';
       
    }
    
    public function connect() {
        try {
            $con = new PDO($this->dsn, $this->user, $this->pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }
        catch(PDOException $e) {
            header('Location: ../errors/databaseclosed.php');
            exit();
        }
        
    }
	
    
}