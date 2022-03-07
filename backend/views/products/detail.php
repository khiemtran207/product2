<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="form-group">
    <h3>Chi tiết sản phẩm #<?php echo $select_one['id']?></h3>
</div>
<div class="form-group">
    <table style="width: 50%" class="table">
        <thead>
            <tr>
                <th>id</th>
                <th><?php echo $select_one['id']?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tên danh mục</td>
                <td><?php echo $select_one['category_name']?> </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><?php echo $select_one['name']?> </td>
            </tr>
            <tr>
                <td>Ảnh đại diện</td>
                <td><img src="assets/container_file/<?php echo $select_one['avatar']?>" alt=""></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><?php echo number_format($select_one['price'],'0','0','.');?> vnđ</td>
            </tr>
            <tr>
                <td>Số lượng sản phẩm</td>
                <td><?php echo $select_one['quantity']?> </td>
            </tr>
            <tr>
                <td>Mô tả ngắn về sản phẩm</td>
                <td><?php echo $select_one['summary']?> </td>
            </tr>
            <tr>
                <td>Mô tả chi tiết về sản phẩm</td>
                    <td><?php echo $select_one['description']?> </td>
            </tr>
            <tr>
                <td>Seo title</td>
                <td><?php echo $select_one['seo_title']?> </td>
            </tr>
            <tr>
                <td>Seo description</td>
                <td><?php echo $select_one['seo_description']?> </td>
            </tr>
            <tr>
                <td>Seo keywords</td>
                <td><?php echo $select_one['seo_keywords']?> </td>
            </tr>
            <?php
                if($select_one['status'] == 1){
                    $status = "Hiển thị";
                }elseif($select_one['status'] == 2){
                    $status = "Ẩn";
                }
            ?>
            <tr>
                <td>Trạng thái</td>
                <td><?php echo $status?> </td>
            </tr>
            <tr>
                <td>Ngày tạo</td>
                <td><?php echo $select_one['created_at']?> </td>
            </tr>
            <tr>
                <td>Ngày cập nhật</td>
                <td><?php echo $select_one['updated_at']?> </td>
            </tr>
            <tr>
                <td><a href="index.php?controller=product&action=index" class="btn btn-success">Back</a></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>