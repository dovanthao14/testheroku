<script type="text/javascript" src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-page">
	    <div class="login-box">
        <div class="login-box-body box-custom">
            <form class="register-luauytin" method="POST">
            <p class="login-box-msg">Đăng ký thành viên</p>
                <span class="help-block" style="text-align: center;color: #dd4b39">
                    <strong class="msg"></strong>
                </span>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" placeholder="Họ và tên (*)">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Tài khoản (*)">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <?php /*
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control number" maxlength="11" name="phone" placeholder="Số điện thoại">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>*/ ?>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu (*)" aria-autocomplete="list">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu (*)">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="btn btn-google btn-block btn-flat" style="margin: 0 auto;color: white;">Đăng ký</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
                <p style="margin-top: 5px">- HOẶC -</p>
                <a href="/user/login/facebook" class="btn  btn-social btn-primary btn-flat"><i class="icon-social-facebook icons"></i> Facebook</a>
            </div>
        </div>
    </div>

    <style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;;
        }
        @media (max-width: 767px){
            .login-box, .register-box {
                width: 100%;
            }

        }
        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .box-custom{
            border: 1px solid #cccccc;
            padding: 20px;
            color: #666;
        }
    </style>
			<!-- END: PAGE CONTENT -->
</div>