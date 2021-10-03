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

$input = new Input;
$page = (int)POST("page");
$username = POST("username");
$id_acc = POST("id_acc");
$where = "status = '0' AND type_account = 'lien-quan' ";
if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}
if (!empty($id_acc)) {
$where .= "AND id = '$id_acc' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM products WHERE $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `products` WHERE $where ORDER BY `date_posted` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>Mã số</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Giá tiền</th>
                                        <th>Hạng</th>
                                        <th>Skin</th>
                                        <th>Tướng</th>
                                        <th>B.ngọc</th>
                                        <th>Ngày đăng</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                                        <tr>
                                            <td><?=$data["id"]; ?></td>
                                            <td><?=$data["username"]; ?></td>
                                            <td><?=number_format($data["price"], 0, '.', '.'); ?>đ</td>
                                            <td><?=string_rank($data["rank"]); ?></td>
                                            <td><?=$data["skins_count"]; ?></td>
                                            <td><?=$data["champs_count"]; ?></td>
                                            <td><?=$data["gem_count"]; ?></td>
                                            <td><?=$data["date_posted"]; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-xs" title="Đẩy lên đầu" onclick="uptime_delacc('<?=$data["id"]; ?>','Đẩy lên đầu','uptime');"><i class="ti-arrow-up"></i></button>
                                            <a href="/admin/lien-quan/edit/<?=$data["id"]; ?>"><button type="button" class="btn btn-primary btn-xs" title="Chỉnh sửa"><span class="ti-pencil-alt2"></span></button></a> 
                                            <button type="button" class="btn btn-primary btn-xs" title="Xóa" onclick="uptime_delacc('<?=$data["id"]; ?>','Xóa acc','del_acc');"><span class="ti-trash"></span></button> 
                                            </td>
                                        </tr>



<?php }?>
                        </tbody>
                        </table>
                    </div>
                    
<?php
echo $paging->html_list(); // page
}else {
?>
<div class="alert alert-info">Không có tài khoản nào !
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




