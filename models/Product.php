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

    public function getReviews($id) {
        
        $select = "u.name as user_name, u.photo as user_photo , u.id as user_id , r.review";
        $table = "users u , user_reviews r , products p";
        $where = "p.id = {$id} and p.id = r.product_id and r.user_id = u.id";
        $order = "r.id";
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

    public function count() {
        $statment = $this->con->prepare("SELECT count(*) as count FROM products");
		$statment->execute();
		$rows = $statment->fetch(PDO::FETCH_ASSOC);
        $count = $rows['count'];
		return $count;
    }



    public function getAllProducts() {
        $select = "t.name as t_name, p.name as p_name , t.id as t_id , p.id as p_id , p.price";
        $table = "products p,trainer_products tp,trainers t";
        $where = "p.id=tp.product_id AND t.id=tp.trainer_id";
        $order = "p.id";
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
    }
}