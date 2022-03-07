<style>
    .error {
        padding: 12px 0;
        background: #EA2857;
        margin-bottom: 20px;
        border-radius: 16px;
        color: #ffffff;
    }
    .back{
        height: 100%;
        padding: 10px 60px;
        border-radius: 33px;
        border: none;
        color: white;
        background: #37bf99;
        font-size: 17px;
    }
    .username{
        color: white;
    }
</style>
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1>Thay đổi mật khẩu</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">
            <div class="wthree-pro">
                <h2>Change Password</h2>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error'])?></div>
                <?php endif ?>
                <?php if (isset($this->error)):; ?>
                    <div class="error"><?php echo $this->error?></div>
                <?php endif ?>
            </div>
            <form action="" method="post">
                <div class="pom-agile">
                    <p class="username">Tài khoản: <?php echo $obj_select['username']?> <i class="fa fa-user" aria-hidden="true"></i></p>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Nhập mật khẩu cũ" id="password_current" name="password_current" class="pass" type="password" required="" value="<?php echo (isset($_POST['password_current']))?$_POST['password_current']:'';?>">
                    <span class="icon2" id="show"><i id="icon_lock" class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Mật khẩu mới(lớn hơn 6 kí tự)" id="password" name="password" class="pass" type="password" required="" value="<?php echo (isset($_POST['password']))?$_POST['password']:'';?>">
                </div>
                <div class="pom-agile">
                    <input  placeholder="Xác nhận lại mật khẩu" id="password_confirm" name="password_confirm" class="pass" type="password" required="" value="<?php echo (isset($_POST['password_confirm']))?$_POST['password_confirm']:'';?>">
                </div>
                <div class="sub-w3l">
                    <div class="right-w3l">
                        <input type="submit" name="save" value="Save">
                        <a href="index.php?controller=user" class="back">Back</a>
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
                document.getElementById('password_current').type ="text";
                document.getElementById('password_confirm').type ="text";
                document.getElementById('icon_lock').className = "fa fa-lock";
                x = false;
            }else{
                document.getElementById('password').type ="password";
                document.getElementById('password_current').type ="password";
                document.getElementById('password_confirm').type ="password";
                document.getElementById('icon_lock').className = "fa fa-unlock"
                x = true;
            }
            event.preventDefault();
        })
    }
</script>