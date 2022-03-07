<section id="layout-content">
    <div class="fixed-container mb-5"><img class="banner" src="https://hoaquafuji.com/themes/hoaquafuji/assets/img/banner-hoa-qua-sach-fuji.jpg" alt="Hoa quả sạch Fuji"></div>
    <div class="container" id="list-product-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Best-seller (Sản phẩm bán chạy)</li>
            </ol>
        </nav>
        <h1 class="title-page text-center text-primary">Danh sách sản phẩm</h1>
        <div class="description text-justify mb-5">

        </div>
        <div class="row mb-5">
            <div class="col-md-3 md-3">
                <h4 class="title-page text-primary">Lọc sản phẩm</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <?php if(isset($list_categories)):?>
                        <h6>Lọc theo tên danh mục:</h6>
                        <table class="filter_form">
                            <?php
                            foreach ($list_categories as $categories):
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="categories[]" value="<?php echo $categories['id']?>   ">
                                    </td>
                                    <td>
                                        <?php echo isset($_POST['categories[]'])?$_POST['categories[]']:$categories['name']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div class="form-group">
                        <h6>Lọc theo khoảng giá:</h6>
                        <table class="filter_form">
                            <tr>
                                <td><input type="checkbox" name="price[]" value="0"></td>
                                <td>Dưới 1tr đồng</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="price[]" value="1"></td>
                                <td>Từ 1tr - 2tr đồng</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="price[]" value="2"></td>
                                <td>Từ 2tr - 3tr đồng</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="price[]" value="3"></td>
                                <td>Từ 3tr - 4tr đồng</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="price[]" value="4"></td>
                                <td>Trên 4 triệu đồng</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="filter" class="btn btn-primary">Tìm kiếm</button>
                        <input type="reset" value="Xóa Filter" name="delete_filter" class="btn btn-danger">
                    </div>
                </form>
                <style>
                    .filter_form td {
                        /* margin: 0; */
                        padding: 8px 3px !important;
                        /* font-size: 30px; */
                    }
                </style>
            </div>
            <div class="col-md-9">
            <div class="row mb-5">
            <?php
                foreach ($list_product as $product):
            ?>
            <div class="col-md-4 mb-4">
                <!-- Card -->
                <div class="card">
                    <div class="rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="card-img hvr-grow">
                        <a href=""><img class="card-img-top" src="../backend/assets/container_file/<?php echo $product['avatar']?>" alt="Nho Xanh Sữa Hàn Quốc"></a>
                        <div class="box-control">
                            <div class="item">
                                        <span data-id="<?php echo $product['id']?>" class="add-to-cart">
                                            <a href="index.php?controller=cart&action=add&product_id=<?php echo $product['id']?>">
                                                <i class="fas fa-shopping-cart"></i></a>
<!--                                            <span class="text">Thêm giỏ hàng</span>-->
                                        </span>
                            </div>
                            <div class="item">
                                <a href=""><i class="fas fa-plus"></i></a>
                                <span class="text">Xem chi tiết</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2><a href=""><?php echo $product['name']?></a></h2>
                        <div class="box-price">
                            <div class="price"><?php echo  number_format($product['price'],'0','.','.')?> vnđ</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
            </div>
        </div>
        <?php echo $pagination ?>
<!--        <ul class="pagination">-->
<!--            <li class="disabled"><span>«</span></li>-->
<!--            <li class="active"><span>1</span></li>-->
<!--            <li><a href="https://hoaquafuji.com/products/best-seller-san-pham-ban-chay?page=2">2</a></li>-->
<!--            <li><a href="https://hoaquafuji.com/products/best-seller-san-pham-ban-chay?page=2" rel="next">»</a></li>-->
<!--        </ul>-->

    </div>
</section>