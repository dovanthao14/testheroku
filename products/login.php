<script type="text/javascript" src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-page">
	    <div class="login-box">
        <div class="login-box-body box-custom">
            <form class="login-luauytin" method="POST">
            <p class="login-box-msg">Đăng nhập hệ thống</p>
			<span class="help-block" style="text-align: center;color: #dd4b39">
                <strong class="msg"></strong>
            </span>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Tài khoản or Phone">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="checkbox icheck">
                            <label style="color: #666;font-style: italic;">
                                <a href="/user/password/forgot">Quên mật khẩu?</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6" style="text-align: right">
                        <a href="/user/register" style="color: #666;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Đăng ký</a><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="btn btn-google btn-block btn-flat" style="margin: 0 auto;color: white;">Đăng nhập</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
                <p style="margin-top: 5px">- HOẶC -</p>
                <a href="/user/login/facebook" class="btn  btn-social btn-primary btn-flat"><i class="icon-social-facebook icons"></i>Đăng nhập Facebook</a>
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
        font-size: 20px;;
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