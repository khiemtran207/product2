<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 11/21/2021
 * Time: 8:08 PM
 */
require_once 'models/Model.php';

class ProductModel extends Model{
    public $id;
    public $category_id;
    public $name;
    public $avatar;
    public $price;
    public $quantity;
    public $summary;
    public $description;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $status;
    public $created_at;
    public $updated_at;
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
            $this->str_search .= "AND products.category_id = {$_GET['category_id']}";
        }
        if(isset($_GET['content_search']) && !empty($_GET['content_search'])){
            $content_search = addslashes($_GET['content_search']);
            $this->str_search .= " AND products.name LIKE '%$content_search%' || products.id LIKE '$content_search%'";
        }
    }

    public function select_count_product(){
        $obj_select_count = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search ");
        $obj_select_count->execute();
        return $obj_select_count->fetchColumn();
    }

    public function select_pagination_product($param = []){
        $limit = $param['limit'];
        $page = $param['page'];
        $start = ($page - 1)*$limit;
        $obj_select_pagination = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE TRUE $this->str_search ORDER BY products.id DESC LIMIT $start,$limit");
        $obj_select_pagination->execute();
        return $obj_select_pagination->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_product(){
        $obj_insert = $this->connection->prepare("INSERT INTO products(category_id,name,avatar,price,quantity,summary,description,seo_title,seo_description,seo_keywords,status) 
        VALUES (:category_id,:name,:avatar,:price,:quantity,:summary,:description,:seo_title,:seo_description,:seo_keywords,:status)");
        return $obj_insert->execute([
            ':category_id'=>$this->category_id,
            ':name'=>$this->name,
            ':avatar'=>$this->avatar,
            ':price'=>$this->price,
            ':quantity'=>$this->quantity,
            ':summary'=>$this->summary,
            ':description'=>$this->description,
            ':seo_title'=>$this->seo_title,
            ':seo_description'=>$this->seo_description,
            ':seo_keywords'=>$this->seo_keywords,
            ':status'=>$this->status
        ]);
    }

    public function select_one($id){
        $obj_select_one = $this->connection->prepare("SELECT products.*, categories.name as category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE TRUE AND products.id = $id");
        $obj_select_one->execute();
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_product($id){
        $obj_delete = $this->connection->prepare("DELETE FROM products WHERE products.id = $id");
        return $obj_delete->execute();
    }

    public function delete_products_category($id){
        $obj_delete = $this->connection->prepare("DELETE FROM products WHERE products.category_id = $id");
        return $obj_delete->execute();
    }

    public function update_product($id){
        $obj_update = $this->connection->prepare("UPDATE products SET category_id=:category_id, name=:name, 
avatar=:avatar, price=:price, quantity=:quantity, summary=:summary, description=:description, seo_title=:seo_title, 
seo_description=:seo_description, seo_keywords=:seo_keywords, status=:status, updated_at=:updated_at WHERE id = $id");
        return $obj_update->execute([
            ':category_id'=>$this->category_id,
            ':name'=>$this->name,
            ':avatar'=>$this->avatar,
            ':price'=>$this->price,
            ':quantity'=>$this->quantity,
            ':summary'=>$this->summary,
            ':description'=>$this->description,
            ':seo_title'=>$this->seo_title,
            ':seo_description'=>$this->seo_description,
            ':seo_keywords'=>$this->seo_keywords,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ]);
    }

}

?>