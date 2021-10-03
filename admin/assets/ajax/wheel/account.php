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
if(!is_admin()){die();}

$page = (int)POST("page");
$username = POST("username_s");
$type = POST("type_s");
$where = "status = '0' AND `iduser` = '' ";

if (!empty($type)) {
$where .= "AND `type` = '".$type."'";
}
if (!empty($username)) {
$where .= "AND `username` LIKE '%$username%'";
}


$total_record = $db->fetch_row("SELECT COUNT(id) FROM `wheel` WHERE ".$where." LIMIT 1");
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
    $sql_get = "SELECT * FROM `wheel` WHERE ".$where." ORDER BY `id` DESC LIMIT ".$paging->getConfig()['start'].", ".$paging->getConfig()['limit'];

// Nếu có 
if ($total_record){?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th class="text-center">Mã ID</th>
                                        <th class="text-center">Loại acc</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Thao tác</th>
                                    </thead>
                                    <tbody>
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                                        <tr>
                                            <td class="text-center"><?=$data["id"]; ?></td>
                                            <td class="text-center"><?=info_wheel($data["type"])['msg']; ?></td>
                                            <td class="text-center"><?=$data["username"]; ?></td>
                                            <td class="text-center"><?=$data["password"]; ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" title="Xóa" onclick="del_wheel(<?=$data["id"]; ?>);"><span class="ti-trash"></span></button>
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




