<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 10/27/2021
 * Time: 10:02 PM
 */
require_once 'models/Pagination.php';
require_once 'controllers/Controller.php';
require_once 'models/CategoryModel.php';
require_once 'models/ProductModel.php';
class ProductController extends Controller{

    public function index(){

        $this->title = "Danh sách sản phẩm";
        $product_model = new ProductModel();
        $count_product = (int) $product_model->select_count_product();
        $category_model = new CategoryModel();
        $select_category_all = $category_model->selectAll_category();
        $param = [
            'controller'=>'product',
            'action'=>'index',
            'total'=> $count_product,
            'limit'=>5,
            'full_mode'=>false
        ];
        $page = 1;
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
        $param['page'] = $page;
        $obj_pagination = new Pagination($param);
        $view_pagination = $obj_pagination->getPaginationPage();
        $select_product_pagination = $product_model->select_pagination_product($param);

        $this->content = $this->render('views/products/index.php',[
            'view_pagination'=>$view_pagination,
            'select_product_pagination'=>$select_product_pagination,
            'select_category_all'=>$select_category_all
        ]);
        require_once "views/layout/index.php";


    }

    public function create(){

        $this->title = "Thêm mới sản phẩm";
        if(isset($_POST['submit'])){
            $category_id = (int) $_POST['select_category'];
            $name = $_POST['name_product'];
            $avatar_arr = $_FILES['avatar'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $summary = $_POST['description_short'];
            $description =  $_POST['description'];
            if(isset($_POST['status'])){
                $status = $_POST['status'];
            }
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];

            if(empty($name)){
                $this->error = "Không được để trống tên sản phẩm";
            }else if(empty($price)){
                $this->error = "Không được để trống giá sản phẩm";
            }else if(empty($quantity)){
                $this->error = "Không được để trống số lượng sản phẩm";
            }else if(empty($seo_title)){
                $this->error = "Không được để trống seo title";
            }else if(empty($seo_description)){
                $this->error = "Không được để trống seo description";
            }else if(empty($seo_keywords)){
                $this->error = "Không được để trống seo keywords";
            }else if($avatar_arr['error'] == 0){
                $extension_avt = ['jpg','png','jpeg','gif'];
                $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
                $avt_size = round($avatar_arr['size'] / 1024 / 1024,2);
                if(!in_array($extension,$extension_avt)){
                    $this->error = "File tải lên phải là ảnh";
                }else if($avt_size > 2){
                    $this->error = "Ảnh tải lên phải có kích thước nhỏ hơn 2mb";
                }
            }

            if(empty($this->error)){
                $name_avt = "";
                if($avatar_arr['error'] == 0){
                    $location_save_avt = "assets/container_file";
                    if(!file_exists($location_save_avt)){
                        mkdir($location_save_avt);
                    }
                    $name_avt .= time()."-product-".$avatar_arr['name'];
                    move_uploaded_file($avatar_arr['tmp_name'], "$location_save_avt/$name_avt");
                }

               $product_model = new ProductModel();
               $product_model->category_id = $category_id;
               $product_model->name = $name;
               $product_model->avatar = $name_avt;
               $product_model->price = $price;
               $product_model->quantity = $quantity;
               $product_model->summary = $summary;
               $product_model->description = $description;
               $product_model->seo_title = $seo_title;
               $product_model->status = $status;
               $product_model->seo_description = $seo_description;
               $product_model->seo_keywords = $seo_keywords;

               $insert = $product_model->insert_product();
               if($insert){
                   $_SESSION['success'] = "Thêm mới sản phẩm thành công";
               }else{
                   $_SESSION['error'] = "Thêm mới sản phẩm thất bại";
               }
                header("location: index.php?controller=product");
                exit();
            }
        }
        $category_model = new CategoryModel();
        $selectAllCategory = $category_model->selectAll_category();
        $this->content = $this->render('views/products/create.php',['selectAllCategory'=>$selectAllCategory]);
        require_once "views/layout/index.php";

    }

