<?php 
include_once('connect.php');
class PreviousWork extends DB{
    protected $table;
    protected $con;

    public function __construct()
    {
        $this->table = 'previous_works';
        $db=new DB();
        $this->con = $db->connect();
    }
    
    public function getTrainerWorks($select, $table,$order, $where) {
        $statment = $this->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order DESC");
		$statment->execute();
		$rows = $statment->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}   

    public function add($data)
    {
        $job_title=$data[0];
        $placement=$data[1];
        $details=$data[2];
        $job_estimation=$data[3];
        $trainer_id=$data[4];
        $query = $this->con->prepare("INSERT INTO previous_works(job_title,placement,details,job_estimation,trainer_id) VALUES (:job_title,:placement,:details,:job_estimation,:trainer_id)");
        $query->bindParam("job_title", $job_title, PDO::PARAM_STR);
        $query->bindParam("placement", $placement, PDO::PARAM_STR);
        $query->bindParam("details", $details, PDO::PARAM_STR);
        $query->bindParam("job_estimation", $job_estimation, PDO::PARAM_STR);
        $query->bindParam("trainer_id", $trainer_id, PDO::PARAM_STR);
        $query->execute();
        header('Location: Controller.php?do=showWorks'); 

    }
    public function getWork($id)
    {
        $get = $this->con->prepare("SELECT * FROM previous_works where id = $id");

		$get->execute();

		$case = $get->fetch(PDO::FETCH_ASSOC);

		return $case;
    }

    public function update($data) {
        $dataupdated = array_values($data);
        $query = $this->con->prepare("UPDATE previous_works SET job_title = ? , placement = ? ,details = ? ,job_estimation = ? 
                        where id = ? ");
        $success = $query->execute($dataupdated);
        return $success;
    }

    public function delete($id) {
        $get = $this->con->prepare("DELETE FROM previous_works 
                            WHERE id = $id");
        $success = $get->execute();
        return $success;
    }
}
