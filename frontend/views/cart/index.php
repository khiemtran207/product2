<section id="layout-content" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
        <?php if(isset($_SESSION['cart'])): ?>
        <div class="view-cart">
            <h1 class="text-center text-primary">Giỏ hàng của bạn</h1>
            <p class="text-dark text-center">Dưới đây là danh sách các sản phẩm trong giỏ hàng của bạn. Vui lòng xem lại danh sách sản phẩm, số lượng và bấm vào thanh toán</p>
            <div class="row">
                <div class="col-lg-12" id="cartList">
                    <div class="cart-list">
                        <form action="" method="post">
                            <div class="table-block">
                                <div class="table-responsive text-center">
                                    <table class="table table-bordered table-cart">
                                        <thead>
                                        <tr>
                                            <th class="text-center">HÌNH ẢNH</th>
                                            <th class="text-center">TÊN SẢN PHẨM</th>
                                            <th class="text-center">ĐƠN GIÁ</th>
                                            <th class="text-center">SỐ LƯỢNG</th>
                                            <th class="text-center">THÀNH TIỀN</th>
                                            <th class="text-center">XÓA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total_price = 0;
                                        foreach ($_SESSION['cart'] as $product_id=>$cart): ?>

                                        <tr>
                                            <td>
                                                <a class="img-product-cart" href="" title="Táo ống Rockit">
                                                    <img width="150px" height="150px" alt="Táo ống Rockit" src="../backend/assets/container_file/<?php echo $cart['avatar'] ?>">
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $cart['name'] ?>
                                            </td>
                                            <td>
                                                <span class=""><?php echo $cart['price'] ?> <sup>đ</sup></span>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" class="np-number" style="max-width: 60px;text-align:center" name="<?php echo $product_id; ?>" value="<?php echo $cart['quantity']?>">
                                            </td>
                                            <td>
                                                <span class="product-price"><?php echo number_format($cart['quantity']*$cart['price'],'0','.','.') ?><sup>đ</sup></span>
                                            </td>
                                            <td>
                                                <a class="button remove-item" onclick="return confirm('bạn có chắc muốn xóa sản phẩm này?')" title="Xóa" href="index.php?controller=cart&action=delete&product_id=<?php echo $product_id?>" data-request-confirm="Bạn muốn xóa sản phẩm này khỏi giỏ hàng?">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                            <?php
                                            $total_item = $cart['price'] * $cart['quantity'];
                                            // Cộng dồn để lấy ra tổng giá trị đơn hàng
                                            $total_price += $total_item;
                                            ?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-xs-12">
                                    <div class="no-border">
                                        <div class="col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                                            <a href="index.php?controller=cart&action=cancel" class="btn btn-dark" onclick="return confirm('bạn có chắc muốn xóa giỏ hàng?')">
                                                Hủy đặt hàng</a>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                                        <input type="submit" name="btnUpdate" value="Cập nhật giỏ hàng" class="btn btn-dark">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 pull-right">
                                    <table class="table table-bordered table-cart-total">
                                        <tbody>
                                        <tr>
                                            <td class="text-left">Tổng giá trị đơn hàng</td>
                                            <td class="text-right">
                                                <div class="product-price"><?php echo number_format($total_price); ?><sup>đ</sup></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <a href="index.php?controller=payment&action=index" class="btn btn-lg btn-style pull-xs-right btn-checkout width100" title="Tiến hành thanh toán">Thanh toán</a>
                                </div>
                        </form>
                            </div>
                    </div>	            </div>
            </div>
        </div>
        <?php else: ?>
        <div>
            <h3>Giỏ hàng trống, quay lại <a href="index.php?controller=product">đây</a> để tiếp tục mua sản phẩm</h3>
        </div>
        <?php endif;?>

    </div>        </section>