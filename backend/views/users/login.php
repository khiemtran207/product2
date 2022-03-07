<style>
    .error {
        padding: 12px 0;
        background: #EA2857;
        margin-bottom: 20px;
        border-radius: 16px;
        color: #ffffff;
    }
</style>
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1>Đăng nhập</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">
            <div class="wthree-pro">
                <h2>Login</h2>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error'])?></div>
                <?php endif ?>
                <?php if (isset($this->error)):; ?>
                    <div class="error"><?php echo $this->error?></div>
                <?php endif ?>
            </div>
            <form action=" " method="post">
                <div class="pom-agile">
                    <input placeholder="Tên đăng nhập"  name="username" class="user" type="text" value="">
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Mật khẩu (lớn hơn 6 kí tự)" id="password" name="password" class="pass" type="password" value="" required="">
                    <span class="icon2" id="show"><i id="icon_lock" class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="sub-w3l">
                    <p style="
    color: #e5e5e5;
    font-size: 13px;
    text-align: left; padding-left: 10px

">Chưa có tài khoản, <a style="color: #fbe232; text-decoration: underline" href="index.php?controller=login&action=register">đăng kí</a> ngay !</p>
                    <div class="right-w3l">
                        <input type="submit" name="login" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--//main-->
    <!--footer-->
    <!--//footer-->
</div>
<script type="text/javascript">
    window.onload =function (){
        var x = true;
        document.getElementById('show').addEventListener('click',function (){
            if(x){
                document.getElementById('password').type ="text";
                document.getElementById('icon_lock').className = "fa fa-lock";
                x = false;
            }else{
                document.getElementById('password').type ="password";
                document.getElementById('icon_lock').className = "fa fa-unlock"
                x = true;
            }
            event.preventDefault();
        })
    }
</script>