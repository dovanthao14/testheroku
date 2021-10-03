<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
$iduser = $accounts['username'];
if (!is_client()) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi",'link' => "/login.html", 'msg' => "Vui lòng đăng nhập để thực hiện nội dung !"));exit();}
    //post info
    $type = POST('type');
    $oldinfo = POST('oldinfo');
    $newinfo = POST('newinfo');
    $renewinfo = POST('renewinfo');
    
    if(empty($newinfo) || empty($renewinfo)){
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Không được để trống thông tin !"));exit();}
    if($type == "password"){
        if(($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$iduser}' AND password = '".md5(md5($oldinfo))."'") < 1) && ($accounts['password'] != "")){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mật khẩu cũ không chính xác !"));exit();}
        if($newinfo != $renewinfo){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Xác thực mật khẩu không trùng nhau !"));exit();}
        if(strlen($newinfo) < 6 || strlen($newinfo) > 20){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mật khẩu phải từ 6-20 kí tự !"));exit();}
        $db->query("UPDATE `accounts` SET `password` = '".md5(md5($newinfo))."' WHERE `username` = '{$iduser}'");// cập nhật
        $session->destroy();
        echo json_encode(array('status' => "success", 'title' => "Thành công !",'link' => "/login.html", 'msg' => "Cập nhật mật khẩu thành công !"));exit();    
    }elseif($type == "phone"){
        if(($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$iduser}' AND phone = '{$oldinfo}'") < 1) && ($accounts['phone'] != "")){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Số điện thoại cũ không chính xác !"));exit();}
        if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$iduser}' AND password = '".md5(md5($renewinfo))."'") < 1){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mật khẩu không chính xác !"));exit();} 
        if(!preg_match("/^\+?(84|0)(1\d{9}|9\d{8}|8\d{8}|3\d{8}|7\d{8}|5\d{8})$/", $newinfo)){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Số điện thoại mới không đúng định dạng !"));exit();}
        if($oldinfo == $newinfo){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "SĐT mới trùng với SĐT hiện tại !"));exit();}
        if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE phone = '{$newinfo}'") > 0){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Số điện thoại $newinfo đã có người khác sử dụng !"));exit();}    
        $db->query("UPDATE `accounts` SET `phone` = '{$newinfo}' WHERE `username` = '{$iduser}'");// cập nhật
        echo json_encode(array('status' => "success", 'title' => "Thành công !",'link' => "/infomation.html", 'msg' => "Cập nhật số điện thoại thành công !"));exit();    
            
    }elseif($type == "email"){
        if(($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$iduser}' AND email = '{$oldinfo}'") < 1) && ($accounts['email'] != "")){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Email cũ không chính xác !"));exit();}
        if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$iduser}' AND password = '".md5(md5($renewinfo))."'") < 1){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mật khẩu không chính xác !"));exit();}    
        if(!filter_var($newinfo, FILTER_VALIDATE_EMAIL)){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Email mới không đúng định dạng !"));exit();}
        if($oldinfo == $newinfo){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Email mới trùng với Email hiện tại !"));exit();}
        if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE email = '{$newinfo}'") > 0){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Email $newinfo đã có người khác sử dụng !"));exit();} 
        $db->query("UPDATE `accounts` SET `email` = '{$newinfo}' WHERE `username` = '{$iduser}'");// cập nhật
        echo json_encode(array('status' => "success", 'title' => "Thành công !",'link' => "/infomation.html", 'msg' => "Cập nhật email thành công !"));exit();    
    }else{
        echo json_encode(array('status' => "error", 'title' => "Lỗi",'link' => "/",'msg' => "Không tìm thấy giao thức. Vui lòng thực hiện lại !"));exit();
    }