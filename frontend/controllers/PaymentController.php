<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/27/2022
 * Time: 2:32 PM
 */
require_once "controllers/Controller.php";
require_once "models/OrderModel.php";
require_once "models/OrderDetail.php";
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';
class PaymentController extends Controller{
    public function index(){
        if (isset($_POST['submit'])){
            $fullname  = $_POST['your_name'];
            $email = $_POST['your_email'];
            $number_phone = $_POST['your_mobile'];
            $address = $_POST['your_address'];
            $note = $_POST['note'];
            $payment_method = $_POST['payment_method'];

            if(empty($fullname)){
                $this->error = "Không được để trống họ tên";
            }else if(empty($number_phone)){
                $this->error = "Không được để trống số điện thoại";
            }

            if(empty($this->error)){
                $obj_order = new OrderModel();
                $obj_order->fullname = $fullname;
                $obj_order->email = $email;
                $obj_order->mobile = $number_phone;
                $obj_order->address = $address;
                $obj_order->note = $note;

                $total_price = 0;
                foreach ($_SESSION['cart'] as $cart){
                    $total_price += $cart['price']*$cart['quantity'];
                }
                $obj_order->price_total = $total_price;
                $obj_order->payment_status = 0;
                $order_id = $obj_order->insert();
                $obj_order_detail = new OrderDetail();
                foreach ($_SESSION['cart'] as $cart){
                    $obj_order_detail->order_id =$order_id;
                    $obj_order_detail->product_name = $cart['name'];
                    $obj_order_detail->product_price = $cart['price'];
                    $obj_order_detail->quantity = $cart['quantity'];
                    $is_insert = $obj_order_detail->insert();
                }
                if($payment_method == 0){
                    $_SESSION['payment_info'] = [
                        'price_total' => $total_price,
                        'fullname'=>$fullname,
                        'email'=>$email,
                        'mobile'=>$number_phone
                    ];
                    header('location: index.php?controller=payment&action=online');
                    exit();
                }else{
                    header('location: index.php?controller=payment&action=thanks');
                    exit();
                }
            }
        }
        $this->content = $this->render('views/payment/index.php');
        require_once "views/layout/index.php";
    }

    public function online(){
        $this->content = $this->render('libraries/nganluong/index.php');
        // Không gọi layout vì dao giện của trang thanh toán là của bên thứ 3
        return $this->content;
    }

    public function thanks(){
        unset($_SESSION['payment_info']);
        unset($_SESSION['cart']);
        $this->content = $this->render('views/payment/thanks.php');
        require_once "views/layout/index.php";
    }
}