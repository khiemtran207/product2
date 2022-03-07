<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/22/2022
 * Time: 3:20 PM
 */
require_once 'models/Model.php';

class ProductModel extends Model{

    public function getProductInHomePage($params){
        $str_filter = '';
        if (isset($params['categories'])) {
            $str_category = $params['categories'];
            $str_filter .= "AND categories.id IN $str_category";
        }
        if (isset($params['price'])) {
            $str_price = $params['price'];
            $str_filter .= " AND $str_price";
        }
        $limit = $params['limit'];
        $page = $params['page'];
//        $start = ($page - 1)*$limit;
        if(!isset($params['categories']) && !isset($params['price'])){
            $start = ($page - 1)*$limit;
        }else{
            $start = 0;
        }
        $obj_select = $this->connection->prepare("SELECT products.* FROM products INNER JOIN categories ON products.category_id = categories.id WHERE 1 $str_filter ORDER BY products.created_at DESC LIMIT $start,$limit");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countProduct(){
        $obj_select_count = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE");
        $obj_select_count->execute();
        return $obj_select_count->fetchColumn();
    }

    public function getProductById($id){
        $obj_select = $this->connection->prepare("SELECT * FROM products WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}