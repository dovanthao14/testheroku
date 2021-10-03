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

$page = (int)POST("page");
$type = (int)POST('type');

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `acc_random` WHERE `status` = '0' AND `type` = '{$type}' LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "36",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get = "SELECT * FROM `acc_random` WHERE `status` = '0' AND `type` = '{$type}' ORDER BY RAND() LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){?>
<div class="row row-flex  item-list">
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>

<div class="col-sm-6 col-md-3">
    <div class="classWithPad">
        <div class="image">
                <img src="<?=type_random($type)['img'] ? type_random($type)['img']:'/assets/images/thumb/random-'.$type.'.jpg';?>">
                <span class="ms">MS: <?=$data['id']?></span>
        </div>
        <div class="description">
            <?=type_random($type)['name'].' '.type_random($type)['price']*0.001.'K';?>
        </div>
        <div class="attribute_info">
            <div class="row">
            <?php if(type_random($type)['name'] == 'Free Fire'):?>
                <div class="col-xs-6 a_att">
                    Skin súng: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    Trang Phục: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    PET: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    Rank: <b>??</b>
                </div>
            <?php elseif(type_random($type)['name'] == 'Liên Quân'):?>
                <div class="col-xs-6 a_att">
                    Số Tướng: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    Trang Phục: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    Bảng Ngọc: <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    Rank: <b>??</b>
                </div>
            <?php else:?>
                <div class="col-xs-6 a_att">
                    <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    <b>??</b>
                </div>
                <div class="col-xs-6 a_att">
                    <b>??</b>
                </div>
            <?php endif;?>
            </div>
        </div>
        <div class="a-more">
            <div class="row">
                <div class="col-xs-6">
                    <div class="price_item">
                        <?=number_format(type_random($type)['price']);?>đ
                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="view">
                        <a href="/random/<?=$data['id']?>.html">MUA NGAY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php }?>
</div>
<?php
echo $paging->html_site(); // page
}else {
?>
<div class="alert alert-danger">Không có tài khoản nào !
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




