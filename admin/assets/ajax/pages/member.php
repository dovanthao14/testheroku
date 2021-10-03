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
<?php exit;}elseif(!$_POST){exit;}

$page = (int)POST("page");
$name = POST("name");
$username = POST("username");
$email = POST("email");
$phone = POST("phone");
$where = "id != '0' ";

if (!empty($name)) {
$where .= "AND `name` LIKE '%$name%' ";
}
if (!empty($username)) {
$where .= "AND `username` LIKE '%$username%' ";
}
if (!empty($phone)) {
$where .= "AND `phone` LIKE '%$phone%' ";
}
if (!empty($email)) {
$where .= "AND `email` LIKE '%$email%' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `accounts` WHERE $where LIMIT 1");
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
    $sql_get_list_mem = "SELECT * FROM `accounts` WHERE $where ORDER BY `datetime` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Cash</th>
                                        <th>Thời gian</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){ 
?>
                            <tr>
                                    <td><p style="<?=($data['block'] > 0) ? "color: black;font-weight: bold;":"";?>"><?=$data['id'];?></p></td>
                                    <td><p style="<?=($data['block'] > 0) ? "color: black;font-weight: bold;":"";?>"><?=$data['name'];?></p></td>
                                    <td><p style="<?=($data['block'] > 0) ? "color: black;font-weight: bold;":"";?>"><?=$data['username'];?></p></td>
                                    <td><?=number_format($data['cash'], 0, '.', '.');?> <sup>đ</sup></td>
                                    <td><?=$data['datetime'];?></td>
                                    <td><div class="btn-group"><a href="/admin/member/edit/<?=$data['username'];?>" target="_blank">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip">Chỉnh sửa</button>
                                    </a></div></td>
                            </tr>



<?php }?>
                        </tbody>
                        
                        </table>
                    </div>
                    
<?php
echo $paging->html_list(); // page
}else {
?>
<div class="alert alert-info">Không tìm thấy thành viên
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




