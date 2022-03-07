<style>
    .form-group {
        margin: 20px 0;
    }
</style>

<div class="form-group">
    <h3>Cập nhật sản phẩm:</h3>
</div>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="select_category">Chọn danh mục:</label>
        <select name="select_category" id="select_category" class="form-control">
            <?php foreach ($select_category_all as $category):?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name']?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="name_product">Nhập tên sản phẩm:</label>
        <input type="text" name="name_product" value="<?php echo $select_product_one['name'] ?>" id="name_product" class="form-control">
    </div>

    <div class="form-group">
        <label for="avatar">Chọn ảnh đại diện:</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
        <img src="assets/container_file/<?php echo $select_product_one['avatar'] ?>" style="width: 60px; height: 60px;" alt="">
    </div>

    <div class="form-group">
        <label for="price">Giá sản phẩm:</label>
        <input type="number" value="<?php echo $select_product_one['price'] ?>" name="price" id="price" class="form-control">
    </div>

    <div class="form-group">
        <label for="quantity">Số lượng sản phẩm:</label>
        <input type="number" value="<?php echo $select_product_one['quantity'] ?>" name="quantity" id="quantity" class="form-control">
    </div>

    <div class="form-group">
        <label for="description_short">Mô tả ngắn về sản phẩm:</label>
        <textarea name="description_short"  id="description_short" rows="6" class="form-control"><?php echo $select_product_one['summary'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="description">Mô tả chi tiết:</label>
        <textarea name="description" value="" id="description"><?php echo $select_product_one['description'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="seo_title">Seo title:</label>
        <input type="text" value="<?php echo $select_product_one['seo_title'] ?>" name="seo_title" id="seo_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="seo_description">Seo description:</label>
        <input type="text" value="<?php echo $select_product_one['seo_description'] ?>" name="seo_description" id="seo_description" class="form-control">
    </div>

    <div class="form-group">
        <label for="seo_keywords">Seo keywords:</label>
        <input type="text" value="<?php echo $select_product_one['seo_keywords'] ?>" name="seo_keywords" id="seo_keywords" class="form-control">
    </div>

    <?php
        $status_show = '';
        $status_hide = '';
        if($select_product_one['status'] == 1){
            $status_show = "selected";
        }else if($select_product_one['status'] == 2){
            $status_hide = "selected";
        }
    ?>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" id="status" class="form-control">
            <option value="1" <?php echo $status_show?>>Hiển thị</option>
            <option value="2" <?php echo $status_hide?>>Ẩn</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="save" value="Save" class="btn btn-primary">
        <a href="index.php?controller=product&action=index" class="btn btn-warning">Cancel</a>
    </div>

</form>