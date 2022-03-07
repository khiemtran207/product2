<section id="layout-content">
    <div class="container mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đặt hàng và Thanh toán</li>
            </ol>
        </nav>
        <section class="checkout-page">
            <div class="title-section clearfix"><span>Đặt hàng và thanh toán</span></div>
            <?php  if (isset($_SESSION['cart'])):?>
            <div class="body-section">
                <form action="" method="post" id="orderForm">
                    <div class="head">THÔNG TIN THANH TOÁN</div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-gruop row mb-4">
                                <label class="col-sm-3 col-form-label">Họ tên(<span class="text-danger">*</span>)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="your_name" value="" required="required">
                                </div>
                            </div>
                            <div class="form-gruop row mb-4">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="your_email" value="">
                                </div>
                            </div>
                            <div class="form-gruop row mb-4">
                                <label class="col-sm-3 col-form-label">Phone(<span class="text-danger">*</span>)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="your_mobile" value="" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-gruop mb-4">
                                <div>
                                    <textarea name="your_address" rows="5" class="w-100 p-3" placeholder="Địa chỉ của bạn (*)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="method-delivery">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-gruop row">
                                    <div class="col-sm-4 font-weight-bold">Lựa chọn thanh toán:</div>
                                    <div class="col-sm-8">
                                        <label class="form-check-label d-block">
                                            <input class="form-check-input" type="radio" name="payment_method" value="0"  onclick="$('.adress2').hide()"> Thanh toán trực tuyến
                                        </label>
                                        <label class="form-check-label d-block">
                                            <input class="form-check-input" type="radio" name="payment_method" value="1" onclick="$('.adress2').show()"> COD (dựa vào địa chỉ của bạn)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="method-delivery">
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea name="note" rows="3" style="width: 100%;padding: 0.5rem" placeholder="Nhập ghi chú đơn hàng"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <p><strong>Quý khách có thể thanh toán tiền mặt khi nhận hàng hoặc chuyển khoản theo thông tin sau</strong></p>
                                <p>STK: 21510002512870 <br>
                                    Chủ tài khoản: Trần Văn Khiêm <br>
                                    Ngân hàng: BIDV - Chi nhánh Cầu Giấy</p>
                            </div>
                        </div>
                    </section>
                    <table class="table table-bordered table-cart mt-4">
                        <thead>
                        <tr>
                            <th class="text-center">HÌNH ẢNH</th>
                            <th class="text-center">TÊN SẢN PHẨM</th>
                            <th class="text-center">ĐƠN GIÁ</th>
                            <th class="text-center">SỐ LƯỢNG</th>
                            <th class="text-center">THÀNH TIỀN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total_price = 0;
                            foreach ($_SESSION['cart'] as $cart):
                                $price_product = $cart['price']*$cart['quantity'];
                                $total_price += $price_product;

                        ?>
                        <tr>
                            <td class="text-center">
                                <a class="img-product-cart" href="" title="Kiwi vàng New Zealand">
                                    <img width="150px" height="150px" alt="Kiwi vàng New Zealand" src="../backend/assets/container_file/<?php echo $cart['avatar']?>">
                                </a>
                            </td>
                            <td>
                                <h2>
                                    <a class="name-product-cart" href="/product/kiwi-vang-new-zealand" title="Kiwi vàng New Zealand"><?php echo $cart['name']?></a>
                                </h2>
                            </td>
                            <td><span class="product-price"><?php echo number_format($cart['price'],'0',',',',') ;?> <sup>đ</sup></span></td>
                            <td class="text-center">
                                <?php echo $cart['quantity']?>
                            </td>
                            <td><span class="product-price">
                <?php echo number_format($cart['price']*$cart['quantity'],'0',',',',') ;?> <sup>đ</sup></span></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>                <div class="row justify-content-end">
                        <div class="col-3 text-right">
                            <div class="box-total">Tổng cộng:<span><?php echo $total_price?><sup>đ</sup></span></div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-3"><a href="index.php?controller=product&action=index" class="btn btn-success">Kiểm tra giỏ hàng</a></div>
                        <div class="col-7 text-right">
                            <button type="submit"  name="submit" class="btn btn-primary">Xác nhận và thanh toán</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php  else:;?>
                <div>
                    <h3>Giỏ hàng trống, quay lại <a href="index.php?controller=product">đây</a> để tiếp tục mua sản phẩm</h3>
                </div>
            <?php endif; ?>
        </section>
    </div>        </section>