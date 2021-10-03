<script type="text/javascript" src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-page">
	    <div class="login-box">
        <div class="login-box-body box-custom">
            <form class="forgot-luauytin" method="POST">
            <p class="login-box-msg">Quên mật khẩu</p>
                <span class="help-block" style="text-align: center;color: #dd4b39">
                    <strong class="msg"></strong>
                </span>
                <div class="forgot">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Tài khoản or Phone (*)">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="Email kết nối (*)">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="btn btn-google btn-block btn-flat" style="margin: 0 auto;color: white;">Xác nhận <i class="fa fa-spinner fa-spin loading" style="display: none;"></i></button>
                    </div>
                </div>
            </form>
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
</div>