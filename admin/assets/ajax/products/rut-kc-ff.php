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
<div class="alert alert-warning">Vui lòng đăng nhập để xem thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
exit;
}elseif(!$_POST){
exit;
}

$page = (int)POST("page");
$username = POST("username");
$where = "status = '0' ";

if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_dff WHERE  $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `history_dff` WHERE $where ORDER BY `time` ASC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>ID Ingame</th>
                                        <th>Số kim cương</th>
                                        <th>Thời gian</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){ 
?>
                                        <tr>
                                            <td><?php echo $data["id"]; ?></td>
                                            <td><?php echo $data["username"]; ?></td>
                                            <td><?php echo $data["name"]; ?></td>
                                            <td><?php echo $data["id_ingame"]; ?></td>
                                            <td><?php echo $data["soluong"]; ?></td>
                                            <td><?php echo $data["time"]; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-success" title="Thành công" onclick="status_dff('<?php echo $data["id"]; ?>','1','<?=status_card(1); ?>');">Thành công</button> 
                                            <button type="button" class="btn btn-danger" title="Thẻ sai" onclick="status_dff('<?php echo $data["id"]; ?>','5','<?=status_card(5); ?>');">Sai ID Ingame</button>
                                            <button type="button" class="btn btn-warning" title="Bảo trì" onclick="status_dff('<?php echo $data["id"]; ?>','4','<?=status_card(4); ?>');">Bảo trì</button> 
                                            </td>
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
<div class="alert alert-info">Không có yêu cầu nào
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




