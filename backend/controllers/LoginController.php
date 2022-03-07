<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 11/25/2021
 * Time: 10:59 AM
 */
require_once "models/UserModel.php";
class LoginController{
    protected $content;
    protected $error;
    protected $title;
    public function render($file,$variables = []){
        extract($variables);
        ob_start();
        require_once $file;
        $render_view = ob_get_clean();
        return $render_view;
    }

    public function register(){
        if(isset($_POST['register'])){
            $obj_users = new UserModel();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $check_exist_username = $obj_users->checkUser($username);

            if(strlen($password) < 6){
                $this->error = "Mật khẩu phải lớn hơn 6 kí tự";
            }else if($password != $password_confirm){
                $this->error = "Mật khẩu nhập lại không đúng!";
            }else if(!empty($check_exist_username)){
                $this->error = "Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác";
            }
            if(empty($this->error)){
                $obj_users->username = $username;
                $obj_users->password = md5($password);
                $insert = $obj_users->insertUser();
                if($insert){
                    $_SESSION['success'] = "Đăng kí tài khoản thành công";
                }else{
                    $_SESSION['error'] = "Đăng kí tài khoản thất bại";
                }
                header('location:index.php?controller=login&action=login');
                exit();
            }
        }

        $this->title = "Đăng kí tài khoản";
        $this->content = $this->render("views/users/register.php");
        require_once "views/layout_login/index.php";
    }

    public function login(){
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $obj_user = new UserModel();
            $user = $obj_user->checkLogin($username, $password);

            if(strlen($password) < 6){
                $this->error = "Mật khẩu phải nhiều hơn 6 kí tự";
            }else if(empty($user)){
                $this->error = "Sai tên đăng nhập hoặc mật khẩu";
            }

            if(empty($this->error)){
                $_SESSION['success'] = "Đăng nhập thành công";
                $_SESSION['user'] = $user;
                $id=$user['id'];
                $obj_user->lastlogin = date("Y-m-d H:i:s");
                $obj_user->lastlogin($id);
                header("location:index.php?controller=product");
                exit();
            }
        }

        $this->title = "Đăng nhập hệ thống";
        $this->content = $this->render("views/users/login.php");
        require_once "views/layout_login/index.php";
    }

    public function logout(){
        $_SESSION['success'] = "Đăng xuất tài khoản thành công";
        unset($_SESSION['user']);
        header("location:index.php?controller=login&action=login");
        exit();
    }

    public function changPassword(){
        $obj_user = new UserModel();
        $obj_select = $obj_user->select_one($_SESSION['user']['id']);
        if(isset($_POST['save'])){
            $password_current = $_POST['password_current'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if(strlen($password) < 6){
                $this->error = "Mật khẩu phải từ 6 kí tự";
            }else if($obj_select['password'] != md5($password_current)){
                $this->error = "Mật khẩu cũ không chính xác";
            }else if($password != $password_confirm){
                $this->error = "Mật khẩu nhập lại không đúng!";
            }

            if (empty($this->error)){
                $obj_user->password = md5($password);
                $id = $_SESSION['user']['id'];
                $obj_change_password = $obj_user->changePassword($id);
                if($obj_change_password){
                    $_SESSION['success'] = "Thay đổi mật khẩu thành công";
                    $_SESSION['user']['password'] = $password;
                    header("location:index.php?controller=user");
                    exit();
                }else{
                    $_SESSION['error'] = "Thay đổi mật khẩu thất bại";
                }
            }

        }
        $this->title = "Đổi mật khẩu";
        $this->content = $this->render("views/users/change_password.php",['obj_select'=>$obj_select]);
        require_once "views/layout_login/index.php";
    }
}