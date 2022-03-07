
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="form-group">
    <a href="index.php?controller=user" class="btn btn-facebook">Danh sách tài khoản</a>
</div>
<div class="form-group">
    <h4>Cập nhật tài khoản: #<?php echo $obj_select_one['id']?></h4>
</div>
<div class="from-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" class="form-control" name="username" value="<?php echo $obj_select_one['username'];?>">
        </div>


        <div class="form-group">
            <label for="firstname">Họ:</label>
            <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $obj_select_one['firstname'];?>">
        </div>

        <div class="form-group">
            <label for="lastname">Tên:</label>
            <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $obj_select_one['lastname'];?>">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="number" name="phone" class="form-control" id="phone" value="<?php echo $obj_select_one['phone'];?>">
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" class="form-control" id="address" value="<?php echo $obj_select_one['address'];?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $obj_select_one['email'];?>">
        </div>

        <div class="form-group">
            <label for="avatar">Ảnh đại diện:</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
            <br>
            <img src="assets/container_file/<?php echo $obj_select_one['avatar'];?>" alt="" style="width: 90px" height="90px">
        </div>

        <div class="form-group">
            <label for="job">Chức vụ:</label>
            <input type="text" name="job" class="form-control"  id="job" value="<?php echo $obj_select_one['job'];?>">
        </div>

        <div class="form-group">
            <?php
            $hide = "";
            $active = "";
            if (isset($obj_select_one['status'])){
                if($obj_select_one['status'] == 0){
                    $active = "selected";
                }else if($obj_select_one['status'] == 1){
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
