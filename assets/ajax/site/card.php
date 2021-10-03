<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║ 
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check info
if(!$_POST){load_url('/');}
if (!is_client()) {
    echo json_encode(array('status' => "error", 'msg' => "Bạn chưa đăng nhậ !p"));exit;}
if($settings['status'] != 1 && !is_admin()){
    echo json_encode(array('status' => "error", 'msg' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));exit;}
if ($accounts['block'] > 0){
        echo json_encode(array('msg' => 'Tài khoản của bạn đã bị khóa. Lý do: <i style="color:#3f444a;">'.$accounts['note'].'</i>. Vui lòng liên hệ với Admin !'));exit();}
if (!POST('card_type_id')) {
    echo json_encode(array('status' => "error", 'msg' => "Chưa chọn loại nhà mạng !"));exit;}
if (!POST('price_guest')) {
    echo json_encode(array('status' => "error", 'msg' => "Chưa chọn mệnh giá thẻ !"));exit;}
if (!POST('pin')) {
    echo json_encode(array('status' => "error", 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ !"));exit;}
if (!POST('seri')) {
    echo json_encode(array('status' => "error", 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ !"));exit;}

//info user
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);


//Truyền dữ liệu thẻ
$card_type      = (int)POST('card_type_id'); // loại thẻ
$card_amount    = (int)POST('price_guest');// mệnh giá
$pin            = POST('pin'); // mã thẻ
$seri           = POST('seri'); // serial


//lấy thông tin thẻ
$sql_card = "SELECT * FROM `card` WHERE `id` = '{$card_type}'";
if ($db->num_rows($sql_card)){
    $card = $db->fetch_assoc($sql_card,1);
    $cash_nhan = $card['ck']*$card_amount*0.01;
}else{
    echo json_encode(array('status' => "error", 'msg' => "Thẻ này không được hỗ trợ trên hệ thống !"));exit;
}
//check hoạt động thẻ
if($card['status'] != 1){
    echo json_encode(array('status' => "error", 'msg' => "Thẻ ".string_card($card_type)." đang tạm bảo trì !"));exit;
}

//Check thẻ đã nạp trên web
if($db->fetch_row("SELECT COUNT(*) FROM `history_card` WHERE `pin` = '{$pin}' AND `seri` = '{$seri}'")){
    echo json_encode(array('status' => "error", 'msg' => "Thẻ đã được nạp trên hệ thống. Vui lòng sử dụng thẻ khác !"));exit;}
    
//xử lý thẻ
###########################################################
if($card['auto'] == 1):
require 'config.php';
    $telco = array(1 => 'VIETTEL', 2 => 'MOBIFONE', 3 => 'VINAPHONE')[$card_type];    
    $request_id = rand(100000000, 999999999);  /// Cái này có thể mà mã order của bạn, nếu không có thì để nguyên ko cần động vào.
	$command = 'charging';  // Nap the

            $dataPost = array();
			$dataPost['partner_id'] = $partner_id;
			$dataPost['request_id'] = $request_id;
			$dataPost['telco'] = $telco;
			$dataPost['amount'] = $card_amount;
			$dataPost['serial'] = $seri;
			$dataPost['code'] = $pin;
			$dataPost['command'] = $command;
			$sign = creatSign($partner_key, $dataPost);
			$dataPost['sign'] = $sign;
			
            $data = http_build_query($dataPost);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);

            if ($obj->status == 99) {
                //Gửi thẻ thành công, đợi duyệt.
                $db->query("INSERT INTO `history_card` (request_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('".$obj->trans_id."','$iduser','$name','$card_type','$card_amount','$cash_nhan','$date_current','$date_now','$seri','$pin','0')");// lịch sử
                echo json_encode(array('title' => "Chờ xử lý",'status' => "success", 'msg' => "Gửi yêu cầu thành công. Vui lòng chờ xử lý. Làm mới trang để nhận trạng thái thẻ mới nhất !"));exit;
            } elseif($obj->status == 1) {
                //Thành công
                $db->query("INSERT INTO `history_card` (request_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('".$obj->trans_id."','$iduser','$name','$card_type','$card_amount','$cash_nhan','$date_current','$date_now','$seri','$code','1')");// lịch sử
                $db->query("UPDATE `accounts` SET `cash` = `cash` + '{$cash_nhan}' WHERE `username` = '{$iduser}'");//cộng tiền
                echo json_encode(array('title' => 'Thành công','status' => "success", 'msg' => "Nạp thẻ thành công !"));exit;
            }elseif($obj->status == 2) {
                //Thành công nhưng sai mệnh giá
                $db->query("INSERT INTO `history_card` (request_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('".$obj->trans_id."','$iduser','$name','$card_type','$card_amount','0','$date_current','$date_now','$seri','$pin','3')");// lịch sử
                echo json_encode(array('title' => "Lỗi", 'status' => "error", 'msg' => "Thẻ bị thu hồi do chọn sai mệnh giá !"));exit;
                            
            }elseif($obj->status == 3) {
                //Thẻ lỗi
                $db->query("INSERT INTO `history_card` (request_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('".$obj->trans_id."','$iduser','$name','$card_type','$card_amount','0','$date_current','$date_now','$seri','$pin','2')");// lịch sử
                echo json_encode(array('title' => "Lỗi", 'status' => "error", 'msg' => "Thẻ sai hoặc đã sử dụng !"));exit;
                            
            }else{
				//Lỗi
                echo json_encode(array('title' => "Lỗi", 'status' => "error", 'msg' => 'Lỗi: '.$obj->message));exit;
			}

##################################################
elseif($card['auto'] == 0):
$type = $card_type > 10 ? $card_type-10 : $card_type;
if(!luauytin($type,$seri,$pin)){
    echo json_encode(array('status' => "error", 'msg' => "Mã thẻ hoặc seri không đúng định dạng !"));exit();}


    $db->query("INSERT INTO `history_card` (`request_id`,`username`,`name`,`type_card`,`count_card`,`cash_nhan`,`time`,`date`,`seri`,`pin`,`status`) VALUES ('','$iduser','$name','$card_type','$card_amount','$cash_nhan','$date_current','$date_now','$seri','$pin','0')");// lịch sử
    //gửi mail
    $subject = "Yêu cầu gạch thẻ cào tại $_DOMAIN";
    $title = 'Yêu gạch thẻ ngày '.$date_now;
    $yeucau = $db->fetch_row("SELECT COUNT(*) FROM history_card WHERE status = '0'");
    $nTo = 'luauytin';
    $mTo = $settings['email_admin'];
    $content = '
<html>
<head>
    <title></title>
</head>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="3" style="background-color:#00CC99;width:100%;">
    <thead>
        <tr>
            <th scope="col">
            <p><span style="color:#000000;"><span style="font-size:22px;">Hiện tại có </span></span><span style="font-size:22px;"><span style="color:#FF0000;">'.$yeucau.'</span> yêu cầu gạch thẻ chờ xử lý</span></p>

            <p><span style="font-size:20px;"><span style="color:#000000;">Yêu cầu mới nhất:</span></span></p>

            <p style="text-align: left;"><span style="color:#000000;">IDUser: </span><span style="color:#FF0000;">'.$iduser.'</span></p>
            
            <p style="text-align: left;"><span style="color:#000000;">Name: </span><span style="color:#FF0000;">'.$name.'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Loại thẻ: </span><span style="color:#FF0000;">'.string_card($card_type).'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Mệnh giá: </span><span style="color:#FF0000;">'.number_format($card_amount).'đ</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Serial: </span><span style="color:#FF0000;">'.$seri.'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Mã thẻ: </span><span style="color:#FF0000;">'.$pin.'</span></p>

            <p style="text-align: left;">Thời gian: <span style="color:#008000;">'.$date_current.'</span></p>

            <p style="text-align: right;"><em style=""><span style="color: rgb(0, 0, 255);"><span style="font-size: 11px;">'.$settings['title'].'</span></span></em></p>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>
    ';
    $mail = sendMail($title, $subject, $content, $nTo, $mTo);
    if($mail == 1):
        echo json_encode(array('status' => "success", 'msg' => "Gửi thẻ ".string_card($card_type)." mệnh giá ".number_format($card_amount)."đ thành công. Vui lòng đợi hệ thống xử lý trong ít phút !"));exit;
    else:
        echo json_encode(array('status' => "success", 'msg' => "Gửi thẻ ".string_card($card_type)." mệnh giá ".number_format($card_amount)."đ thành công. Liên hệ admin để được xử lý nhanh nhất !"));exit;
    endif;
else:
    echo json_encode(array('status' => "error", 'msg' => "Lỗi hệ thống. Vui lòng liên hệ Admin !"));exit;
endif;
