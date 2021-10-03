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
$page = (int)POST('page');
$where = "`username` = '{$iduser}' ";
$total = $db->fetch_row("SELECT COUNT(id) FROM history_wheel WHERE $where LIMIT 1");

if($total == 0){
echo '<div class="alert alert-danger">Bạn chưa có cuộc giao dịch nào !</div>';exit();}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_wheel WHERE $where LIMIT 1");
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
    $sql_get_list_mem = "SELECT * FROM `history_wheel` WHERE $where ORDER BY `time` DESC  LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
    <div style="overflow-x:auto;">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th align="center">ID</th>
                    <th align="center">Phần thưởng</th>
                    <th align="center">Thời gian</th>
                </tr>
            </tbody>

<?php
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){
  $info = '';
  if($data['id_wheel'] != 0){
    $sql_wheel =  "SELECT * FROM `wheel` WHERE `id` = '".$data['id_wheel']."' LIMIT 1";
    if ($db->num_rows($sql_wheel) > 0){
      $wheel = $db->fetch_assoc($sql_wheel, 1);
      $info = $wheel['status'] == 0 ? '<span style="color: #0082ff;"> (Đang cập nhật nick...)</span>':'. <b>TK: <span style="color: #ff6b57;">'.$wheel['username'].'</span>, MK: <span style="color: #428de4;">'.$wheel['password'].'</span></b>';
    }
  }
?>
            <tbody>
                <tr>
                    <td><?=$data['id'];?></td>
                    <td><?=$data['prize'].$info;?></td>
                    <td><?=$data['time'];?></td>
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




