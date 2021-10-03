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
$username = POST("username");
$id = POST("id");
$where = "`id` != '0' ";

if (!empty($id)) {
$where .= "AND `id` = '".$id."'";
}
if (!empty($username)) {
$where .= "AND `username` = '".$username."'";
}


$total_record = $db->fetch_row("SELECT COUNT(id) FROM `history_wheel` WHERE ".$where." LIMIT 1");
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
    $sql_get = "SELECT * FROM `history_wheel` WHERE ".$where." ORDER BY `id` DESC LIMIT ".$paging->getConfig()['start'].", ".$paging->getConfig()['limit'];

// Nếu có 
if ($total_record){?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th class="text-center">Mã ID</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phần thưởng</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Thời gian</th>
                                    </thead>
                                    <tbody>
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){
    $info = '';
    if($data['id_wheel'] != 0){
        $sql_wheel =  "SELECT * FROM `wheel` WHERE `id` = '".$data['id_wheel']."' LIMIT 1";
        if ($db->num_rows($sql_wheel) > 0){
            $wheel = $db->fetch_assoc($sql_wheel, 1);
            $info = $wheel['status'] == 0 ? '<span style="color: #0082ff;"> (Chờ xử lý)</span>':'<br/>TK: <b>'.$wheel['username'].'</b>, MK: <b>'.$wheel['password'].'</b><br/>[<a href="/admin/wheel/edit/'.$data['id_wheel'].'">Sửa Thông Tin Nick</a>]';
        }
    }
?>
                                        <tr>
                                            <td class="text-center"><?=$data["id"]; ?></td>
                                            <td class="text-center"><?=$data["username"]; ?></td>
                                            <td class="text-center"><?=$data["name"]; ?></td>
                                            <td class="text-center"><?=$data["prize"].$info; ?></td>
                                            <td class="text-center">
                                            <?php if($data['id_wheel'] != 0 && $wheel['status'] == 0){?>
                                                <p style="color:blue;font-weight:bold;"><a href="/admin/wheel/edit/<?=$data['id_wheel'];?>">Xử lý luôn</a></p>
                                            <?php }else{?>
                                                <p style="color:green;font-weight:bold;">Hoàn Thành</p>
                                            <?php }?>
                                            </td>
                                            <td class="text-center"><?=$data["time"]; ?></td>
                                        </tr>



<?php }?>
                        </tbody>
                        </table>
                    </div>
                    
<?php
echo $paging->html_list(); // page
}else {
?>
<div class="alert alert-info">Không có dữ liệu !
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




