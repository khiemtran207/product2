<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">

    <div class="search">
        <h3>Tìm kiếm:</h3>
        <form action="" method="get">
        <div class="form-group">
            <input type="hidden" name="controller" value="category">
            <input type="hidden" name="action" value="index">
            <label for="search">Nhập tên hoặc id tìm kiếm:</label>
            <input type="text" name="content_search" id="search" class="form-control"
                   value="<?php echo (isset($_GET['content_search']))? $_GET['content_search']: ""?>">
        </div>
        <div class="form-group">
            <input type="submit" name="search" value="Tìm kiếm" class="btn btn-success">
            <a href="index.php?controller=category" class="btn btn-danger">Xóa Filter</a>
        </div>
        </form>
    </div>

    <div class="form-group" style="margin-top: 20px">
        <h3 style="margin-bottom: 20px">Danh sách danh mục:</h3>
    </div>
    <div class="form-group">
        <a href="index.php?controller=category&action=create" class="btn btn-facebook">Thêm mới danh mục <i class="fas fa-plus"></i></a>
    </div>
    <div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên danh mục</th>
                    <th>Ảnh danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo danh mục</th>
                    <th>Ngày cập nhật</th>
                    <th>option</th>
                </tr>
            </thead>
        <?php if (!empty($arr_category)): ?>
        <?php foreach ($arr_category as $item):?>
            <tbody>
                <tr>
                    <th><?php echo $item['id']?></th>
                    <td style="
    width: 150px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
    padding: 0;
    margin-top: 40px;
    border: none;
    margin-left: 22px;
    white-space: normal;
"><?php echo $item['name']?></td>
                    <td>
                        <img src="assets/container_file/<?php echo $item['avatar']?>" alt="ảnh danh mục" style="width: 60px; height: 60px; border-radius: 5px">
                    </td>
                    <?php
                        if($item['status'] == 0){
                            $status = "Hiển thị";
                        }else if($item['status'] == 1){
                            $status = "Ẩn";
                        }
                    ?>
<!--                    <td id="description_style">--><?php //echo $item['description']?><!--</td>-->
<!--                    <style>-->
<!--                        #description_style{-->
<!--                            height: 3.6rem;-->
<!--                            line-height: 1.8rem;-->
<!--                            overflow: hidden;-->
<!--                            display: -webkit-box;-->
<!--                            -webkit-box-orient: vertical;-->
<!--                            -webkit-line-clamp: 2;-->
<!--                        }-->
<!--                    </style>-->
                    <td><?php echo $status?></td>
                    <td><?php echo date("d/m/Y", strtotime($item['created_at']))?></td>
                    <td><?php echo (!empty( $item['updated_at']))?date("Y/m/d",strtotime($item['updated_at'])):''?></td>
                    <td>
                        <a href="index.php?controller=category&action=detail&id=<?php echo $item['id']?>">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="index.php?controller=category&action=update&id=<?php echo $item['id']?>">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này')"
                           href="index.php?controller=category&action=delete&id=<?php echo $item['id']?>">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center"><?php echo "Không có danh mục nào trong danh sách!"?></td>
            </tr>
        <?php endif; ?>
            <tr>
                <td colspan="7" style=" text-align: center   ">
                    <?php
                        echo $view_pagination;
                    ?>
                </td>
            </tr>
    </table>
    </div>
</div>