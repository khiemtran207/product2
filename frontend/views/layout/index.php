
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title><?php echo $this->page_title ?></title>
    <meta name="description" content="Hệ thống hoa quả sạch Fuji với chuỗi 35 cửa hàng chuyên cung cấp hoa quả nhập khẩu, trái cây đặc sản vùng miền toàn quốc. Cam kết chất lượng,an toàn,uy tín" />
    <link rel="canonical" href="">
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hoa quả sạch fuji | Hệ thống hoa quả sạch nhập khẩu Fuji" />
    <meta property="og:description" content="Hệ thống hoa quả sạch Fuji với chuỗi 35 cửa hàng chuyên cung cấp hoa quả nhập khẩu, trái cây đặc sản vùng miền toàn quốc. Cam kết chất lượng,an toàn,uy tín" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="fb:app_id" content="3205375276187307" />
    <meta name="twitter:title" content="Hoa quả sạch fuji | Hệ thống hoa quả sạch nhập khẩu Fuji">
    <meta name="twitter:description" content="Hệ thống hoa quả sạch Fuji với chuỗi 35 cửa hàng chuyên cung cấp hoa quả nhập khẩu, trái cây đặc sản vùng miền toàn quốc. Cam kết chất lượng,an toàn,uy tín">
    <meta name="twitter:image" content="https://hoaquafuji.com/storage/app/media/mua-gio-trai-cay-dep-gia-re-o-dau-000.jpg" />
    <!-- Additional meta tags -->
    <meta name="google-site-verification" content="WXsKJfp0gesXTn2YHVyXTDWxlfNM-OyjHWgflGz4PRE" />
    <meta name="author" content="QuangtrongOnline">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="QuangtrongOnline">
    <link rel="icon" href="https://scontent.fhan5-7.fna.fbcdn.net/v/t1.6435-9/191298899_3965790330203034_6941361075588867196_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=d0rp-jwyMrcAX94q34M&tn=zdPgPHWy51fSZwLX&_nc_ht=scontent.fhan5-7.fna&oh=00_AT_jj7KXOi4Ofg0QgnzuZxOzKfPazH8IWBtlsZisz9BrLQ&oe=623B6DD7" sizes="50x50">
    <link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="assets/js/meanmenu/meanmenu.min.css" rel="stylesheet" />
