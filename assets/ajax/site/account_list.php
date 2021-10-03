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
$type_account = type_game(POST('type_account')) ? POST('type_account'):'free-fire';
$group = (int)POST("group");
$price = (int)POST("price");
$rank = (int)POST("rank");
$champs = POST("champs");
$skins = POST("skins");
$champs_count = (int)POST("champs_count");
$skins_count = (int)POST("skins_count");
$where = "`status` = '0' AND `type_account` = '".$type_account."' ";

  //lọc giá
    if ($price == 1){
      $where .= "AND `price` <= 50000 ";
    }elseif($price == 2) {
      $where .= "AND `price` BETWEEN 50000 AND 200000 ";
    }elseif($price == 3) {
      $where .= "AND `price` BETWEEN 200000 AND 500000 ";
    }elseif($price == 4) {
      $where .= "AND `price` BETWEEN 500000 AND 1000000 ";
    }elseif($price == 5) {
      $where .= "AND `price` >= 1000000 ";
    }
  //lọc rank
    if (!empty($rank)) {
    $where .= "AND `rank` >= '{$rank}' ";
    }    
    if (!empty($champs)) {
    $where .= "AND `champs` LIKE '%$champs%' ";
    }   
    if (!empty($skins)) {
    $where .= "AND `skins` LIKE '%$skins%' ";
    }
    if (!empty($champs_count)) {
    $where .= "AND `champs_count` >= $champs_count ";
    }
    if (!empty($skins_count)) {
    $where .= "AND `skins_count` >= $skins_count ";
    }
  //lọc sắp xếp
    if($group == 1) {
      $group = "`id` DESC ";
    }elseif($group == 2) {
      $group = "`price` DESC ";
    }elseif($group == 3) {
      $group = "`price` ASC ";
    }elseif($group == 4) {
      $group = "`champs_count` DESC ";
    }elseif($group == 5) {
      $group = "`champs_count` ASC ";
    }elseif($group == 6) {
      $group = "`skins_count` DESC ";
    }elseif($group == 7) {
      $group = "`skins_count` ASC ";
    }elseif($group == 8) {
      $group = "`rank` DESC ";
    }elseif($group == 9) {
      $group = "`rank` ASC ";
    }else{
      $group = "`date_posted` DESC ";
    }


$total_record = $db->fetch_row("SELECT COUNT(id) FROM `products` WHERE $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `products` WHERE $where ORDER BY $group LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record > 0){?>
<div class="row row-flex  item-list">
<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>

<div class="col-sm-6 col-md-3">
    <div class="classWithPad">
        <div class="image">
            <a href="/accounts/<?=$data['id']?>.html">
                <img src="<?=thumb($data['id']); ?>">
                <span class="ms">MS: <?=$data['id']?></span>
            </a>
        </div>
        <div class="description">
            <?=mb_substr($data['note'], 0, 37);?><?=strlen($data['note']) > 37 ? '...':'';?>
        </div>
        <div class="attribute_info">
            <div class="row">
            <?php if($data['type_account'] == 'lien-quan'):?>
                <div class="col-xs-6 a_att">
                    Tướng: <b><?=$data['champs_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    Trang Phục: <b><?=$data['skins_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    Bảng Ngọc: <b><?=$data['gem_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    Rank: <b> <?=string_rank($data['rank']);?></b>
                </div>
            <?php else:?>
                <div class="col-xs-6 a_att">
                    Skin súng: <b><?=$data['champs_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    Trang Phục: <b><?=$data['skins_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    PET: <b><?=$data['gem_count'];?></b>
                </div>
                <div class="col-xs-6 a_att">
                    Rank: <b> <?=string_rank($data['rank']);?></b>
                </div>
            <?php endif;?>
            </div>
        </div>
        <div class="a-more">
            <div class="row">
                <div class="col-xs-6">
                    <div class="price_item">
                        <?=number_format($data['price']);?>đ
                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="view">
                        <a href="/accounts/<?=$data['id']?>.html">CHI TIẾT</a>
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




