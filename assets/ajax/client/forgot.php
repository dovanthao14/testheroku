<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if (is_client()) {
    echo json_encode(array('status' => "error", 'msg' => "Vui lòng đăng xuất để thực hiện nội dung !"));exit();}

        $username = !empty(POST('username')) ? strtolower(POST('username')) : '';
        $email = !empty(POST('email')) ? POST('email') : '';
        $otp = !empty(POST('otp')) ? POST('otp') : '';
        $password = !empty(POST('password')) ? POST('password') : '';
        $repassword = !empty(POST('repassword')) ? POST('repassword') : '';
        
        if(!empty($username) && !empty($email) && empty($otp) && empty($password) && empty($repassword)):
        //check info
            if(!preg_match('/^[A-Za-z0-9]{6,20}$/', $username)){
                echo json_encode(array('status' => 'error', 'msg' =>"Tài khoản từ 6-24 kí tự chỉ gồm chữ ,số. Không được sử dụng kí tự đặc biệt !"));exit;}
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo json_encode(array('status' => "error", 'msg' => "Email không đúng định dạng !"));exit();}
            //check thông tin
            $check_user = $db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `username` = '{$username}' AND `email` = '{$email}'");
            $check_phone = $db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `phone` = '{$username}' AND `email` = '{$email}'");
            if(($check_user + $check_phone) != 1){
                echo json_encode(array('status' => "error", 'msg' => "Thông tin yêu cầu không chính xác !"));exit;}
            //lưu sesion
            $_SESSION['password_forgot'] = rand(1111111,99999999);
            $_SESSION['username_forgot'] = $username;
            $_SESSION['time_forgot'] = time();
            //gửi mail
                $subject = "OTP cấp lại mật khẩu mới trên website $_DOMAIN";
                $title = 'OTP Verification';
                $nTo = $username;
                $mTo = $email;
                $content = '
<html>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="3" style="background-color:#00CC99;width:100%;">
    <thead>
        <tr>
            <th scope="col">
            <p>Hi <i style="color:red;">'.$username.'</i>. Mật khẩu mới của bạn là:</p>

            <table align="center" border="1" cellpadding="1" cellspacing="10" style="background-color:green;width:150px;color:white;">
                <tbody>
                    <tr>
                        <td>'.$_SESSION['password_forgot'].'</td>
                    </tr>
                </tbody>
            </table>

            <p style="text-align: left;"><span style="font-size:15px;"><em><span style="color:#0000FF;">OTP chỉ sử dụng trong vòng 5 phút kể từ khi nhận.</span></em></span></p>
            <p style="text-align: left;"><span style="font-size:11px;">'.$date_current.'</span></p>
            <p style="text-align: right;"><span style="font-size:11px;"><em><span style="color:#0000FF;">'.$settings['title'].'</span></em></span></p>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>
    ';
                $code = '
<div class="form-group has-feedback">
    <input type="number" class="form-control" name="otp" placeholder="Mã OTP (*)">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới (*)">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" class="form-control" name="repassword" placeholder="Xác nhận mật khẩu mới (*)">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>';
                $mail = sendMail($title, $subject, $content, $nTo, $mTo);
                
                if($mail == 1)://thành cônng
                        echo json_encode(array('status' => "success",'code' => $code, 'msg' => "Một mã OTP xác minh đã được gửi về Email của bạn !"));exit;
                else:
                        echo json_encode(array('status' => "error", 'msg' => "Có lỗi. Xin vui lòng thử lại sau !"));exit;
                endif;

        elseif(empty($username) && empty($email) && !empty($otp) && !empty($password) && !empty($repassword) && !empty($_SESSION['password_forgot']) && isset($_SESSION['password_forgot'])  && !empty($_SESSION['username_forgot']) && isset($_SESSION['username_forgot'])):
            if($otp != $_SESSION['password_forgot']){
                echo json_encode(array('status' => "error", 'msg' => "Mã OTP không chính xác !"));exit;}
            if(time() - $_SESSION['time_forgot'] > 0){
                echo json_encode(array('status' => "error", 'link' => "/user/password/forgot", 'msg' => "Mã OTP đã hết hạn !"));exit;}
            if($password != $repassword){
                echo json_encode(array('status' => "error", 'msg' => "Xác thực mật khẩu không trùng nhau !"));exit;}
            if(strlen(POST('password')) < 6 || strlen(POST('password')) > 40){
                echo json_encode(array('status' => "error", 'msg' => "Mật khẩu phải từ 6 - 40 kí tự kí tự !"));exit;}
            if($db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `username` = '".$_SESSION['username_forgot']."'") != 1){
                echo json_encode(array('status' => "error", 'link' => "/user/password/forgot", 'msg' => "Có lỗi. Vui lòng thực hiện lại !"));exit;}
            $db->query("UPDATE `accounts` SET `password` = '".md5(md5($password))."' WHERE `username` = '".$_SESSION['username_forgot']."'");// cập nhật
            $session->destroy();
            echo json_encode(array('status' => "success", 'link' => "/user/login", 'msg' => "Cập nhật mật khẩu thành công !"));exit();
        else:
            echo json_encode(array('status' => "error", 'msg' => "Vui lòng nhập đẩy đủ thông tin (*) !"));exit;
        endif;
exit;