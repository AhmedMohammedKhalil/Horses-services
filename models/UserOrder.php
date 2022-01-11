<?php 
include_once('connect.php');
class UserOrder extends DB{
    protected $table;
    protected $con;

    public function __construct()
    {
        $this->table = 'user_orders';
        $db=new DB();
        $this->con = $db->connect();
    }
    
    public function storeOrder($data) 
    {
        $user_id=$data[0];
        $product_id=$data[1];
        
            $query = $this->con->prepare("INSERT INTO user_orders(user_id,product_id) VALUES (:user_id,:product_id)");
                $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
                $query->bindParam("product_id", $product_id, PDO::PARAM_STR);
                $insert_result = $query->execute();
                if($insert_result)
                {
                    $query = $this->con->prepare("SELECT users.name AS user_name, products.name AS product_name,trainers.name AS trainer_name,products.price ,trainers.id AS t_id ,products.id AS p_id 
                    FROM products,trainers,user_orders,trainer_products ,users 
                    WHERE users.id=user_orders.user_id 
                    AND user_orders.product_id=products.id 
                    AND products.id = trainer_products.product_id 
                    AND trainer_products.trainer_id=trainers.id 
                    AND users.id =:user_id");
                    $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    $data=json_encode(['products'=>$result]);
                header("location: ../user/purchases.php?data={$data}" );
                }   
    }

    public function getPurchases($data)
    {
        $user_id=$data[0];
        $query = $this->con->prepare("SELECT users.name AS user_name, products.name AS product_name,trainers.name AS trainer_name,products.price ,trainers.id AS t_id ,products.id AS p_id 
        FROM products,trainers,user_orders,trainer_products ,users 
        WHERE users.id=user_orders.user_id 
        AND user_orders.product_id=products.id 
        AND products.id = trainer_products.product_id 
        AND trainer_products.trainer_id=trainers.id 
        AND users.id =:user_id");
        $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $data=json_encode(['products'=>$result]);
    header("location: ../user/purchases.php?data={$data}" );
    }

    public function count() {
        $statment = $this->con->prepare("SELECT count(*) as count FROM user_orders");
		$statment->execute();
		$rows = $statment->fetch(PDO::FETCH_ASSOC);
        $count = $rows['count'];
		return $count;
    }


    public function getAllorders() {
        $query = $this->con->prepare("SELECT u.name AS u_name, p.name AS p_name, p.id AS p_id, t.name AS t_name, t.id AS t_id
        FROM products p,trainers t,user_orders us,trainer_products tp,users u
        WHERE u.id=us.user_id 
        AND us.product_id=p.id 
        AND p.id = tp.product_id 
        AND tp.trainer_id=t.id ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;


    }
    
}