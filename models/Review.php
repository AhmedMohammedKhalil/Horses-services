<?php 
include_once('connect.php');
class Review extends DB{
    protected $table;
    protected $con;

    public function __construct()
    {
        $this->table = 'user_reviews';
        $db=new DB();
        $this->con = $db->connect();
    }

    public function getReview($user_id, $product_id) {
        $select = "*";
        $table = "user_reviews";
        $where = "product_id = {$product_id} and user_id = {$user_id}";
        $order = "id";
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetch(PDO::FETCH_ASSOC);
		return $rows;
    }

    public function update($data) {

        $statment = $this->con->prepare("UPDATE user_reviews SET review = ? where user_id = ? and product_id = ? ");
		return $statment->execute($data);
        
    }

    public function add($data) {
        $statment = $this->con->prepare("INSERT INTO user_reviews(review,user_id,product_id) VALUES(?,?,?)");
        return $statment->execute($data);
    }
}