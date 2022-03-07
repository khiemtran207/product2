<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <div class="form-group" style="margin-top: 20px">
        <h3 style="margin-bottom: 20px">Thông tin danh mục #<?php echo $detail['id']?></h3>
    </div>
    <div class="form-group">
        <table class="table col-8" >
            <thead>
                <tr>
                    <th>id</th>
                    <th><?php echo $detail['id']?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Tên danh mục</th>
                    <td><?php echo $detail['name']?></td>
                </tr>
                <tr>
                    <th>Ảnh đại diện</th>
                    <td>
                        <img src="assets/container_file/<?php echo $detail['avatar']?>" alt="" style="width: 60px; height: 60px; border-radius: 5px">
                    </td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td><?php echo $detail['description']?></td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>
                        <?php
                        if($detail['status']==0){
                            echo "Hiển thị";
                        }else{
                            echo "Ẩn";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Ngày tạo</th>
                    <td><?php echo $detail['created_at']?></td>
                </tr>
                <tr>
                    <th>Ngày cập nhật</th>
                    <td><?php echo $detail['updated_at']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div>
        <a href="index.php?controller=category&action=index" class="btn btn-success"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
    </div>
</div>