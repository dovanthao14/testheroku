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
if (is_client()){
    echo json_encode(array('status' => "error", 'link' => "/", 'msg' => "Bạn đã đăng nhập rồi"));
}else {
    $username = addslashes(strtolower(POST('username')));
    $name = $db->real_escape_string(addslashes(strip_tags($_POST['name'])));
    $password = md5(md5(POST('password')));
    $phone = !empty(POST('phone')) ? addslashes(POST('phone')) : '';
    $email = !empty(POST('email')) ? addslashes(POST('email')) : '';

    if (empty(POST('username')) || empty(POST('name')) || empty(POST('password')) || empty(POST('password_confirmation'))) {
        echo json_encode(array('status' => "error", 'msg' =>"Thông tin (*) không được để trống !"));exit;}
    if(strlen(POST('name')) < 6 || strlen(POST('name')) > 24){
        echo json_encode(array('status' => "error", 'msg' => "Họ tên phải từ 6 - 24 kí tự kí tự !"));exit;}
    if(strlen(POST('username')) < 6 || strlen(POST('username')) > 24){
        echo json_encode(array('status' => "error", 'msg' => "Tài khoản phải từ 6 - 24 kí tự kí tự !"));exit;}
    if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,24}$/', $username)){
        echo json_encode(array('status' => "error", 'msg' =>"Tài khoản chỉ gồm chữ và số. Không được sử dụng kí tự đặc biệt !"));exit;}
    if(!empty(POST('email')) && !filter_var(POST('email'), FILTER_VALIDATE_EMAIL)){
        echo json_encode(array('status' => "error", 'msg' =>"Email không đúng định dạng !"));exit;}
    if(!empty(POST('phone')) && !preg_match("/^\+?(84|0)(1\d{9}|9\d{8}|8\d{8}|3\d{8}|7\d{8}|5\d{8})$/", POST('phone'))){
        echo json_encode(array('status' => "error", 'msg' =>"Số điện thoại không đúng định dạng !"));exit;}
    if(POST('password')!=POST('password_confirmation')){
        echo json_encode(array('status' => "error", 'msg' =>"Xác thực mật khẩu không trùng nhau !"));exit;}
    if(strlen(POST('password')) < 6 || strlen(POST('password')) > 40){
        echo json_encode(array('status' => "error", 'msg' => "Mật khẩu phải từ 6 - 40 kí tự kí tự !"));exit;}
    //check username   
    if($db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `username` = '{$username}'") > 0) {
		 echo json_encode(array('status' => "error", 'msg' => "Tên đăng nhập đã tồn tại !"));exit;}
    //check email
    if(!empty(POST('email')) && $db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `email` = '{$email}'") > 0) {
         echo json_encode(array('status' => "error", 'msg' => "Email đã có người sử dụng !"));exit;}
    if(!empty(POST('phone')) && $db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `phone` = '{$phone}'") > 0) {
         echo json_encode(array('status' => "error", 'msg' => "Số điện toại đã có người sử dụng !"));exit;}
		 
    //Đủ điều kiện để đăng kí
	$db->query("INSERT INTO `accounts` (`username`,`name`,`password`,`phone`,`email`,`cash`,`datetime`) VALUES ('$username','$name','$password','$phone','$email','0','$date_current')");
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;
		echo json_encode(array('status' => "success", 'msg' => "Đăng ký thành công. Đang đăng nhập !"));
}