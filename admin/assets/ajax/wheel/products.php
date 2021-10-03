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
$id = POST("id_s");
$where = "status = '0' AND `iduser` != '' ";

if (!empty($type)) {
$where .= "AND `type` = '".$type."'";
}
if (!empty($id)) {
$where .= "AND `id` = '".$id."'";
}
if (!empty($username)) {
$where .= "AND `iduser` LIKE '%$username%'";
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
    $sql_get = "SELECT * FROM `wheel` WHERE ".$where." ORDER BY `id` ASC LIMIT ".$paging->getConfig()['start'].", ".$paging->getConfig()['limit'];

// Nếu có 
if ($total_record){?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th class="text-center">Mã ID</th>
                                        <th class="text-center">ID Username</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Loại acc</th>
                                        <th class="text-center">Thao tác</th>
                                    </thead>
                                    <tbody>
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){
$data['name'] = $db->fetch_assoc("SELECT * FROM `accounts` WHERE `username` = '".$data['iduser']."' LIMIT 1", 1)['name'];
?>
                                        <tr>
                                            <td class="text-center"><?=$data["id"]; ?></td>
                                            <td class="text-center"><?=$data["iduser"]; ?></td>
                                            <td class="text-center"><?=$data["name"]; ?></td>
                                            <td class="text-center"><?=info_wheel($data["type"])['msg']; ?></td>
                                            <td class="text-center">
                                                <a href="/admin/wheel/edit/<?=$data["id"]; ?>"><button type="button" class="btn btn-primary btn-xs" title="xử lý"><span class="ti-pencil-alt2"></span> xử lý</button></a>
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
<div class="alert alert-info">Không có yêu cầu nào !
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




