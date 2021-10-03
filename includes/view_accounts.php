<?php
$id = GET('id');
$products= $db->fetch_assoc("SELECT * FROM `products` WHERE `id` = '{$id}'", 1);

//check ID products
if($db->num_rows($sql_products) == 0){
    new Redirect($_DOMAIN);
}

    //tạo json tướng
    $list_champ = $db->fetch_assoc("SELECT * FROM lq_champion ORDER BY name DESC",0); 
    $rows = array();
    foreach ($list_champ as $r) { 
        $rows[] = $r;}
    $data_champ = json_decode(json_encode($rows), true);
    $champ = text($products["champs"]);

    //tạo json trang phục
    $list_skin = $db->fetch_assoc("SELECT * FROM lq_skin ORDER BY name DESC",0); 
    $rows = array();
    foreach ($list_skin as $r) { 
        $rows[] = $r;}
    $data_skin = json_decode(json_encode($rows), true);
    $skin = text($products["skins"]);

?>
<div class="c-layout-page">
<div class="m-t-20 visible-sm visible-xs"></div>
<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
    <div class="container">
        <div class="c-shop-product-details-4">
            <div class="row">
                <div class="col-md-4 m-b-20">
                    <div class="c-product-header">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">#<?=$products['id'];?></h3>
                            <span class="c-font-red c-font-bold">Tài khoản <?=type_game($products['type_account']);?></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 visible-sm visible-xs visible-sm">
                    <div class="text-center m-t-20">
                        <img class="img-responsive img-thumbnail" src="<?=thumb($products['id']); ?>">
                    </div>
                    <div class="c-product-meta">
                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                        <div class="row">
                            <?php if($products['type_account'] == 'lien-quan'){?>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Số tướng: <span class="c-font-red"><?=$products['champs_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang phục: <span class="c-font-red"><?=$products['skins_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Bảng ngọc: <span class="c-font-red"><?=$products['gem_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red"><?=string_rank($products['rank']); ?></span></p>
                            </div>
                            <?php }else{?>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Skin súng: <span class="c-font-red"><?=$products['champs_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang phục: <span class="c-font-red"><?=$products['skins_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Số PET: <span class="c-font-red"><?=$products['gem_count'];?></span></p>
                            </div>
                            <div class="col-sm-4 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red"><?=string_rank($products['rank']); ?></span></p>
                            </div>
                            <?php }?>
                            <?php if($products['note'] != ""){?>
                            <div class="col-sm-6 col-xs-12 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"><?=$products['note'];?></span></p>
                            </div>
                            <?php }?>
                        </div>
                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
                            <?=number_format($products["price"]); ?> Đ<br/>
                            <font color="red">
                            <?=number_format($products["price"]*0.8); ?> ATM
                            </font>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">
                            <div class="c-content-title-1">
                            <?php if($products['status'] == 0){?>
                                <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/purchase/buy/<?=$products['id'];?>.html">Mua ngay</button>
                                <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/user/recharge.html">Nạp thẻ cào</a>
                            <?php }else{?>
                                <b class="btn c-btn btn-lg c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20">Đã hết hàng</b>
                            <?php }?>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="c-product-meta visible-md visible-lg">
                <div class="c-content-divider">
                    <i class="icon-dot"></i>
                </div>
                <div class="row">
                    <?php if($products['type_account'] == "lien-quan"){?>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Số tướng: <span class="c-font-red"><?=$products['champs_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang phục: <span class="c-font-red"><?=$products['skins_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Bảng ngọc: <span class="c-font-red"><?=$products['gem_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red"><?=string_rank($products['rank']); ?></span></p>
                    </div>
                    <?php }else{?>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Skin súng: <span class="c-font-red"><?=$products['champs_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang phục: <span class="c-font-red"><?=$products['skins_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Bảng ngọc: <span class="c-font-red"><?=$products['gem_count'];?></span></p>
                    </div>
                    <div class="col-sm-3 col-xs-6 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red"><?=string_rank($products['rank']); ?></span></p>
                    </div>
                    <?php }?>
                    <?php if($products['note'] != ""){?>
                    <div class="col-sm-6 col-xs-12 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"><?=$products['note'];?></span></p>
                    </div>
                    <?php }?>
                </div>
                <div class="c-content-divider">
                    <i class="icon-dot"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container m-t-20">
        <div class="c-content-tab-4 c-opt-3" role="tabpanel">
            <ul class="nav nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#info" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="true">THÔNG TIN</a>
                </li>
                <?php if($products['type_account'] == 'lien-quan'){?>
                <li role="presentation" class="">
                    <a href="#champ" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="false"><?=$products['champs_count'];?> TƯỚNG</a>
                </li>
                <li role="presentation" class="">
                    <a href="#skin" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="false"><?=$products['skins_count'];?> TRANG PHỤC</a>
                </li>
                <?php }?>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="info">
                    <ul class="c-tab-items" style="padding-right:5px;padding-left: 5px;">
                        <li class="text-center m-t-20">
                        <?php
	                    $arr_info = glob($root."/assets/files/post/".$id."-*");
    					if($arr_info){
    					 foreach ($arr_info as $inf) { 
		                	$img = str_replace($root,"",$inf);		
    	                	$name = str_replace($root."/assets/files/post/","",$inf);?>
		                <img class="img-responsive img-thumbnail" src="<?=$img; ?>" style="width:100%;">
		                <?php }} ?>
                            
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="champ">
                    <ul class="c-tab-items" style="padding-right:5px;padding-left: 5px;">
                        <li class="text-center">
                            <div class="form-inline m-b-20">
                                <div class="input-group c-square">
                                <?php if(!empty($products["champs"])){
                                    foreach ($data_champ as $list){
                                    if (in_array_r(strtolower(trim($list['name'])), $champ)) {?>
                                        <img width="100" src="/assets/images/lq_champion/<?=$list['img_name']; ?>" alt="<?=$list['name']; ?>" class="img-circle" title="<?=$list['name']; ?>">
                                <?php }}}else{echo '<p><span>Chưa được cập nhật dữ liệu tướng</span></p> ';}?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="skin">
                    <ul class="c-tab-items" style="padding-right:5px;padding-left: 5px;">
                        <li class="gallery text-center">
                            <div class="form-inline m-b-20">
                                <div class="input-group c-square">
                                <?php if(!empty($products["skins"])){
                                    foreach ($data_skin as $list){
                                    if (in_array_r(strtolower(trim($list['name'])), $skin)) {?>
                                    <img width="100" src="/assets/images/lq_skin/<?=$list['img_name']; ?>" alt="<?=$list['name']; ?>" class="img-circle" title="<?=$list['name']; ?>">
                                <?php }}}else{echo '<p><span>Chưa được cập nhật dữ liệu trang phục</span></p>';}?>
                                </div>
                            </div>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
$sql_get = "SELECT * FROM `products` WHERE `status` = '0' AND `id` != '{$id}' AND `type_account` = '".$products['type_account']."' ORDER BY RAND() LIMIT 8";
if ($db->fetch_row("SELECT COUNT(id) FROM `products` WHERE `status` = '0' AND `id` != '{$id}' AND `type_account` = '".$products['type_account']."' LIMIT 1") > 0):?>
<div class="container m-t-20 ">
    <div class="game-item-view" style="margin-top: 40px">
        <div class="c-content-title-1">
            <h3 class="c-center c-font-uppercase c-font-bold">Tài khoản liên quan</h3>
            <div class="c-line-center c-theme-bg"></div>
        </div>
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
                        <?=substr($data['note'], 0, 37);?><?=strlen($data['note']) > 37 ? '...':'';?>
                    </div>
                    <div class="attribute_info">
                        <div class="row">
                            <div class="col-xs-6 a_att">
                                Sin súng: <b><?=$data['champs_count'];?></b>
                            </div>
                            <div class="col-xs-6 a_att">
                                Trang Phục: <b><?=$data['skins_count'];?></b>
                            </div>
                            <div class="col-xs-6 a_att">
                                Số PET: <b><?=$data['gem_count'];?></b>
                            </div>
                            <div class="col-xs-6 a_att">
                                Rank: <b> <?=string_rank($data['rank']);?></b>
                            </div>
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
    </div>
</div>
<?php endif;?>