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
<div class="alert alert-warning">Bạn không có quyền xem thông tin này !
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
$id_products = $input->input_post("id_products");
$where = "id != '0' AND type = '0' ";

if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}
if (!empty($id_products)) {
$where .= "AND id_products LIKE '%$id_products%' ";
}
$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `history_buy` WHERE $where ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>Mã số</th>
                                        <th>Game</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Thông tin</th>
                                        <th>Giá bán</th>
                                        <th>Thời gian</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){ 
    $products = $db->fetch_assoc("SELECT * FROM `products` WHERE id = '".$data['id_products']."' LIMIT 1", 1); 
?>
                                        <tr>
                                            <td><a href="/accounts/<?=$data["id_products"]; ?>.html" target="_blank"><?=$data["id_products"]; ?></a></td>
                                            <td><?=type_game($products["type_account"]); ?></td>
                                            <td><?=$data["username"]; ?></td>
                                            <td><?=$data["name"]; ?></td>
                                            <td>
                                                TK: <?=$products["username"]; ?><br/>
                                                MK: <?=$products["password"]; ?><br/>
                                            <?php if($products["sdt"] != ""){?>    
                                                SĐT: <?=$products["sdt"]; ?><br/>
                                            <?php }?>
                                            <?php if($products["cmnd"] != ""){?>
                                                CMND: <?=$products["cmnd"]; ?><br/>
                                            <?php }?>
                                            <?php if($products["email"] != ""){?>
                                                Email: <?=$products["email"]; ?>
                                            <?php }?>    
                                            </td>    
                                            <td><?=number_format($data['price'], 0, '.', '.'); ?>đ</td>
                                            <td><?=date("d-m-Y H:m:i",$data["time"]); ?></td>
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
<div class="alert alert-info">Không có thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




