<style>
    .form-group {
        margin: 20px 0;
    }
</style>

<div class="form-group">
    <h3>Thêm mới sản phẩm:</h3>
</div>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="select_category">Chọn danh mục:</label>
        <select name="select_category" id="select_category" class="form-control">
            <?php foreach ($selectAllCategory as $category):?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name']?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="name_product">Nhập tên sản phẩm:</label>
        <input type="text" name="name_product" id="name_product" class="form-control">
    </div>

    <div class="form-group">
        <label for="avatar">Chọn ảnh đại diện:</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="price">Giá sản phẩm:</label>
        <input type="number" name="price" id="price" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="quantity">Số lượng sản phẩm:</label>
        <input type="number" name="quantity" id="quantity" class="form-control">
    </div>

    <div class="form-group">
        <label for="description_short">Mô tả ngắn về sản phẩm:</label>
        <textarea name="description_short" id="description_short" rows="6" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="description">Mô tả chi tiết:</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div class="form-group">
        <label for="seo_title">Seo title:</label>
        <input type="text" name="seo_title" id="seo_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="seo_description">Seo description:</label>
        <input type="text" name="seo_description" id="seo_description" class="form-control">
    </div>

    <div class="form-group">
        <label for="seo_keywords">Seo keywords:</label>
        <input type="text" name="seo_keywords" id="seo_keywords" class="form-control">
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" id="status" class="form-control">
            <option value="1">Hiển thị</option>
            <option value="2">Ẩn</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary">
        <a href="index.php?controller=product&action=index" class="btn btn-warning">Cancel</a>
    </div>

</form>