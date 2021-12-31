<?php 
include_once('connect.php');
class Product extends DB{
    protected $table;
    protected $con;
    public function __construct()
    {
        $this->table = 'products';
        $db=new DB();
        $this->con = $db->connect();
    }

    public function getProducts($select, $table, $order) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table ORDER BY $order DESC");
		$statment->execute();

		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
	}
    public function getProduct($select, $table,$order, $where) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	} 
    public function getTrainerProducts($select, $table,$order, $where) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	} 
    public function getSearchedProduct($select, $table,$order,$where) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
}