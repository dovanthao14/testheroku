<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Require database
require_once 'core/init.php';
// Danh sach account

$act = GET('accounts') != null ? 'accounts' : GET('act');
if($act !='' && $act != 'register' && $act != 'forgot' && $act != 'view_accounts'  && $act != 'intro' && $act != 'terms' && $act != 'uytin' && $act != 'view_random' && $act != 'accounts' && $act != 'random_lq' && !is_client()){$act = 'login';}
if(($act == 'register' || $act == 'login' || $act == 'forgot') && is_client()){$act = '';}
switch ($act) {
	case 'login':
	    if($_SERVER["SERVER_NAME"] != $redomain){load_url('https://'.$redomain.'/user/login');die();}
		$settings['title'] = 'Đăng nhập | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/login.php'; 
		break;
	case 'register':
	    if($_SERVER["SERVER_NAME"] != $redomain){load_url('https://'.$redomain.'/user/register');die();}
		$settings['title'] = 'Đăng ký | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/register.php'; 
		break;
	case 'forgot':
		$settings['title'] = 'Quên mật khẩu | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/forgot.php'; 
		break;
	case 'view_accounts':
	    require_once 'includes/header.php';
		require_once 'includes/view_accounts.php'; 
		break;
	case 'view_random':
	    require_once 'includes/header.php';
		require_once 'includes/view_random.php'; 
		break;
    case 'accounts':
        $game = GET('accounts');
        if(type_game($game)):
            $settings['title'] = 'Shop '.type_game($game).' | '.$settings['title'];
        else:
            new Redirect($_DOMAIN);
        endif;
        require_once 'includes/header.php';
        require_once 'includes/accounts.php'; 
        break;
	case 'recharge':
		$settings['title'] = 'Nạp tiền từ thẻ cào | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/recharge.php'; 
		break;
	case 'rut-kc':
		$settings['title'] = 'Rút kim cương | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/rut-kc.php'; 
		break;
	case 'profile':
		$settings['title'] =  'Thông tin tài khoản | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/profile.php'; 
		break;
	case 'history_buy':
	    $title = "Lịch sử mua nick";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/history/buy.php'; 
		break;
	case 'history_wheel':
	    $title = "Lịch sử quay số";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/history/wheel.php'; 
		break;
	case 'history_card':
	    $title = "Lịch nạp thẻ cào";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/history/card.php'; 
		break;
	case 'random_lq':
	    $type = type_random(GET('type'))['name'] != '' ? (int)GET('type') : 1;
	    $settings['title'] = 'Thử Vận May '.type_random($type)['name'].' '.type_random($type)['price']*0.001.'K - Random '.type_random($type)['name'].' '.type_random($type)['price']*0.001.'K | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'includes/random.php'; 
		break;
	case 'intro':
        $title = "Giới thiệu hệ thống";
        $settings['title'] = $title.' | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/pages/intro.html'; 
		break;
	case 'uytin':
	    $title = "Sự Uy Tín Của MegaShopNick";
	    $settings['title'] = $title.' | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/pages/uytin.php'; 
		break;
	case 'terms':
	    $title = "Điểu khoản sử dụng dịch vụ";
	    $settings['title'] = $title.' | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/pages/terms.html'; 
		break;
	case 'wheel':
        $settings['title'] = 'Vòng quay may mắn | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/wheel.php'; 
		break;
	default:
	    require_once 'includes/header.php';
		require_once 'includes/home.php';
		break;
}
// Require footer
require_once 'includes/footer.php';
 
?>