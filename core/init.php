<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Require các thư viện PHP
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/connect@data.php');
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Session.php');
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Functions.php');
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Pagination.php');
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/phpmailer.php');

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\shopacc\system_luauytin\connect@data.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\shopacc\system_luauytin\Session.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\shopacc\system_luauytin\Functions.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\shopacc\system_luauytin\Pagination.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\shopacc\core\phpmailer.php');

// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

// Thông tin chung
$_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
//nếu không muốn chuyển hướng đăng nhập thì để $maindomain & $re_domain = $_SERVER["SERVER_NAME"]
$maindomain = $_SERVER["SERVER_NAME"];//tên miền chính
$re_domain = $_SERVER["SERVER_NAME"];//tên miền phụ
$root = $_SERVER["DOCUMENT_ROOT"];

//Thời gian
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");
$date_now = '';
$date_now = date("Y-m-d");
$time_now = time();   
// Khởi tạo session
$session = new Session();
$session->start();
// Nếu đăng nhập
if (is_client())
{
    // Lấy dữ liệu tài khoản
    $sql_accounts = "SELECT * FROM accounts WHERE username = '".$_SESSION['user']."'";
    if ($db->num_rows($sql_accounts))
    {
        $accounts = $db->fetch_assoc($sql_accounts, 1);
        $session_pass = !empty($_SESSION['pass']) ? $_SESSION['pass'] : '';
		//check password
		if(!empty($session_pass) && $session_pass != $accounts['password']){$session->destroy();die('Vui lòng đăng nhập lại');}
		//check block
		if($accounts['block'] > 0){
			if($accounts['time_block'] <= $time_now){
				$db->query("UPDATE `accounts` SET `block` = '0' , `time_block` = '0' , `days_block` = '0' WHERE `username` = '".$accounts['username']."' LIMIT 1");}    
		}
    }else{
		$session->destroy();die('Vui lòng đăng nhập lại');
	}
}
    // Lấy dữ liệu thông tin trang web đã cài đặt
    $sql_settings = "SELECT * FROM settings";
    if ($db->num_rows($sql_settings))
    {
        $settings = $db->fetch_assoc($sql_settings, 1);
    }

?>