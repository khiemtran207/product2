<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 10/27/2021
 * Time: 10:01 PM
 */
class Controller {
    protected $content;
    protected $error;
    protected $title;

    public function __construct()
    {
        if(!isset($_SESSION['user'])){
            $_SESSION['error'] = "Bạn cần phải đăng nhập!";
            header("location:index.php?controller=login&action=login");
            exit();
        }
    }

    public function render($file,$variables = []){
        extract($variables);
        ob_start();
        require_once $file;
        $render_view = ob_get_clean();
        return $render_view;
    }
}