    public function detail(){
        $this->title = "Chi tiết sản phẩm";

        if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location: index.php?controller=product");
            exit();
        }
        $id = $_GET['id'];
        $obj_product = new ProductModel();
        $select_one = $obj_product->select_one($id);

        $this->content = $this->render("views/products/detail.php",['select_one'=>$select_one]);
        require_once "views/layout/index.php";
    }

    public function delete(){

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Id không hợp lệ";
        }
        $id = $_GET['id'];
        $product_model = new ProductModel();
        $obj_delete = $product_model->delete_product($id);
        if($obj_delete){
            $_SESSION['success'] = "Xóa sản phẩm #$id thành công";
        }else{
            $_SESSION['error'] = "Xóa sản phẩm #$id thất bại";
        }
        header('location:index.php?controller=product');
        exit();

    }

    public function update(){

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "ID không hợp lệ";
        }
        $id = $_GET['id'];
        $category_model = new CategoryModel();
        $select_category_all = $category_model->selectAll_category();
        $product_model = new ProductModel();
        $select_product_one = $product_model->select_one($id);

        if(isset($_POST['save'])) {
            $category_id = (int)$_POST['select_category'];
            $name = $_POST['name_product'];
            $avatar_arr = $_FILES['avatar'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $summary = $_POST['description_short'];
            $description = $_POST['description'];
            if (isset($_POST['status'])) {
                $status = $_POST['status'];
            }
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];

            if (empty($name)) {
                $this->error = "Không được để trống tên sản phẩm";
            } else if (empty($price)) {
                $this->error = "Không được để trống giá sản phẩm";
            } else if (empty($quantity)) {
                $this->error = "Không được để trống số lượng sản phẩm";
            } else if (empty($seo_title)) {
                $this->error = "Không được để trống seo title";
            } else if (empty($seo_description)) {
                $this->error = "Không được để trống seo description";
            } else if (empty($seo_keywords)) {
                $this->error = "Không được để trống seo keywords";
            } else if ($avatar_arr['error'] == 0) {
                $extension_avt = ['jpg', 'png', 'jpeg', 'gif'];
                $extension = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
                $avt_size = round($avatar_arr['size'] / 1024 / 1024, 2);
                if (!in_array($extension, $extension_avt)) {
                    $this->error = "File tải lên phải là ảnh";
                } else if ($avt_size > 2) {
                    $this->error = "Ảnh tải lên phải có kích thước nhỏ hơn 2mb";
                }
            }
            if(empty($this->error)){
                $avatar_name = $select_product_one['avatar'];
                if($avatar_arr['error'] == 0){
                    $location_save_avt = "assets/container_file";
                    @unlink("$location_save_avt/$avatar_name");
                    if(!file_exists($location_save_avt)){
                        mkdir($location_save_avt);
                    }
                    $avatar_name .= time()."-product-".$avatar_arr['name'];
                    move_uploaded_file($avatar_arr['tmp_name'], "$location_save_avt/$avatar_name");
                }
                $product_model->category_id = $category_id;
                $product_model->name = $name;
                $product_model->avatar = $avatar_name;
                $product_model->price = $price;
                $product_model->quantity = $quantity;
                $product_model->summary = $summary;
                $product_model->description = $description;
                $product_model->status = $status;
                $product_model->seo_title = $seo_title;
                $product_model->seo_description = $seo_description;
                $product_model->seo_keywords = $seo_keywords;
                $product_model->updated_at = date("Y-h-d H:i:s");

                $update_product = $product_model->update_product($id);
                if($update_product){
                    $_SESSION['success'] = "Cập nhật sản phẩm thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật sản phẩm thất bại";
                }
                header("location: index.php?controller=product&action=index");
                exit();
            }
        }

        $this->title = "Cập nhật sản phẩm";
        $this->content = $this->render("views/products/update.php",['select_category_all'=>$select_category_all,'select_product_one'=>$select_product_one]);
        require_once "views/layout/index.php";
    }

}
?>