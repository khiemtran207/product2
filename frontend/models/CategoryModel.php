<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/22/2022
 * Time: 10:11 PM
 */
require_once 'models/Model.php';
class CategoryModel extends Model{
    public function getCategoryInHomePage(){
        $obj_select = $this->connection->prepare('SELECT * FROM categories WHERE categories.status = 0 ORDER BY
 categories.created_at DESC LIMIT 0,3');
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategory(){
        $obj_select = $this->connection->prepare('SELECT * FROM categories WHERE categories.status = 0 ORDER BY categories.created_at DESC ');
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
}