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

    public function getProducts($select, $table, $order)
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table ORDER BY $order DESC");
		$statment->execute();

		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
	}
    // public function getProoduct($id)
    // {
    //     $get = $this->con->prepare("SELECT * FROM products where id = $id");

	// 	$get->execute();

	// 	$product = $get->fetch(PDO::FETCH_ASSOC);
    //     return $product;
	// } 

    public function getProduct($select, $table,$order, $where) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
    
    public function getTrainerProducts($select, $table,$order, $where) 
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	} 

    public function getTProducts($trainer_id)
    {
        $statment=$this->con->prepare("SELECT p.*
        FROM products p,trainer_products tp,trainers t
        WHERE p.id=tp.product_id AND t.id=tp.trainer_id AND trainer_id= :trainer_id");
        $statment->bindParam("trainer_id", $trainer_id, PDO::PARAM_STR);
        $statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
        
    }
    public function getSearchedProduct($select, $table,$order,$where) 
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}

    public function add($data ,$photo,$trainer_id)
    {
        extract($data);
        $query = $this->con->prepare("INSERT INTO products(category,details,name,price,photo) VALUES (?,?,?,?,'{$photo}')");
        $query->execute($data);
        $id=$this->con->lastInsertId();
        $query = $this->con->prepare("INSERT INTO trainer_products(trainer_id,product_id) VALUES ({$trainer_id},{$id})");
        $query->execute();
        return $id;

    }
    public function delete($id)
    {
        $get = $this->con->prepare("DELETE FROM user_orders 
        WHERE product_id = $id");
        $get->execute();

        $get = $this->con->prepare("DELETE FROM trainer_products 
        WHERE product_id = $id");
        $get->execute();

        $get = $this->con->prepare("DELETE FROM user_reviews 
        WHERE product_id = $id");
        $get->execute();
    
    }

    public function update($data,$photo)
    {
            $dataupdated = array_values($data);
            $query = $this->con->prepare("UPDATE products SET category = ? , details = ? , name = ? ,price = ? ,photo = '{$photo}'
                            where id = ?");
            $success = $query->execute($dataupdated);
            return $success;
    }
}