<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/22/2022
 * Time: 8:57 AM
 */
require_once 'controllers/Controller.php';
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';

class HomeController extends Controller{

    public function index(){
        $params = [
            'page'=> 1,
            'limit'=>12
        ];
        $this->page_title = "Trang chủ";
        $obj_product = new ProductModel();
        $list_products = $obj_product->getProductInHomePage($params);
//        var_dump($list_products);
        $obj_category = new CategoryModel();
        $list_categories = $obj_category->getCategoryInHomePage();
        $this->content = $this->render('views/home/index.php',['list_products'=>$list_products, 'list_categories'=>$list_categories]);
        require_once 'views/layout/index.php';
    }

}