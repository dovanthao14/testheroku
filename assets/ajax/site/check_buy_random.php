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
if (!is_client()) {
        echo json_encode(array('msg' => "Vui lòng đăng nhập để thực hiện giao dịch !"));exit();}

$id = (int)POST('id');
$sql_acc_random = "SELECT * FROM `acc_random` WHERE `id` = '{$id}'";
$acc_random = $db->fetch_assoc($sql_acc_random,1);
$price = type_random($acc_random['type'])['price'];
if (is_admin()){
    $diamon_ff = $acc_random['type'] == 4 ? rand(82,1100):0;
}else{
    $diamon_ff = $acc_random['type'] == 4 ? rand(55,80):0;
}
if ($diamon_ff > 0){
    $acc_random['username'] = 'Bạn nhận được '.$diamon_ff.' kim cương';
    $acc_random['password'] = '';
}
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);     
$info_account = '
<tr>
    <td>Tài khoản:</td>
    <th class="text-danger">'.$acc_random['username'].'</th>
</tr>
<tr>
    <td>Mật khẩu:</td>
    <th class="text-info">'.$acc_random['password'].'</th>
</tr>
';

    if ($accounts['block'] > 0){
        echo json_encode(array('msg' => 'Tài khoản của bạn đã bị khóa. Lý do: <i style="color:#3f444a;">'.$accounts['note'].'</i>. Vui lòng liên hệ với Admin !'));exit();}
    if($db->num_rows($sql_acc_random) != 1){
        echo json_encode(array('msg' => "Tài khoản không tồn tại trên hệ thống !"));exit();}
    if (!$id) {
        echo json_encode(array('msg' => "Bạn chưa chọn tài khoản !"));exit();}
    if($settings['status'] != 1 && !is_admin()){
        echo json_encode(array('msg' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));exit();}
    if($settings['status_random'] != 1 && !is_admin()){
        echo json_encode(array('msg' => "Hệ thống thử vận may đang bảo trì. Vui lòng quay lại sau !"));exit();}
    if ($acc_random['status'] != 0) {
        echo json_encode(array('msg' => "Tài khoản bạn chọn không tồn tại hoặc đã bị mua bởi người khác !"));exit();}
    if ($price < 1000) {
        echo json_encode(array('msg' => "Tài khoản chưa được kích hoạt !"));exit();}
    if ($accounts['cash'] < $price ) {
        echo json_encode(array('msg' => "Bạn không đủ tiền để thanh toán, vui lòng nạp thêm !"));exit();}

    //Đủ điều kiện
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}',`diamon_ff` = `diamon_ff` + '{$diamon_ff}' WHERE `username` = '{$iduser}'");//trừ tiền
        $db->query("UPDATE `acc_random` SET `iduser` = '{$iduser}', `id_name` = '{$name}', `status` = '1', `price` = '{$price}', `time` = '{$date_current}', `date` = '{$date_now}' WHERE `id` = '{$id}' LIMIT 1");// status
        $db->query("INSERT INTO `history_buy` (username,name,price,time,date,type,id_random) VALUES ('$iduser','$name','$price','$time_now','$date_now',1,'$id')");
        if ($diamon_ff > 0){
            $db->query("UPDATE `acc_random` SET `username` = 'Nhận $diamon_ff kim cương !', `password` = '' WHERE `id` = '{$id}'");//trừ tiền,cộng kc tích lũy
        }
            echo json_encode(array('status' => "success", 'msg' => $info_account));
exit();
?> 