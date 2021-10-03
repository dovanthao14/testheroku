<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Hàm điều hướng trang
class Redirect {
    public function __construct($url = null) {
        if ($url)
        {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}
function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'Bây giờ';
}


function time_stamp($time){
    $periods = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỉ");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $difference = $now - $time;
    $tense = "trước";
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
    }
   $difference = round($difference);
   return "Cách đây $difference $periods[$j]";
}


// func time ago
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    
    
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}
// time left

function time_left($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('Còn vài giây');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = sprintf('Còn %s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('Còn %s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('Còn %s ngày', $days);
}
return $since;
}

function auto_get($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_HEADER, false);
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($data, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($data, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($data, CURLOPT_TIMEOUT, 3);
    curl_setopt($data, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($data, CURLOPT_URL, $url);
    $res = curl_exec($data);
    curl_close($data);
    return $res;
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
function text($string, $separator = ', '){
    $vals = explode($separator, $string);
    foreach($vals as $key => $val) {
        $vals[$key] = strtolower(trim($val));
    }
    return array_diff($vals, array(""));
}
//anti_xss
function anti_xss($text) {
      return htmlspecialchars(htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8'));
}
// $_GET 
function GET($key) {
    return isset($_GET[$key]) ? anti_xss($_GET[$key]) : false; 
}
// $_POST
function POST($key) {
    return isset($_POST[$key]) ? anti_xss($_POST[$key]) : false; 
}

// gọn hơn :v
function load_url($url = "") {
    header('Location: '.$url.'');
    exit();
}
// xác nhận người dùng
function is_client() {
    $username = isset($_SESSION["user"]) ? $_SESSION["user"] : false;
    if ($username) {
        return true;
    }
    return false;
}
// xác nhận admin
function is_admin() {
    if (is_client()) {
        $id_admin = '2330224930440078';
        $id_admin_1 = 'tung90'; 
        if ($_SESSION["user"] == $id_admin || $_SESSION["user"] == $id_admin_1) {
            return true;
        }
        return false;
    }
    return false;
}
// xác nhận đang nhập admin
function otp_admin() {
    if (is_admin()) {
        $otp_admin = ($_SESSION["otp_admin"] ==  $_SESSION["check_otp_admin"]) ? $_SESSION["otp_admin"] : false;
        if ($otp_admin) {
            return true;
        }
    }
    return false;
}
//loại game
function type_game($game) {
      switch ($game) {
        case 'free-fire':
            $str = "Free Fire";
            break;
        case 'lien-quan':
            $str = "Liên Quân";
            break;
        default:
            return false;
            break;
    }
    return $str;
}
//loại random
function type_random($game) {
    $str = array();
      switch ($game) {
        case 1:
            $str['name']    = "Free Fire";
            $str['content'] = "Acc đăng nhập Facebook: 20% Nhận acc nhiều skin , 20% Nhận acc có 1467 Kim Cương, 30% Nhận acc ngẫu nhiên, 30% acc sai mật khẩu acc vô hiệu hóa acc lỗi ( Đọc kỹ thông báo và không thắc mắc ad về thử vận may này ) ";
            $str['price']   = 20000;
            $str['img']     = '/assets/images/Anh/rd20k.png';
            $str['url']     = 'free-fire-9k';
            break;
        case 2:
            $str['name']    = "Free Fire";
            $str['content'] = "Acc đăng nhập Facebook :30% Nhận acc nhiều skin , 20% Nhận acc có 2587 Kim Cương , 20% Nhận acc đủ chơi , 30% Nhận acc ngẫu nhiên  ( Shop không hỗ trợ mở xác minh danh tính cho thử vận may này AE cân nhắc trước khi mua)";
            $str['price']   = 50000;
            $str['img']     = '/assets/images/Anh/freefire50k.jpg';
            $str['url']     = 'free-fire-50k';
            break;
        case 3:
            $str['name']    = "Free Fire";
            $str['content'] = "Acc đăng nhập Facebook :40% Nhận acc nhiều skin , 30% Nhận acc có 2587 Kim Cương ,20% Nhận acc đủ chơi , 10% Nhận acc ngẫu nhiên( Hỗ trợ mở xác minh nếu có xác minh hình ảnh bạn bè)";
            $str['price']   = 100000;
            $str['img']     = '/assets/images/Anh/freefire100k.png';
            $str['url']     = 'free-fire-100k';
            break;
        case 4:
            $str['name']    = "Kim Cương Free Fire";
            $str['content'] = "100% Nhận được Kim Cương :45% Nhận 2222 Kim Cương,15% Nhận 5000 Kim Cương, 5% Nhận 9000 Kim Cương , 45% Nhận Kim Cương Ngẫu Nhiên";
            $str['price']   = 50000;
            $str['img']     = '/assets/images/Anh/KC.jpg';
            $str['url']     = 'hom-kim-cuong-free-fire';
            break;
        case 5:
            $str['name']    = "Liên Quân";
            $str['content'] = "100%ACC ĐÚNG MẬT KHẨU : 50% ACC TRẮNG THÔNG TIN TƯỚNG TRANG PHỤC NGẪU NHIÊN, 20% ACC NHIỀU TƯỚNG NHIỀU TRANG PHỤC , 30% ACC CÓ SỐ ĐIỆN THOẠI KHÔNG THỂ ĐỔI MẬT KHẨU";
            $str['price']   = 9000;
            $str['img']     = '/assets/images/Anh/9k.jpg';
            $str['url']     = 'lien-quan-9k';
            break;
        case 6:
            $str['name']    = "Liên Quân";
            $str['content'] = "Acc 100% trắng thông tin. 50% acc trên 10 tướng. 40% acc 20-40 tướng . 10% acc trên 70 trang phục";
            $str['price']   = 30000;
            $str['img']     = '/assets/images/Anh/30k.png';
            $str['url']     = 'lien-quan-30k';
            break;
        case 7:
            $str['name']    = "Liên Quân";
            $str['content'] = "100% trắng thông tin - 30% acc vip trên 100 skin";
            $str['price']   = 50000;
            $str['img']     = '/assets/images/Anh/random50k.jpg';
            $str['url']     = 'lien-quan-50k';
            break;
        case 8:
            $str['name']    = "Liên Quân";
            $str['content'] = "acc 100% trắng thông tin . 10% acc trên 15 tướng. 70% acc trên 20 tướng. 20% acc khủng nhiều skin";
            $str['price']   = 100000;
            $str['img']     = '/assets/images/Anh/100KLQ.png';
            $str['url']     = 'lien-quan-100k';
            break;
        case 9:
            $str['name']    = "Liên Quân";
            $str['content'] = "acc 100% trắng thông tin. 10% acc trên 20 tướng. 50% acc trên 30 tướng . 30% acc full tướng và skin";
            $str['price']   = 200000;
            $str['img']     = '/assets/images/Anh/200K.png';
            $str['url']     = 'lien-quan-200k';
            break;
        default:
            $str['name']    = "";
            $str['content'] = "";
            $str['price']   = 0;
            $str['img']     = '';
            $str['url']     = '';
            break;
    }
    return $str;
}
//check card
function luauytin($type,$seri,$pin) {
    if($type == 1 && strlen($seri) == 11 && strlen($pin) == 13){return true;}
    if($type == 1 && strlen($seri) == 14 && strlen($pin) == 15){return true;}
    if($type == 2 && strlen($seri) == 15 && strlen($pin) == 12){return true;}
    if($type == 3 && strlen($seri) == 14 && strlen($pin) == 12){return true;}
    if($type == 3 && strlen($seri) == 14 && strlen($pin) == 14){return true;}
    return false;
}

// Truyền vào
class Input {
    public function input_get($key) {
    return isset($_GET[$key]) ? $_GET[$key] : false; 
    }
    public function input_post($key) {
    return isset($_POST[$key]) ? $_POST[$key] : false; 
    }

}

//bb code
function bbcode($text) {
 
$find = array(
 
'~\[b\](.*?)\[/b\]~s',

'~\[p\](.*?)\[/p\]~s',
 
'~\[i\](.*?)\[/i\]~s',
 
'~\[u\](.*?)\[/u\]~s',
 
'~\[quote\](.*?)\[/quote\]~s',
 
'~\[size=(.*?)\](.*?)\[/size\]~s',
 
'~\[color=(.*?)\](.*?)\[/color\]~s',
 
'~\[url=(.*?)\](.*?)\[/url\]~s',
 
'~\[img=(.*?)\](.*?)\[/img\]~s'
 
);
 
$replace = array(
 
'<b>$1</b>',

'<p>$1</p>',
 
'<i>$1</i>',
 
'<span style="text-decoration:underline;">$1</span>',
 
'<pre>$1</'.'pre>',
 
'<span style="font-size:$1px;">$2</span>',
 
'<span style="color:$1;">$2</span>',
 
'<a href="$1">$2</a>',
 
'<img src="$1" alt="$2" />'
 
);
return preg_replace($find,$replace,$text);
}


function status_card($frame) {
      switch ($frame) {
        case 0:
            $str = "Chờ duyệt...";
            break;
        case 1:
            $str = "Thành công";
            break;
        case 2:
            $str = "Thất bại";
            break;
        case 3:
            $str = "Sai mệnh giá";
            break;
        case 4:
            $str = "Bảo trì";
            break;
        case 5:
            $str = "Sai ID Ingame";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

function color_status($cl) {
      switch ($cl) {
        case 0:
            $str = "blue";
            break;
        case 1:
            $str = "green";
            break;
        case 2:
            $str = "red";
            break;
        case 3:
            $str = "black";
            break;
        case 4:
            $str = "red";
            break;
        default:
            $str = "";
            break;
    }
    return $str;
}



function server_game($sv) {
      switch ($sv) {
    //tập kích
        case 1:
            $str = 'Miền Bắc';
            break;
        case 2:
            $str = 'Miền Bắc 2';
            break;
        case 3:
            $str = 'Miền Trung';
            break;
        case 4:
            $str = 'Miền Nam';
            break;
        case 5:
            $str = 'Miền Nam 2';
            break;
    //cfmobile
        case 11:
            $str = 'Server CF';
            break;
        default:
            return $sv;
            break;
    }
    return $str;
}

    
    function thumb($id) {
        $index = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/thumb/".$id.".*");
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return "/assets/files/thumb/".$last;
        } else {
                return "/assets/images/banner.jpg";
        }
        }

    function string_rank($rank) {
      switch ($rank) {
        case 1:
            $str = "Chưa xác định";
            break;
        case 0:
            $str = "Chưa Rank";
            break;
        case 2:
            $str = "Đồng V";
            break;
        case 3:
            $str = "Đồng IV";
            break;
        case 4:
            $str = "Đồng III";
            break;
        case 5:
            $str = "Đồng II";
            break;
        case 6:
            $str = "Đồng I";
            break;
        case 7:
            $str = "Bạc V";
            break;
        case 8:
            $str = "Bạc IV";
            break;
        case 9:
            $str = "Bạc III";
            break;
        case 10:
            $str = "Bạc II";
            break;
        case 11:
            $str = "Bạc I";
            break;
        case 12:
            $str = "Vàng V";
            break;
        case 13:
            $str = "Vàng IV";
            break;
        case 14:
            $str = "Vàng III";
            break;
        case 15:
            $str = "Vàng II";
            break;
        case 16:
            $str = "Vàng I";
            break;
        case 17:
            $str = "Bạch Kim V";
            break;
        case 18:
            $str = "Bạch Kim IV";
            break;
        case 19:
            $str = "Bạch Kim III";
            break;
        case 20:
            $str = "Bạch Kim II";
            break;
        case 21:
            $str = "Bạch Kim I";
            break;
        case 22:
            $str = "Kim Cương V";
            break;
        case 23:
            $str = "Kim Cương IV";
            break;
        case 24:
            $str = "Kim Cương III";
            break;
        case 25:
            $str = "Kim Cương II";
            break;
        case 26:
            $str = "Kim Cương I";
            break;
        case 27:
            $str = "Cao Thủ";
            break;
        case 28:
            $str = "Thách Đấu";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}
//check tỷ lệ
function check_wheel($percent){
    if ($percent < 1 || !$percent) return false;
    if ($percent >= 100) return true;
    if ($percent > rand(0,99)) return true;
    return false;
}
//info wheel
function info_wheel($type) {
    $wheel = array();
    switch ($type) {
        case 1:
            $wheel['msg']  = 'Nick nhiều súng';
            $wheel['angles']   = 0;
            break;
        case 2:
            $wheel['msg']  = 'Nick ngẫu nhiên';
            $wheel['angles']   = 45;
            break;
        case 3:
            $wheel['msg']  = 'Nick trang phục hiếm';
            $wheel['angles']   = 90;
            break;
        case 4:
            $wheel['msg']  = 'Cộng 10.000đ vào tài khoản';
            $wheel['angles']   = 135;
            break;
        case 5:
            $wheel['msg']  = 'Nick VIP';
            $wheel['angles']   = 180;
            break;
        case 6:
            $wheel['msg']  = 'Thêm 10% may mắn';
            $wheel['angles']   = 225;
            break;
        case 7:
            $wheel['msg']  = 'Nhận đượ 912 kim cương';
            $wheel['angles']   = 270;
            break;
        case 8:
            $wheel['msg']  = 'Chúc bạn may mắn lần sau';
            $wheel['angles']   = 315;
            break;
        case 9:
            $wheel['msg']  = rand(500,3000);
            $wheel['angles']   = 0;
            break;
        case 10:
            $wheel['msg']  = '9999';
            $wheel['angles']   = 45;
            break;
        case 11:
            $wheel['msg']  = '678';
            $wheel['angles']   = 90;
            break;
        case 12:
            $wheel['msg']  = rand(18,30);
            $wheel['angles']   = 135;
            break;
        case 13:
            $wheel['msg']  = '9999';
            $wheel['angles']   = 180;
            break;
        case 14:
            $wheel['msg']  = '912';
            $wheel['angles']   = 225;
            break;
        case 15:
            $wheel['msg']  = '5000';
            $wheel['angles']   = 270;
            break;
        case 16:
            $wheel['msg']  = '80';
            $wheel['angles']   = 315;
            break;
        default:
            $wheel['msg']  = 'Chúc bạn may mắn lần sau !';
            $wheel['angles']   = 315;
            break;
    }
    return $wheel;
}

// lấy thông tin rank và khung 
class Info {

        public function nice_number($n) {
            // first strip any formatting;
            $n = (0+str_replace(",", "", $n));
    
            // is this a number?
            if (!is_numeric($n)) return false;
    
            // now filter it;
            if ($n > 1000000000000) return round(($n/1000000000000), 2).' nghìn tỉ';
            elseif ($n > 1000000000) return round(($n/1000000000), 2).' tỉ';
            elseif ($n > 1000000) return round(($n/1000000), 2).' triệu';
            elseif ($n > 1000) return round(($n/1000), 2).' nghìn';
    
            return number_format($n);
        }
    
        public function get_post($id) {
            $post = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/post/".$id.".*");
            if ($avatar) {
                $arr = explode("/", $post[0]);
                $last = array_pop($arr);
                return "/assets/files/post/".$last;
            } else {
                return get_thumb($id);
            }
        }

}
?>