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
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="action" value="index">
                <label for="search">Nhập tên tài khoản hoặc id tìm kiếm:</label>
                <input type="text" name="content_search" id="search" class="form-control"
                       value="<?php echo (isset($_GET['content_search']))? $_GET['content_search']: ""?>">
            </div>
            <div class="form-group">
                <input type="submit" name="search" value="Tìm kiếm" class="btn btn-success">
                <a href="index.php?controller=user" class="btn btn-danger">Xóa Filter</a>
            </div>
        </form>
    </div>

    <div class="form-group" style="margin-top: 20px">
        <h3 style="margin-bottom: 20px">Danh sách tài khoản:</h3>
    </div>
    <div class="form-group">
        <a href="index.php?controller=user&action=create" class="btn btn-facebook">Thêm mới tài khoản <i class="fas fa-plus"></i></a>
    </div>
    <div class="form-group">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên tài khoản</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Avatar</th>
                <th></th>
            </tr>
            </thead>
            <?php if (!empty($arr_user)): ?>
                <?php foreach ($arr_user as $item):?>
                    <tbody>
                    <tr>
                        <th><?php echo $item['id']?></th>
                        <td><?php echo $item['username']?></td>
                        <td><?php echo $item['firstname'].' '.$item['lastname']?></td>
                        <td><?php echo $item['phone']?></td>
                        <td><?php echo $item['address']?></td>
                        <td>
                            <img src="assets/container_file/<?php echo $item['avatar']?>" alt="ảnh tài khoản" style="width: 60px; height: 60px; border-radius: 5px">
                        </td>
                        <td>
                            <a class="btn-option" href="index.php?controller=user&action=detail&id=<?php echo $item['id']?>">
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="btn-option" href="index.php?controller=user&action=update&id=<?php echo $item['id']?>">
                                <i class="fas fa-wrench"></i>
                            </a>
                            <a class="btn-option" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này')"
                               href="index.php?controller=user&action=delete&id=<?php echo $item['id']?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                <?php endforeach;?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center"><?php echo "Không có tài khoản nào trong danh sách!"?></td>
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
<style>
    .btn-option:hover{
        text-decoration: none;
    }
</style>