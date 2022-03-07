<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/22/2022
 * Time: 3:10 PM
 */
require_once 'configs/Database.php';
class Model extends Database{

    public $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    public function connect(){
        try{
            $connect = new PDO(Database::DB_DSN,Database::DB_Username,Database::DB_Password);
        }catch (PDOException $e){
            die("Kết nối database thất bại: ".$e->getMessage());
        }
        return $connect;
    }

    public function closeConnect(){
        $this->connection = null;
    }

}