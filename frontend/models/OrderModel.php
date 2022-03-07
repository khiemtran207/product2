<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/27/2022
 * Time: 4:10 PM
 */
require_once "models/Model.php";
class OrderModel extends Model{
    public $id;
    public $user_id;
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;
    public $created_at;
    public $updated_at;
    public function insert(){
       $obj_insert =  $this->connection->prepare("INSERT INTO orders(fullname,address,mobile,email,note,price_total,payment_status)
  VALUES (:fullname,:address,:mobile,:email,:note,:price_total,:payment_status)
");
        $obj_insert->execute([
            ':fullname'=>$this->fullname,
            ':address'=>$this->address,
            ':mobile'=>$this->mobile,
            ':email'=>$this->email,
            ':note'=>$this->note,
            ':price_total'=>$this->price_total,
            ':payment_status'=>$this->payment_status
        ]);
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}