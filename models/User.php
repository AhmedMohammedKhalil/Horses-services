<?php 
include_once('connect.php');
class User extends DB{
    protected $table;
    protected $con;
    public function __construct()
    {
        $this->table = 'users';
        $this->con = DB::connect();
    }

    public function insert() {
    }

    public function select($data) {
    }
}