</head>
<body>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>
<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat" page_id="405804443219484">
</div>
<div class="clearfix"></div>
<!-- Header -->
<header id="header">
    <div class="clearfix"></div>
    <div class="d-none d-md-block">
        <div class="top-header py-3 font-weight-bold">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><i class="fas fa-phone-square mr-2"></i>Gold food - Mua sự an tâm: <a href="tel:0374253692">0374253692</a></div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?controller=cart&action=index" class="text-dark">
                            <i class="fas fa-shopping-cart align-middle text-primar"></i>
                            <?php
                            $total_quantity = 0;
                                if(isset($_SESSION['cart'])):
                                    foreach ($_SESSION['cart'] as $cart){
                                        $total_quantity += $cart['quantity'];
                                    }
                            ?>
                            <span id="cart-info"> Giỏ hàng có <?php echo $total_quantity; ?> SP</span>
                            <?php else: ?>
                            <span id="cart-info"> Giỏ hàng trống</span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-145372992-1', 'auto');
                ga('send', 'pageview');

            </script>
        </div>
        <div class="middle-header bg-primary py-4 text-light">
            <div class="container">
                <div class="row align-content-center">
                    <div class="col-md-5 col-lg-4">
                        <form action="https://hoaquafuji.com/search" method="get" class="form-inline w-75">
                            <div class="input-group">
                                <input name="q" type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="search-box">
                                <div class="input-group-prepend">
                                    <button class="input-group-text bg-light" id="search-box" type="submit"><i class="fas fa-search text-dark"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-lg-4 text-center">
                        <a href=""><img class="bg-light logo" src="https://scontent.fhan5-7.fna.fbcdn.net/v/t1.6435-9/191298899_3965790330203034_6941361075588867196_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=d0rp-jwyMrcAX94q34M&tn=zdPgPHWy51fSZwLX&_nc_ht=scontent.fhan5-7.fna&oh=00_AT_jj7KXOi4Ofg0QgnzuZxOzKfPazH8IWBtlsZisz9BrLQ&oe=623B6DD7" alt="Hoa quả sạch"></a>
                    </div>
                </div>
            </div>
        </div>            </div>
    <div class="menu-mobile"></div>
    <div class="clearfix"></div>


    <div class="nav-desktop">
        <nav class="bg-light ">
            <div class="container">
                <ul class="d-lg-flex flex-row justify-content-center align-items-center">
                    <li class="sub-logo mr-auto"><a href=""><img src="https://scontent.fhan5-7.fna.fbcdn.net/v/t1.6435-9/191298899_3965790330203034_6941361075588867196_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=d0rp-jwyMrcAX94q34M&tn=zdPgPHWy51fSZwLX&_nc_ht=scontent.fhan5-7.fna&oh=00_AT_jj7KXOi4Ofg0QgnzuZxOzKfPazH8IWBtlsZisz9BrLQ&oe=623B6DD7" alt="Hoa quả sạch fuji"></a></li>
                    <li role="presentation"
                        class=" py-lg-2">
                        <a href="index.php?controller=home&action=index" >Home</a>
                    </li>
                    <li role="presentation" class="py-lg-2">
                        <a href="index.php?controller=product&action=index" >
                            Sản Phẩm
                        </a>
                    </li>
                    <li role="presentation"
                        class="py-lg-2 ">
                        <a href="index.php?controller=payment&action=index" >
                            Thanh toán
                        </a>
                    </li>
                    <li role="presentation" class="py-lg-2">
                        <a href="" >
                            Tin tức
                        </a>
                    </li>
                    <li role="presentation" class="py-lg-2">
                        <a href="" >
                            Giới thiệu
                        </a>
                    </li>
                    <li role="presentation" class="py-lg-2 ">
                        <a href="" >
                            Mùa vụ hoa quả
                        </a>
                    </li>
                    <li role="presentation"
                        class="py-lg-2">
                        <a href="" >
                            Hệ thống cửa hàng
                        </a>
                    </li>
                    <li role="presentation" class="py-lg-2">
                        <a href="" >
                            Liên hệ
                        </a>
                    </li>
                    <li class="btn-cart" id="btn-cart-navbar">
                        <a href="index.php?controller=cart&action=index">
                            <i class="fas fa-shopping-cart align-middle text-primary fa-2x"></i>
                            <?php
                            $cart_total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] AS $cart) {
                                    $cart_total += $cart['quantity'];
                                }
                            }
                            ?>
                            <span class="cart-amount">
                                <?php echo $cart_total; ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


</header>
<!-- Content -->
<?php
    echo $this->content;
?>
<!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="title">Chính sách</div>
                <ul class="list-unstyled">
                    <li><a href="">Chính sách bảo mật thông tin</a></li>
                    <li><a href="">Quy định và hình thức thanh toán</a></li>
                    <li><a href="">Chính sách thành viên Gold Food</a></li>
                    <li><a href="">Chính sách đổi trả</a></li>
                    <li><a href="">Chính sách vận chuyển</a></li>
                    <li><a href="">Câu hỏi thường gặp</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="title">Hỗ trợ mua hàng</div>
                <ul class="list-unstyled">
                    <li><a href="">Hệ thống cửa hàng</a></li>
                    <li><a href="">Hướng dẫn mua hàng</a></li>
                    <li><a href="">Hóa đơn VAT</a></li>
                </ul>
                <a href='' title="Hoa quả Fuji đã đăng ký với Bộ công thương"><img width='170px' alt='Bộ công thương' title='Bộ công thương' src="https://hoaquafuji.com/themes/hoaquafuji/assets/images/logoSaleNoti.png"/></a>
            </div>
            <div class="col-md-4">
                <div class="title">CÔNG TY CP XUẤT NHẬP KHẨU GOLD FOOD</div>
                <p>Trụ sở: Số nhà 86 Thụy Khuê, Tây Hồ, TP.HN</p>
                <p>Hotline: 0374253692</p>
            </div>
        </div>
    </div>        </footer>
