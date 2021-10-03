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

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `card` WHERE `id` != '0' LIMIT 1");
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
    $sql_get = "SELECT * FROM `card` WHERE `id` != '0' ORDER BY `id` ASC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th class="text-center">Mã ID</th>
                                        <th class="text-center">Loại thẻ</th>
                                        <th class="text-center">Nạp auto</th>
                                        <th class="text-center">Chiết khấu</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Thao tác</th>
                                    </thead>
                                    <tbody>
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                                        <tr>
                                            <td class="text-center"><?=$data["id"]; ?></td>
                                            <td class="text-center"><?=$data["name"]; ?></td>
                                            <td class="text-center"><?=$data['auto'] != 0 ? 'Có' : 'Không'; ?></td>
                                            <td class="text-center"><?=100-$data["ck"]; ?>%</td>
                                            <td class="text-center"><?=$data['status'] != 0 ? '<b style="color:green;">Hoạt động</b>' : '<b>Bảo trì</b>'; ?></td>
                                            <td class="text-center">
                                                <a href="/admin/card/edit/<?=$data["id"]; ?>"><button type="button" class="btn btn-primary btn-xs" title="Chỉnh sửa"><span class="ti-pencil-alt2"></span></button></a> 
                                                <button type="button" class="btn btn-primary btn-xs" title="Xóa" onclick="del_card('<?=$data["id"]; ?>','3','<?=$data["name"]; ?>');"><span class="ti-trash"></span></button> 
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




