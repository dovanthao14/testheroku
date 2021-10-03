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
if(!is_admin()){
?>
<div class="alert alert-warning">Bạn không có quyền xem thông tin này
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
exit;
}elseif(!$_POST){
exit;
}

$input = new Input;
$page = (int)$input->input_post("page");
$username = $input->input_post("username");
$seri = $input->input_post("seri");
$pin = $input->input_post("pin");
$where = "id != '0' ";

if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}
if (!empty($seri)) {
$where .= "AND seri LIKE '%$seri%' ";
}
if (!empty($pin)) {
$where .= "AND pin LIKE '%$pin%' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_card WHERE $where LIMIT 1");
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
    $sql_get_list_mem = "SELECT * FROM `history_card` WHERE $where ORDER BY `time` DESC  LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                    <th align="center">ID</th>
                    <th align="center">Username</th>
                    <th align="center">Name</th>
                    <th align="center">Nhà mạng</th>
                    <th align="center">Serial</th>
                    <th align="center">Mã thẻ</th>
                    <th align="center">Mệnh giá</th>
                    <th align="center">Thực nhận</th>
                    <th align="center">Trạng thái</th>
                    <th align="center">Thời gian</th>
            <thead>
            <tbody>

<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){ 
?>
                <tr>
                    <td><?=$data['id']; ?></td>
                    <td><?=$data['username']; ?></td>
                    <td><?=$data['name']; ?></td>
                    <td><?=$db->string_card($data["type_card"]); ?></td>
                    <td><?=$data['seri']; ?></td>
                    <td><?=$data['pin']; ?></td>
                    <td><?=number_format($data['count_card'], 0, '.', '.'); ?>đ</td>
                    <td><?=number_format($data['cash_nhan'], 0, '.', '.'); ?>đ</td>
                    <td>
                        <p style="color:<?=color_status($data['status']); ?>;font-weight:bold;"><?=status_card($data['status']); ?></p>
                        <p style="font-size: 12px;"><?=$data['notice'];?></p>
                    </td>
                    <td><?=$data['time']; ?></td>
                </tr>
<?php 
$i++;
}
?>
            </tbody>
        </table>
    </div>
                    
<?php                     
echo $paging->html_list(); // page
}else {
?>
<div class="alert alert-info">Không tìm thấy thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




