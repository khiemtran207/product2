<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="form-group">
    <h4>Cập nhật danh mục #<?php echo $select_one['id']?></h4>
</div>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $select_one['name']?>">
        </div>

        <div class="form-group">
            <label for="category-avatar">Ảnh đại diện:</label><br>
            <input type="file" name="avatar" class="form-control" id="category-avatar"/>
            <img src="assets/container_file/<?php echo $select_one['avatar']?>" style="width: 60px; height: 60px; border-radius: 5px" alt="">
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label><br>
            <textarea name="description" class="description form-control" id="description" cols="3" rows="5"><?php echo $select_one['name']?></textarea>
        </div>
        <?php
            $active='';
            $disable='';
            if($select_one['status'] == 0){
                $active = "selected";
            }else{
                $disable = "selected";
            }
        ?>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" name="status" id="status">
                <option value="0" <?php echo $active ?> >Active</option>
                <option value="1" <?php echo $disable ?> >Disable</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <a href="index.php?controller=category&action=index" class="btn btn-success"></i> Cancel</a>
        </div>

    </form>
</div>