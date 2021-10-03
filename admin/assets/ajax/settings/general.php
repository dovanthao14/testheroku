<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if(!is_admin()){
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là admin !"));exit();}
    
    $title = strip_tags($_POST['title']);
    $descr = strip_tags($_POST['descr']);
    $keywords = htmlentities(strip_tags($_POST['keywords']), ENT_QUOTES, 'UTF-8');
    $fanpage = htmlentities(strip_tags($_POST['fanpage']), ENT_QUOTES, 'UTF-8');
    $fb_admin = htmlentities(strip_tags($_POST['fb_admin']), ENT_QUOTES, 'UTF-8');
    $name_admin = htmlentities(strip_tags($_POST['name_admin']), ENT_QUOTES, 'UTF-8');
    $phone_admin = htmlentities(strip_tags($_POST['phone_admin']), ENT_QUOTES, 'UTF-8');
    $email_admin = htmlentities(strip_tags($_POST['email_admin']), ENT_QUOTES, 'UTF-8');
    $notify = htmlentities(strip_tags($_POST['notify']), ENT_QUOTES, 'UTF-8');
    $domain = POST('domain');
    $status = POST('status');
    $status_random = POST('status_random');
    $status_notify = POST('status_notify');
    $youtube = POST('youtube');
    $merchant_key = POST('merchant_key');
    $merchant_id = POST('merchant_id');
    
    //Update data
    $db->query("UPDATE settings SET 
        `title` = '$title',
        `descr` = '$descr',
        `keywords` = '$keywords',
        `fanpage` = '$fanpage',
        `fb_admin` = '$fb_admin',
        `name_admin` = '$name_admin',
        `phone_admin` = '$phone_admin',
        `email_admin` = '$email_admin',
        `notify` = '$notify',
        `domain` = '$domain',
        `status` = '$status',
        `status_random` = '$status_random',
        `status_notify` = '$status_notify',
        `youtube` = '$youtube',
        `merchant_key` = '$merchant_key',
        `merchant_id` = '$merchant_id'
    ");
echo json_encode(array('status' => "success",'link' => "", 'msg' => "Lưu cài đặt thành công !"));
exit();
?>