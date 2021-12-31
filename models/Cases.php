<?php 
include_once('connect.php');
class Cases extends DB{
    protected $table;
    protected $con;

    public function __construct()
    {
        $this->table = 'cases';
        $db=new DB();
        $this->con = $db->connect();
    }
    
    public function getDoctorsCases($select, $table,$order, $where) {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
}
