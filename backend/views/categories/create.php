
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="form-group">
    <a href="index.php?controller=category" class="btn btn-facebook">Danh sách danh mục</a>
</div>
<div class="form-group">
    <h4>Thêm mới danh mục:</h4>
</div>
<div class="from-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_POST['name'])? $_POST['name']: ''?>">
        </div>

        <div class="form-group">
            <label for="avatar_category">Ảnh đại diện:</label><br>
            <input type="file" name="avatar" class="form-control" id="category-avatar"/>
            <img src="" alt="">
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label><br>
            <textarea name="description" class="description form-control" id="description" cols="3" rows="5"><?php echo isset($_POST['description'])? $_POST['description']: ''?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control " name="status" id="status">
                <option value="0">Active</option>
                <option value="1">Disable</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <input type="reset" class="btn btn-warning" value="Reset">
        </div>
    </form>
</div>
