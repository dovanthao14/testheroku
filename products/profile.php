<script type="text/javascript" src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-page">
<div class="m-t-20 visible-sm visible-xs"></div>
<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$active ="profile";
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/products/sidebar.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$sql_top_recharge = "SELECT * FROM `top_recharge` WHERE `username` = '".$accounts['username']."'";
$info = ((GET('change_info') == 'phone' || GET('change_info') == 'email' || GET('change_info') == 'password')) ? GET('change_info') : '';
$info = !empty($info) && empty($accounts['password']) ? 'password' : $info;

?>
<?php if($info == 'phone'):?>
    <div class="c-layout-sidebar-content ">
        <div class="c-content-title-1">
            <h3 class="c-font-uppercase c-font-bold">Đổi số điện thoại</h3>
            <div class="c-line-left"></div>
        </div>
        <form method="POST" accept-charset="UTF-8" class="form-horizontal form-charge change_info">
            <input type="hidden" name="type" value="<?=$info;?>">
            <span class="help-block" style="text-align: center;color: #dd4b39">
                <strong class="msg"><?=empty($accounts['password']) ? 'Cập nhật số điện thoại để có thể sử dụng làm tài khoản đăng nhập !' : '';?></strong>
            </span>
        <?php if(!empty($accounts['phone'])):?>
            <div class="form-group">
                <label class="col-md-3 control-label">Số điện thoại cũ:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="oldinfo" type="text" maxlength="40" required="" placeholder="SĐT hiện tại">
                </div>
            </div>
        <?php endif;?>
            <div class="form-group">
                <label class="col-md-3 control-label">Số điện thoại mới:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="newinfo" type="text" maxlength="40" required="" placeholder="SĐT mới">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="renewinfo" type="password" maxlength="40" required="" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="form-group c-margin-t-40">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Cập nhật
                        <i class="fa fa-spinner fa-spin loading" style="display: none;"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php elseif($info == 'email'):?>
    <div class="c-layout-sidebar-content ">
        <div class="c-content-title-1">
            <h3 class="c-font-uppercase c-font-bold">Đổi email kết nối</h3>
            <div class="c-line-left"></div>
        </div>
        <form method="POST" accept-charset="UTF-8" class="form-horizontal form-charge change_info">
            <input type="hidden" name="type" value="<?=$info;?>">
            <span class="help-block" style="text-align: center;color: #dd4b39">
                <strong class="msg"><?=empty($accounts['email']) ? 'Vui lòng cập nhật Email để lấy lại mật khẩu khi quên !' : '';?></strong>
            </span>
        <?php if(!empty($accounts['email'])):?>
            <div class="form-group">
                <label class="col-md-3 control-label">Email cũ:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="oldinfo" type="text" maxlength="40" required="" placeholder="Email hiện tại">
                </div>
            </div>
        <?php endif;?>
            <div class="form-group">
                <label class="col-md-3 control-label">Email mới:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="newinfo" type="text" maxlength="40" required="" placeholder="Email mới">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="renewinfo" type="password" maxlength="40" required="" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="form-group c-margin-t-40">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Cập nhật
                        <i class="fa fa-spinner fa-spin loading" style="display: none;"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php elseif($info == 'password'):?>
    <div class="c-layout-sidebar-content ">
        <div class="c-content-title-1">
            <h3 class="c-font-uppercase c-font-bold">Đổi mật khẩu</h3>
            <div class="c-line-left"></div>
        </div>
        <form method="POST" accept-charset="UTF-8" class="form-horizontal form-charge change_info">
            <input type="hidden" name="type" value="<?=$info;?>">
            <span class="help-block" style="text-align: center;color: #dd4b39">
                <strong class="msg"><?=empty($accounts['password']) ? 'Vui lòng cập nhật mật khẩu !' : '';?></strong>
            </span>
        <?php if(!empty($accounts['password'])):?>
            <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="oldinfo" type="password" maxlength="40" required="" placeholder="Mật khẩu hiện tại">
                </div>
            </div>
        <?php endif;?>
            <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu mới:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="newinfo" type="password" maxlength="40" required="" placeholder="Mật khẩu mới">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Xác nhận:</label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme " name="renewinfo" type="password" maxlength="40" required="" placeholder="Xác nhận mật khẩu mới">
                </div>
            </div>
            <div class="form-group c-margin-t-40">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Đổi mật khẩu
                        <i class="fa fa-spinner fa-spin loading" style="display: none;"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php else: ?>
    <div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
        <div class="c-line-left"></div>
    </div>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">ID của bạn:</th>
                <th><span class="c-font-uppercase" data-toggle="tooltip" data-placement="top"><?=$accounts['username'];?></span>
                </th>
                <th></th>
            </tr>
            <tr>
                <th scope="row">Tên của bạn:</th>
                <th><?=$accounts['name'];?></th>
                <th></th>
            </tr>
            <tr>
                <th scope="row">Số dư tài khoản:</th>
                <td><b class="text-danger"><?=number_format($accounts['cash']);?>-đ</b>
                </td>
                <th></th>
            </tr>
            <tr>
                <th scope="row">Số điện thoại:</th>
                <td><b class="text-info"><?=!empty($accounts['phone']) ? str_replace(substr($accounts['phone'], -4), '****', $accounts['phone'] ): '<a href="/user/profile/change-phone.html" style="font-style: italic;color:blue;">Thêm số điện thoại</a>';?></b>
                </td>
                <th><?=!empty($accounts['phone']) ? '<a href="/user/profile/change-phone.html" class="text-right">Cập nhật</a>': '';?></th>
            </tr>
            <tr>
                <th scope="row">Email kết nối:</th>
                <td><b class="text-warning"><?=!empty($accounts['email']) ? str_replace(substr(substr($accounts['email'], 0, strpos($accounts['email'], '@')), -5), '*****', $accounts['email']) : '<a href="/user/profile/change-email.html" style="font-style: italic;color:blue;">Thêm email kết nối</a>';?></b>
                </td>
                <th><?=!empty($accounts['email']) ? '<a href="/user/profile/change-email.html" class="text-right">Cập nhật</a>': '';?></th>
            </tr>
            <tr>
                <th scope="row">Mật khẩu:</th>
                <td><b class="text-success"><?=!empty($accounts['password']) ? '********' : '<a href="/user/profile/change-password.html" style="font-style: italic;color:blue;">Cập nhật mật khẩu</a>';?></b>
                </td>
                <th><?=!empty($accounts['password']) ? '<a href="/user/profile/change-password.html" class="text-right">Cập nhật</a>': '';?></th>
            </tr>
            <tr>
                <th scope="row">Nhóm tài khoản:</th>
                <td><?=is_admin() ? '<a href="/admin" style="color:red;font-weight:bold;">Quản trị viên</a>':'Thành viên';?></td>
                <th></th>
            </tr>
            <tr>
                <th scope="row">Ngày tham gia:</th>
                <td><?=$accounts['datetime'];?></td>
                <th></th>
            </tr>
        </tbody>
    </table>
        
    </div>
<?php endif;?>

</div>
</div>
</div>
</div>