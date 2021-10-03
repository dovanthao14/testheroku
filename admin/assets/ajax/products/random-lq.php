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

$input = new Input;
$page = (int)$input->input_post("page");
$username = $input->input_post("username_s");
$id_acc = $input->input_post("id_acc");
$type = $input->input_post("type_s");
$where = "status = '0' ";

if (!empty($type)) {
$where .= "AND type = '{$type}'";
}
if (!empty($username)) {
$where .= "AND username LIKE '%$username%'";
}
if (!empty($id_acc)) {
$where .= "AND id = '{$id_acc}'";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM acc_random WHERE $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `acc_random` WHERE $where ORDER BY `id` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Loại</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Mật khẩu</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){ 
?>
                                        <tr>
                                            <td><?=$data["id"]; ?></td>
                                            <td><?=type_random($data["type"])['name'].' '.$settings['rd_'.$data["type"]]*0.001.'K';?></td>
                                            <td><?=$data["username"]; ?></td>
                                            <td><?=$data["password"]; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary" title="Xóa" onclick="del_random(<?=$data["id"]; ?>);"><span class="ti-trash"></span></button> 
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
<div class="alert alert-info">Không có tài khoản nào
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




