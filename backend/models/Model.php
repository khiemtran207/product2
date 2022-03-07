<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 10/29/2021
 * Time: 9:21 AM
 */
require_once 'configs/database.php';
class Model extends Database{
    protected $connection;
    public function __construct()
    {
        $this->connection = $this->getConnect();
    }
    protected function getConnect(){
        try{
            $connection = new PDO(Database::DB_DSN,Database::DB_NAME,Database::DB_PASSWORD);
        }catch (PDOException $e){
            die("kết nối database thất bại". $e->getMessage());
        }
        return $connection;
    }
    protected function closeConnection(){
        $this->connection = null;
    }
}