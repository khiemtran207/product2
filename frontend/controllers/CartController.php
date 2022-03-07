<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/25/2022
 * Time: 2:19 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/ProductModel.php';
class CartController extends Controller{
    public function add(){
       $product_id = $_GET['product_id'];
       $obj_products = new ProductModel();
       $getProductById = $obj_products->getProductById($product_id);
       $product_cart = [
         'name' => $getProductById['name'],
         'price' => $getProductById['price'],
           'avatar'=>$getProductById['avatar'],
           'quantity' => 1
       ];
       if(!isset($_SESSION['cart'])){
           $_SESSION['cart'][$product_id] = $product_cart;
       }else {
           if(array_key_exists($product_id,$_SESSION['cart'])){
                $_SESSION['cart'][$product_id]['quantity']++;
           }else{
               $_SESSION['cart'][$product_id] = $product_cart;
           }
       }
    }
    public function  index(){

        foreach ($_POST AS $product_id => $quantity) {
            if ($quantity < 0) {
                header('Location: index.php?controller=cart&action=cart.html');
                exit();
            }
            foreach ($_SESSION['cart']
                     AS $product_id => $cart){
                // Update lại số lượng tương ứng
                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
        }
        $this->page_title = "Giỏ hàng của bạn";
        $this->content = $this->render('views/cart/index.php');
        require_once 'views/layout/index.php';
    }

    public function delete(){
        $product_id = $_GET['product_id'];
        unset($_SESSION['cart'][$product_id]);
        header('Location: index.php?controller=cart&action=index');
        exit();
    }

    public function cancel(){
        unset($_SESSION['cart']);
        header('Location: index.php?controller=product&action=index');
        exit();
    }
}