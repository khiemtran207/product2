
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="form-group">
    <a href="index.php?controller=user" class="btn btn-facebook">Danh sách tài khoản</a>
</div>
<div class="form-group">
    <h4>Thêm mới tài khoản:</h4>
</div>
<div class="from-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" class="form-control" name="username" value="<?php echo (isset($_POST['username']))?$_POST['username']:"";?>">
        </div>

        <div class="from-group">
            <label for="password">Mật khẩu:</label>
            <input type="text" placeholder="Mật khẩu phải lớn hơn 5 kí tự" name="password" class="form-control" id="password" value="<?php echo (isset($_POST['password']))?$_POST['password']:"";?>">
        </div>
        <br>
        <div class="from-group">
            <label for="password_confirm">Nhập lại mật khẩu:</label>
            <input type="text" name="password_confirm" class="form-control" id="password_confirm" value="<?php echo (isset($_POST['password_confirm']))?$_POST['password_confirm']:"";?>">
        </div>
        
        <div class="form-group">
            <label for="firstname">Họ:</label>
            <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo (isset($_POST['firstname']))?$_POST['firstname']:"";?>">
        </div>
        
        <div class="form-group">
            <label for="lastname">Tên:</label>
            <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo (isset($_POST['lastname']))?$_POST['lastname']:"";?>">
        </div>
        
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="number" name="phone" class="form-control" id="phone" value="<?php echo (isset($_POST['phone']))?$_POST['phone']:"";?>">
        </div>
        
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" class="form-control" id="address" value="<?php echo (isset($_POST['address']))?$_POST['address']:"";?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo (isset($_POST['email']))?$_POST['email']:"";?>">
        </div>

        <div class="form-group">
            <label for="avatar">Ảnh đại diện:</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
        </div>

        <div class="form-group">
            <label for="job">Chức vụ:</label>
            <input type="text" name="job" class="form-control"  id="job" value="<?php echo (isset($_POST['job']))?$_POST['job']:"";?>">
        </div>

        <div class="form-group">
            <?php
                $hide = "";
                $active = "";
                if (isset($_POST['status'])){
                    if($_POST['status'] == 0){
                        $active = "selected";
                    }else if($_POST['status'] == 1){
                        $hide = "selected";
                    }
                }
            ?>
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control">
                <option <?php echo $active?> value="0">Hiển thị</option>
                <option <?php echo $hide?> value="1">Ẩn</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <input type="reset" class="btn btn-warning" value="Reset">
        </div>
    </form>
</div>
