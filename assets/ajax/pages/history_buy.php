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
$get_info = new Info;
if (!is_client()) {
?>
<div class="alert alert-warning">Vui lòng đăng nhập để xem thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php exit;}elseif(!$_POST){exit;}

$iduser = $accounts['username'];
$page = POST('page');
$id = POST('id');
$where = "`username` = '{$iduser}' ";
$total = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE $where LIMIT 1");

if (!empty($id)) {
$where .= "AND id_products = '{$id}' ";
}

if($total == 0){
echo '<div class="alert alert-danger">Bạn chưa có cuộc giao dịch nào !</div>';exit();}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE $where LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "20",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get_list_mem = "SELECT * FROM `history_buy` WHERE $where ORDER BY `time` DESC  LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
    <div style="overflow-x:auto;">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th align="center">Mã số</th>
                    <th align="center">Loại TK</th>
                    <th align="center">Giá bán</th>
                    <th align="center">Tài khoản</th>
                    <th align="center">Mật khẩu</th>
                    <th align="center">Thời gian</th>
                </tr>
            </tbody>

<?php
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){
   $products = $db->fetch_assoc("SELECT * FROM `products` WHERE id = '".$data['id_products']."' LIMIT 1", 1);
   $acc_random = $db->fetch_assoc("SELECT * FROM `acc_random` WHERE `iduser` = '{$iduser}' AND `id` = '".$data['id_random']."' LIMIT 1", 1);
?>
            <tbody>
                <tr>
                    <td><?=$data['id_products'] != 0 ? $products['id']:$acc_random['id'] ; ?></td>
                    <td><?=$data['id_products'] != 0 ? type_game($products['type_account']): 'Random '.type_random($acc_random['type'])['name']; ?></td>
                    <td><?=number_format($data['price'], 0, '.', '.'); ?>đ</td>
                    <td><?=$data['id_products'] != 0 ? $products['username']:$acc_random['username'] ; ?></td>
                    <td><?=$data['id_products'] != 0 ? $products['password']:$acc_random['password'] ; ?></td>
                    <td><?=date("d-m-Y H:i", $data['time']); ?></td>
                </tr>
            </tbody>
<?php }?>
        </table>
    </div>    
<?php                     
echo $paging->html_pages(); // page
}else {
?>
<div class="alert alert-info">Không tìm thấy thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




