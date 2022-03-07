<style>
    .form-group {
        margin: 20px 0;
    }
</style>

<div class="search">
    <h3>Tìm kiếm:</h3>
    <form action="" method="get">
        <div class="form-group">
            <input type="hidden" name="controller" value="product">
            <input type="hidden" name="action" value="index">
            <label for="search">Nhập tên hoặc id tìm kiếm:</label>
            <input type="text" name="content_search" id="search" class="form-control"
                   value="<?php echo (isset($_GET['content_search']))? $_GET['content_search']: ""?>">
        </div>

        <div class="form-group">
            <label for="select_category">Chọn danh mục</label>
            <select name="category_id" id="" class="form-control">
                <option value="">----</option>
                <?php foreach ($select_category_all as $category):
                    $selected = '';
                    if (isset($_GET['category_id']) && $category['id'] == $_GET['category_id']) {
                        $selected = 'selected';
                    }
                ?>
                    <option value="<?php echo $category['id']?>" <?php echo $selected; ?>><?php echo $category['name']?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="search" value="Tìm kiếm" class="btn btn-success">
            <a href="index.php?controller=product" class="btn btn-danger">Xóa Filter</a>
        </div>
    </form>
</div>

<div class="form-group">
    <a href="index.php?controller=product&action=create" class="btn btn-facebook">Thêm mới sản phẩm</a>
</div>
<div class="form-group">
    <h3>Danh sách sản phẩm:</h3>
</div>

<div class="form-group">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Danh mục</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($select_product_pagination)): ?>
            <?php foreach ($select_product_pagination as $product): ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <td style="display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    width: 140px;
    overflow: hidden;
    white-space: unset;
    height: 60px;
    line-height: 23px;
   " ><?php echo $product['category_name']?></td>
                <td ><?php echo $product['name']?></td>
                <td>
                    <img src="assets/container_file/<?php echo $product['avatar']?>" alt="">
                </td>
                <td><?php echo number_format($product['price'],'0','0','.')."đ";?></td>
                <td><?php echo $product['quantity']?></td>
                <?php
                    if($product['status'] == 1){
                        $status = "Hiển thị";
                    }else if($product['status'] == 2){
                        $status = "Ẩn";
                    }
                ?>
                <td><?php echo $status;?></td>
                <td>
                    <a style="text-decoration: none" href="index.php?controller=product&action=detail&id=<?php echo $product['id']?>">
                        <i class="far fa-eye"></i>
                    </a>
                    <a style="text-decoration: none" href="index.php?controller=product&action=update&id=<?php echo $product['id']?>">
                        <i class="fas fa-wrench"></i>
                    </a>
                    <a style="text-decoration: none" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này')"
                       href="index.php?controller=product&action=delete&id=<?php echo $product['id']?>">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center"><?php echo "Không có sản phẩm nào trong danh sách!"?></td>
            </tr>
        <?php endif; ?>
            <tr>
                <td colspan="8" style=" text-align: center   ">
                    <?php
                        echo $view_pagination;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>