<div class="copy-right py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">© 2018 Hệ thống hoa quả sạch Gold Food</div>
            <div class="col-md-6 text-right">
                <a href="#!" class="btn-social hvr-grow"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="btn-social hvr-grow"><i class="fab fa-google-plus-g"></i></i></a>
                <a href="#!" class="btn-social hvr-grow"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="btn-social hvr-grow"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
<a href="tel:0374253692">
    <div class="animation">
        <span class="icon ring"></span>
        <div class="cercle one"></div>
        <div class="cercle two"></div>
    </div>
</a>

<style type="text/css">
    .animation {
        cursor: pointer;
        margin: 0;
        padding: 0;
        z-index: 9999999999;
        position: fixed;
        opacity: 0.8;
        width: 80px;
        height: 80px;
        bottom:0;
        left:84px;
        transform: translate(-50%, -70%);
        border-radius: 50%;
        background-color: #ff9600;
    }

    .ring {
        z-index: 3;
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('https://hoaquafuji.com/themes/hoaquafuji/assets/img/circle-01-1.png') no-repeat center center;
        -webkit-animation: ring 0.6s infinite;
        -o-animation: ring 0.6s infinite;
        animation: ring 0.6s infinite;
    }

    @keyframes ring {
        0% {
            transform: rotate(0deg);
        }
        20% {
            transform: rotate(-20deg);
        }
        21% {
            transform: rotate(0deg);
        }
        40% {
            transform: rotate(-20deg);
        }
        41% {
            transform: rotate(0deg);
        }
        60% {
            transform: rotate(-20deg);
        }
        80% {
            transform: rotate(-10deg);
        }
        100% {
            transform: rotate(0deg);
        }
    }

    .cercle {
        z-index: 2;
        position: absolute;
        width: 100px;
        height: 100px;
        transform: translate(-12px, -12px);
        border-radius: 50%;
        border: 2px solid #ff9600;
        background-color: transparent;
        -webkit-animation: wave 1.4s infinite linear;
        -o-animation: wave 1.4s infinite linear;
        animation: wave 1.4s infinite linear;
    }

    .two {
        animation-delay: 0.35s;
        opacity: 0;
    }

    .three {
        animation-delay: 0.7s;
        opacity: 0;
    }

    @keyframes wave {
        0% {
            width: 80px;
            height: 80px;
            background-color: #ff9600;
            z-index: 1;
            transform: translate(-2px, -2px);
            opacity: 1;
            border-width: 2px;
        }
        100% {
            width: 150px;
            height: 150px;
            transform: translate(-35px, -35px);
            opacity: 0.2;
            border-width: 2px;
        }
    }

    @keyframes opacity {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0.2;
        }
        100% {
            opacity: 1;
        }
    }

    @media only screen and (max-width: 768px){
        .animation{
            width: 60px;
            height: 60px;
            bottom: -25px;
            left: 55px;
        }
        .cercle{
            display: none;
        }
        .icon.ring{
            background-size: 70%;
        }
    }
    /* ================================================== */
</style>        <!-- Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="https://hoaquafuji.com/themes/hoaquafuji/assets/js/app.js"></script>
<!-- Messenger Plugin chat Code -->
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "405804443219484");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://hoaquafuji.com/modules/system/assets/js/framework.combined-min.js"></script>
<link rel="stylesheet" property="stylesheet" href="https://hoaquafuji.com/modules/system/assets/css/framework.extras-min.css">
<script type="text/javascript" async="async" src="https://hoaquafuji.com/themes/hoaquafuji/assets/js/menu.js"></script>
<script type="text/javascript" src="https://hoaquafuji.com/themes/hoaquafuji/assets/js/meanmenu/jquery.meanmenu.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('header nav').meanmenu({
            meanMenuContainer: '.menu-mobile',
            meanScreenWidth: "992"
        });
    });
</script>    </body>
</html>