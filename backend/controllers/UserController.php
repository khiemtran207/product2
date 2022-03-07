<?php
    require_once "controllers/Controller.php";
    require_once "models/Usermodel.php";
    require_once "models/Pagination.php";
    class UserController extends Controller{

        public function index(){
            $user_model = new UserModel();
            $param = [
              'limit'=>5,
              'controller'=>'user',
              'action'=>'index',
              'total'=>(int) $user_model->select_count_user(),
              'full_mode'=>FALSE
            ];
            $page = 1;
            if(isset($_GET['page']) && is_numeric($_GET['page'])){
                $page = $_GET['page'];
            }
            $param['page'] = $page;
            $obj_pagination = new Pagination($param);
            $view_pagination = $obj_pagination->getPaginationPage();
            $arr_user = $user_model->select_all_pagination($param);
            $this->title = "Danh sách tài khoản";
            $this->content = $this->render("views/users/index.php",[
                'view_pagination' => $view_pagination,
                'arr_user'=>$arr_user
            ]);
            require_once 'views/layout/index.php';

        }

        public function create(){
            if(isset($_POST['submit'])){
                $obj_user = new UserModel();
                $username =  $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $job = $_POST['job'];
                $avt_arr = $_FILES['avatar'];
                $check_exist_user = $obj_user->checkUser($username);
                if (isset($_POST['status'])){
                    $status = $_POST['status'];
                }
                if(empty($username)){
                    $this->error = "Tên đăng nhập không được để trống";
                }else if(!empty($check_exist_user)){
                    $this->error = "Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác";
                }else if(strlen($password) < 6){
                    $this->error = "Mật khẩu không được nhỏ hơn 6 kí tự";
                }else if($password != $password_confirm){
                    $this->error = "Mật khẩu nhập lại không đúng";
                }else if(empty($firstname)){
                    $this->error = "Họ không được bỏ trống";
                }else if(empty($lastname)){
                    $this->error = "Tên không được bỏ trống";
                }else if($avt_arr['error'] == 0){
                    $extension = strtolower(pathinfo($avt_arr['name'],PATHINFO_EXTENSION));
                    $extension_arr = ['jpg','jpeg','png','gif'];
                    $avt_size = round($avt_arr['size']/1024/1024);
                    if(!in_array($extension,$extension_arr)){
                        $this->error = "File tải lên phải là ảnh";
                    }else if($avt_size > 2){
                        $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2mb";
                    }
                }

                if(empty($this->error)){
                    $name_avatar = "";
                    if($avt_arr['error'] == 0){
                        $location_save_avt = 'assets/container_file';
                        if(!file_exists($location_save_avt)){
                            mkdir($location_save_avt);
                        }
                        $name_avatar .= time()."-user-".$avt_arr['name'];
                        move_uploaded_file($avt_arr['tmp_name'],$location_save_avt.'/'.$name_avatar);
                    }

                    $obj_user->username = $username;
                    $obj_user->password = md5($password);
                    $obj_user->firstname = $firstname;
                    $obj_user->lastname = $lastname;
                    $obj_user->phone = $phone;
                    $obj_user->email = $email;
                    $obj_user->avatar = $name_avatar;
                    $obj_user->job = $job;
                    $obj_user->address = $address;
                    $obj_user->status = $status;
                    $create_user = $obj_user->insertUser();
                    if($create_user){
                        $_SESSION['success'] = "Thêm mới tài khoản thành công";
                        header("location:index.php?controller=user&action=index");
                        exit();
                    }else{
                        $_SESSION['error'] = "Thêm tài khoản thất bại";
                    }
                }

            }

            $this->title = "Thêm mới tài khoản";
            $this->content = $this->render("views/users/create.php");
            require_once "views/layout/index.php";
        }

        public function update(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "ID không hợp lệ";
            }
            $id = $_GET['id'];

            $userModel = new UserModel();
            $obj_select_one = $userModel->select_one($id);

            if(isset($_POST['submit'])){
                $username =  $_POST['username'];
                $check_exist_user = $userModel->checkUserUpdate($obj_select_one['username']);
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $job = $_POST['job'];
                $avt_arr = $_FILES['avatar'];
                if (isset($_POST['status'])){
                    $status = $_POST['status'];
                }
                foreach ($check_exist_user as  $value){
                    if ($username == $value['username']){
                        $this->error = "Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác";
                    }
                }

                if(empty($username)){
                    $this->error = "Tên đăng nhập không được để trống";
                }else if(empty($firstname)){
                    $this->error = "Họ không được bỏ trống";
                }else if(empty($lastname)){
                    $this->error = "Tên không được bỏ trống";
                }else if($avt_arr['error'] == 0){
                    $extension = strtolower(pathinfo($avt_arr['name'],PATHINFO_EXTENSION));
                    $extension_arr = ['jpg','jpeg','png','gif'];
                    $avt_size = round($avt_arr['size']/1024/1024);
                    if(!in_array($extension,$extension_arr)){
                        $this->error = "File tải lên phải là ảnh";
                    }else if($avt_size > 2){
                        $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2mb";
                    }
                }
                if(empty($this->error)){
                    $name_avt = $obj_select_one['avatar'];
                    if($avt_arr['error'] == 0){
                        unlink("assets/container_file/{$obj_select_one['avatar']}");
                        $name_avt .= time().'-user-'.$avt_arr['name'];
                        move_uploaded_file($avt_arr['tmp_name'],"assets/container_file/$name_avt");
                    }

                    $userModel->username = $username;
                    $userModel->firstname = $firstname;
                    $userModel->lastname = $lastname;
                    $userModel->phone = $phone;
                    $userModel->address = $address;
                    $userModel->email = $email;
                    $userModel->job = $job;
                    $userModel->status = $status;
                    $userModel->avatar = $name_avt;
                    $userModel->updated_at = date("Y-m-d H:i:s");
                    $obj_update = $userModel->update($id);
                    if($obj_update){
                        $_SESSION['success'] = "Cập nhật tài khoản thành công";
                        if($id == $_SESSION['user']['id']){
                            $_SESSION['user']['avatar'] = $name_avt;
                        }
                        header("location: index.php?controller=user");
                        exit();
                    }else{
                        $_SESSION['error'] = "Cập nhật tài khoản thất bại";
                    }
                }
            }
            $this->title = "Cập nhật tài khoản $id";
            $this->content = $this->render("views/users/update.php",['obj_select_one'=>$obj_select_one]);
            require_once 'views/layout/index.php';
        }

        public function delete(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "ID không hợp lệ";
            }
            $id = $_GET['id'];
            $userModel = new UserModel();
            $obj_delete = $userModel->delete($id);
            if($obj_delete){
                $_SESSION['success'] = "Xóa tài khoản $id thành công";
                header("location:index.php?controller=user&action=index");
                exit();
            }else{
                $_SESSION['error'] = "Xóa tài khoản $id thất bại";
            }
        }

        public function detail(){

            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "ID không hợp lệ";
            }
            $id = $_GET['id'];
            $userModel = new UserModel();
            $selecte_one = $userModel->select_one($id);

            $this->title = "Cập nhật tài khoản $id";
            $this->content = $this->render("views/users/detail.php",['selecte_one'=>$selecte_one]);
            require_once 'views/layout/index.php';
        }
    }
?>