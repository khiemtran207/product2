<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/27/2022
 * Time: 8:49 PM
 */
require_once "models/Model.php";
class OrderDetail extends Model{
    public $order_id;
    public $product_name;
    public $product_price;
    public $quantity;
    public function insert(){
        $obj_insert = $this->connection->prepare("INSERT INTO order_details(order_id,product_name,product_price,quantity) 
VALUES (:order_id,:product_name,:product_price,:quantity)");
        return $obj_insert->execute([
            ':order_id'=>$this->order_id,
            ':product_name'=>$this->product_name,
            ':product_price'=>$this->product_price,
            ':quantity'=>$this->quantity
        ]);
    }
}