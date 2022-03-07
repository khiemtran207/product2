<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 11/25/2021
 * Time: 10:59 AM
 *
CREATE TABLE IF NOT EXISTS users(
id INT(11) AUTO_INCREMENT,
username VARCHAR(255),
firstname VARCHAR(255),
lastname VARCHAR(255),
phone INT(11),
address VARCHAR(255),
email VARCHAR(255),
avatar VARCHAR(255),
job VARCHAR(255),
lastlogin DATETIME,
status TINYINT DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME,
PRIMARY KEY(id)
);
 */
require_once 'models/Model.php';
class UserModel extends Model{
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $job;
    public $lastlogin;
    public $status;
    public $created_at;
    public $updated_at;
    public $str_search;

    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['content_search']) && !empty($_GET['content_search'])){
            $content_search = addslashes($_GET['content_search']);
            $this->str_search = "AND users.username LIKE '%$content_search%' || users.id LIKE '$content_search%'";
        }
    }

    public function checkUser($username){
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM users WHERE users.username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function checkUserUpdate($username){
        $obj_select = $this->connection->prepare("SELECT users.username FROM users WHERE users.username != '$username'");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkLogin($username, $password){
        $obj_check = $this->connection->prepare("SELECT * FROM users WHERE users.username=:username&&users.password=:password");
        $obj_check->execute([
            ':username' => $username,
            ':password'=>$password
        ]);
        return $obj_check->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUser(){
        $obj_insert = $this->connection->prepare("INSERT INTO users(username,password,firstname,lastname,phone,
email,address,avatar,job,lastlogin,status) VALUES (:username,:password,:firstname,:lastname,:phone,:email,:address,:avatar,:job,:lastlogin,:status)");
        return $obj_insert->execute([
            ':username'=>$this->username,
            ':password'=>$this->password,
            ':firstname'=>$this->firstname,
            ':lastname'=>$this->lastname,
            ':phone'=>$this->phone,
            ':email'=>$this->email,
            ':address'=>$this->address,
            ':avatar'=>$this->avatar,
            ':job'=>$this->job,
            ':lastlogin'=>$this->lastlogin,
            ':status'=>$this->status
        ]);
    }

    public function select_count_user(){
        $obj_select_count = $this->connection->prepare("SELECT COUNT(id) FROM users WHERE true $this->str_search");
        $obj_select_count->execute();
        return $obj_select_count->fetchColumn();
    }

    public function select_all_pagination($param){
        $limit = $param['limit'];
        $page = $param['page'];
        $start = ($page - 1)*$limit;
        $obj_select = $this->connection->prepare("SELECT * FROM users WHERE TRUE $this->str_search LIMIT $start,$limit");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_one($id){
        $obj_select = $this->connection->prepare("SELECT * FROM users WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $obj_delete = $this->connection->prepare("DELETE FROM users WHERE id = $id");
        return $obj_delete->execute();

    }

    public function update($id){
        $obj_update = $this->connection->prepare("
            UPDATE users SET username=:username,firstname=:firstname,lastname=:lastname,phone=:phone,address=:address,
            email=:email,avatar=:avatar,job=:job,status=:status,updated_at=:updated_at WHERE id = $id
        ");
        return $obj_update->execute([
            ':username'=>$this->username,
            ':firstname'=>$this->firstname,
            ':lastname'=>$this->lastname,
            ':phone'=>$this->phone,
            ':address'=>$this->address,
            ':email'=>$this->email,
            ':avatar'=>$this->avatar,
            ':job'=>$this->job,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ]);
    }

    public function lastLogin($id){
        $obj_update = $this->connection->prepare("UPDATE users SET lastlogin=:lastlogin WHERE id=$id");
        return $obj_update->execute([
           ':lastlogin' =>$this->lastlogin
        ]);
    }

    public function changePassword($id){
        $obj_update = $this->connection->prepare("UPDATE users SET password=:password WHERE id = $id");
        return $obj_update->execute([
            ':password'=>$this->password
        ]);
    }
}