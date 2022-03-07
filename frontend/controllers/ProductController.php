<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/25/2022
 * Time: 12:42 AM
 */
require_once 'controllers/Controller.php';
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';
require_once 'models/Pagination.php';
class ProductController extends Controller{
    public function index(){
        $this->page_title = "Sản phẩm";
        $obj_product = new ProductModel();
        $params = [
            'total'=>$obj_product->countProduct(),
            'limit'=>12,
            'controller'=>'product',
            'action'=>'index',
            'full_mode'=>true,
            'page'=>(isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1
        ];
        $obj_categories = new CategoryModel();
        $list_categories = $obj_categories->getAllCategory();
        if(isset($_POST['filter'])){
            if(isset($_POST['categories'])){
                $categories = implode(',',$_POST['categories']);
                $categories = "($categories)";
                $params['categories'] = $categories;
            }
            if (isset($_POST['price'])) {
                $str_price = '';
                foreach ($_POST['price'] AS $price) {
                    if ($price == 0) {
                        $str_price .= " OR products.price < 1000000";
                    }
                    if ($price == 1) {
                        $str_price .= " OR (products.price >= 1000000 AND products.price < 20000000)";
                    }
                    if ($price == 2) {
                        $str_price .= " OR (products.price >= 2000000 AND products.price < 30000000)";
                    }
                    if ($price == 3) {
                        $str_price .= " OR (products.price >= 3000000 AND products.price < 40000000)";
                    }
                    if ($price == 4){
                        $str_price .= " OR products.price > 4000000";
                    }
                }
                //cắt bỏ từ khóa OR ở vị trí ban đầu
                $str_price = substr($str_price, 3);
                $str_price = "($str_price)";
                $params['price'] = $str_price;
            }
        }
        $list_product = $obj_product->getProductInHomePage($params);
        $obj_pagination = new Pagination($params);
        $pagination = $obj_pagination->getPaginationPage();
        $this->content = $this->render('views/products/index.php',['list_product'=>$list_product,'list_categories'=>$list_categories,'pagination'=>$pagination]);
        require_once 'views/layout/index.php';
    }
}