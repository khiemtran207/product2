<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <div class="form-group" style="margin-top: 20px">
        <h3 style="margin-bottom: 20px">Thông tin tài khoản #<?php echo $selecte_one['id']?></h3>
    </div>
    <div class="form-group">
        <table class="table col-8" >
            <thead>
            <tr>
                <th>id</th>
                <th><?php echo $selecte_one['id']?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Tên tài khoản:</th>
                <td><?php echo $selecte_one['username']?></td>
            </tr>
<!--            <tr>-->
<!--                <th>Mật khẩu:</th>-->
<!--                <td>--><?php //echo $selecte_one['password']?><!--</td>-->
<!--            </tr>-->
            <tr>
                <th>Họ:</th>
                <td><?php echo $selecte_one['firstname']?></td>
            </tr>
            <tr>
                <th>Tên:</th>
                <td><?php echo $selecte_one['lastname']?></td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td><?php echo $selecte_one['phone']?></td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td><?php echo $selecte_one['address']?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $selecte_one['email']?></td>
            </tr>
            <tr>
                <th>Ảnh đại diện</th>
                <td>
                    <img src="assets/container_file/<?php echo $selecte_one['avatar']?>" alt="" style="width: 60px; height: 60px; border-radius: 5px">
                </td>
            </tr>
            <tr>
                <th>Chức vụ:</th>
                <td><?php echo $selecte_one['job']?></td>
            </tr>
            <tr>
                <th>Trạng thái</th>
                <td>
                    <?php
                    if($selecte_one['status']==0){
                        echo "Hiển thị";
                    }else{
                        echo "Ẩn";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Đăng nhập gần nhất:</th>
                <td><?php echo $selecte_one['lastlogin']?></td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td><?php echo $selecte_one['created_at']?></td>
            </tr>
            <tr>
                <th>Ngày cập nhật</th>
                <td><?php echo $selecte_one['updated_at']?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div>
        <a href="index.php?controller=user&action=index" class="btn btn-success"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
    </div>
</div>