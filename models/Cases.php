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
    
    public function getDoctorsCases($select, $table,$order, $where)
    {
    
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}

    public function add($data)
    {
        $title=$data[0];
        $details=$data[1];
        $treatment=$data[2];
        $doctor_id=$data[3];
        $query = $this->con->prepare("INSERT INTO cases(title,details,treatment,doctor_id) VALUES (:title,:details,:treatment,:doctor_id)");
        $query->bindParam("title", $title, PDO::PARAM_STR);
        $query->bindParam("details", $details, PDO::PARAM_STR);
        $query->bindParam("treatment", $treatment, PDO::PARAM_STR);
        $query->bindParam("doctor_id", $doctor_id, PDO::PARAM_STR);
        $query->execute();
        header('Location: Controller.php?do=showCases'); 

    }
    public function getCase($id)
    {
        $get = $this->con->prepare("SELECT * FROM cases where id = $id");

		$get->execute();

		$case = $get->fetch(PDO::FETCH_ASSOC);

		return $case;
    }

    public function update($data) {
        $dataupdated = array_values($data);
        $query = $this->con->prepare("UPDATE cases SET title = ? , details = ? , treatment = ? 
                        where id = ? ");
        $success = $query->execute($dataupdated);
        return $success;
    }

    public function delete($id) {
        $get = $this->con->prepare("DELETE FROM cases 
                            WHERE id = $id");
        $success = $get->execute();
        return $success;
    }
    
}
