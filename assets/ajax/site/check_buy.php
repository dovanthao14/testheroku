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

$id = POST('id');
$sql_products = "SELECT * FROM `products` WHERE `id` = '{$id}'";
$products = $db->fetch_assoc($sql_products,1);  
$price = $products['price'];
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);     
$info_account = '
<tr>
    <td>Tài khoản:</td>
    <th class="text-danger">'.$products['username'].'</th>
</tr>
<tr>
    <td>Mật khẩu:</td>
    <th class="text-info">'.$products['password'].'</th>
</tr>
';

    if ($accounts['block'] > 0){
        echo json_encode(array('msg' => 'Tài khoản của bạn đã bị khóa. Lý do: <i style="color:#3f444a;">'.$accounts['note'].'</i>. Vui lòng liên hệ với Admin !'));exit();}
    if($db->num_rows($sql_products) != 1){
        echo json_encode(array('msg' => "Tài khoản không tồn tại trên hệ thống !"));exit();}
    if (!$id) {
        echo json_encode(array('msg' => "Bạn chưa chọn tài khoản !"));exit();}
    if($settings['status'] != 1 && !is_admin()){
        echo json_encode(array('msg' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));exit();}
    if ($products['status'] != 0) {
        echo json_encode(array('msg' => "Tài khoản bạn chọn không tồn tại hoặc đã bị mua bởi người khác !"));exit();}
    if ($accounts['cash'] < $price ) {
        echo json_encode(array('msg' => "Bạn không đủ tiền để thanh toán, vui lòng nạp thêm !"));exit();}

    //Đủ điều kiện
        $db->query("UPDATE `products` SET `status` = '1' WHERE `id` = '{$id}' LIMIT 1");// status
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}' WHERE `username` = '{$iduser}'");//trừ tiền
        $db->query("INSERT INTO `history_buy` (username,name,id_products,price,time,date,type) VALUES ('$iduser','$name','$id','$price','$time_now','$date_now',0)");// lịch sử
            echo json_encode(array('status' => "success", 'msg' => $info_account));
            
        // xóa ảnh
        /*
            $arr_delete = array();
            $avatar = glob("../files/thumb/".$id.".*");
            $arr_delete[] = $avatar[0];
            $gem = glob("../files/gem/".$id."-*");
            foreach ($gem as $link_gem) {
            $arr_delete[] = $link_gem;
            }
            $post = glob("../files/post/".$id."-*");
            foreach ($post as $link_post) {
            $arr_delete[] = $link_post;
            }
            foreach ($arr_delete as $link) {
            @unlink($link);
            }
*/
exit();
?> 