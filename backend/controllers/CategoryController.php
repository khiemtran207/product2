<?php
require_once 'controllers/Controller.php';
require_once 'models/CategoryModel.php';
require_once 'models/Pagination.php';
require_once 'models/ProductModel.php';
class CategoryController extends Controller {

    public function index(){

        $obj_category = new CategoryModel();
        $param = [
            'limit'=>5,
            'total'=>count($obj_category->selectAll_category()),
            'controller'=>"category",
            'action'=>'index',
            'full_mode'=>False
        ];
        $page = 1;
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
        $param['page'] = $page;
        $obj_pagination = new Pagination($param);
        $view_pagination = $obj_pagination->getPaginationPage();
        $arr_category = $obj_category->select_Pagination($param);

        $this->content = $this->render('views/categories/index.php',['arr_category'=>$arr_category, 'view_pagination'=>$view_pagination]);
        $this->title = "Danh sách danh mục";
        require_once "views/layout/index.php";

    }

    public function create(){

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $avt_file = $_FILES['avatar'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            if(empty($name)){

                $this -> error = "Không được để trống tên danh mục!";

            }else if($avt_file['error'] == 0){

                $extension_arr = ['jpg','jpeg','png','gif'];
                $extension = strtolower(pathinfo($avt_file['name'],PATHINFO_EXTENSION));
                $size_avt = $avt_file['size']/(1024 * 1024);
                $size_avt = round($size_avt,2);
                if(!in_array($extension,$extension_arr)){
                    $this->error = "File tải lên phải là ảnh!";
                }else if($size_avt > 2){
                    $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2mb!";
                }

            }
            $name_avt = "";
            if(empty($this->error)){

                if($avt_file['error']==0) {
                    $location_save_avt = "assets/container_file";
                    if (!file_exists($location_save_avt)) {
                        mkdir($location_save_avt);
                    }
                    $name_avt .= time() . '-category-' . $avt_file['name'];
                    move_uploaded_file($avt_file['tmp_name'], $location_save_avt . '/' . $name_avt);
                }

                // lưu vào csdl
                $category_model = new CategoryModel();
                $category_model->name = $name;
                $category_model->avt = $name_avt;
                $category_model->description = $description;
                $category_model->status = $status;
                $insert = $category_model->create_category();
                if($insert){
                    $_SESSION['success'] = "Thêm mới category thành công!";
                }else{
                    $_SESSION['error'] = "Thêm mới category thất bại!";
                }

                header('location:index.php?controller=category&action=index');
                exit();
            }
        }

        $this->content = $this->render('views/categories/create.php');
        $this->title = "Thêm mới danh mục";
        require_once "views/layout/index.php";
    }

    public function update(){

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location: index.php?controller=category&action=index");
            exit();
        }
        $id = $_GET['id'];

        $category_model = new CategoryModel();
        $select_one = $category_model->selectOne_category($id);

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $avt_file = $_FILES['avatar'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            if (empty($name)) {

                $this->error = "Không được để trống tên danh mục!";

            } else if ($avt_file['error'] == 0) {
                $extension_arr = ['jpg', 'jpeg', 'png', 'gif'];
                $extension = strtolower(pathinfo($avt_file['name'],PATHINFO_EXTENSION));
                $size_avt = $avt_file['size'] / (1024 * 1024);
                $size_avt = round($size_avt, 2);
                if (!in_array($extension, $extension_arr)) {
                    $this->error = "File tải lên phải là ảnh!";
                } else if ($size_avt > 2) {
                    $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2mb!";
                }

            }
            if(empty($this->error)){
                $name_avt = $select_one['avatar'];
                if($avt_file['error'] == 0){
                    // xóa ảnh cũ và lưu ảnh mới
                    $location_save_avt = 'assets/container_file';
                    unlink($location_save_avt."/".$select_one['avatar']);
                    if(!file_exists($location_save_avt)){
                        mkdir($location_save_avt);
                    }
                    $name_avt .= time()."-category-".$avt_file['name'];
                    move_uploaded_file($avt_file['tmp_name'],$location_save_avt.'/'.$name_avt);
                }

                $category_model->name = $name;
                $category_model->avt = $name_avt;
                $category_model->description = $description;
                $category_model->status = $status;
                $category_model->updated_at = date('Y-m-d H:i:s');

                $category_model->update_category($id);

                if ($category_model){
                    $_SESSION['success'] = "Cập nhật danh mục #{$select_one['id']} thành công";
                    header('location: index.php?controller=category');
                    exit();
                }else{
                    $_SESSION['error'] = "Cập nhật danh mục #{$select_one['id']} thất bại";
                 }
            }
        }

        $this->content = $this->render('views/categories/update.php',['select_one'=>$select_one]);
        require_once "views/layout/index.php";

    }

    public function delete(){

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id Không hợp lệ";
            header("location: index.php?controller=category");
            exit();
        }
        $id = $_GET['id'];
        $location_save_avt = 'assets/container_file';

        $productModel = new ProductModel();
        $delete_product_category = $productModel->delete_products_category($id);

        $categoryModel = new CategoryModel();
        $select_one = $categoryModel->selectOne_category($id);

        $delete =  $categoryModel->delete_category($id);
        if($delete){
            unlink($location_save_avt."/".$select_one['avatar']);
            $_SESSION['success'] = "Xóa danh mục $id thành công";
        }else{
            $_SESSION['error'] = "Xóa danh mục $id thất bại";
        }
        header("location: index.php?controller=category&action=index");
        exit();

    }

    public function detail(){

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id Không hợp lệ";
            header("location: index.php?controller=category");
            exit();
        }
        $id = $_GET['id'];
        $categoryModel = new CategoryModel();
        $detail = $categoryModel->selectOne_category($id);
        $this->title = "Chi tiết danh mục $id";
        $this->content = $this->render('views/categories/detail.php',['detail'=>$detail]);
        require_once "views/layout/index.php";

    }

}