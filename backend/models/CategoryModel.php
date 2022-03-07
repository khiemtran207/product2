<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 10/29/2021
 * Time: 9:21 AM
 */
require_once "models/Model.php";
require_once "models/Pagination.php";
    class CategoryModel extends Model{

        public $id;
        public $name;
        public $avt;
        public $description;
        public $status;
        public $created_at;
        public $updated_at;
        private $str_search;

        public function __construct()
        {
            parent::__construct();
            if(isset($_GET['content_search']) && !empty($_GET['content_search'])){
                $content_search = addslashes($_GET['content_search']);
                $this->str_search = "AND categories.name LIKE '%$content_search%' || categories.id LIKE '$content_search%'";
            }
        }

        public function create_category(){
            $obj_insesrt = $this->connection->prepare("
                INSERT INTO categories(name,avatar,description,status) VALUES(:name,:avatar,:description,:status)
            ");
            return $obj_insesrt->execute([
                ':name'=>$this->name,
                ':avatar'=>$this->avt,
                ':description'=>$this->description,
                ':status'=>$this->status
            ]);
        }

        public function selectAll_category(){
            $obj_select_all = $this->connection->prepare("
                SELECT * FROM categories WHERE TRUE $this->str_search ORDER BY id DESC
            ");
            $obj_select_all->execute();
            return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_category($id){
            $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE categories.id = $id");
            return $obj_delete->execute();
        }

        public function selectOne_category($id){
            $obj_selectOne = $this->connection->prepare(
                "SELECT * FROM categories WHERE id = $id"
            );
            $obj_selectOne->execute();
            return $obj_selectOne->fetch(PDO::FETCH_ASSOC);
        }

        public function update_category($id){
            $obj_update = $this->connection->prepare("UPDATE categories SET name=:name,avatar=:avatar,
                description=:description,
                status=:status,updated_at=:updated_at WHERE id = $id
            ");
            return $obj_update->execute([
                ':name'=>$this->name,
                ':avatar'=>$this->avt,
                ':description'=>$this->description,
                ':status'=>$this->status,
                ':updated_at'=>$this->updated_at
            ]);
        }

        public function select_Pagination($param = []){
            $limit = $param['limit'];
            $page = $param['page'];
            $start = ($page - 1) * $limit;
            $obj_select = $this->connection->prepare("SELECT * FROM categories where TRUE $this->str_search LIMIT $start,$limit");
            $obj_select->execute();
            return $obj_select->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>