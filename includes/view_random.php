<?php
$id = (int)GET('id');
$sql_acc_random = "SELECT * FROM `acc_random` WHERE `id` = '{$id}'";


//check ID acc_random
if($db->num_rows($sql_acc_random) == 0){
    new Redirect($_DOMAIN);die();
}else{
$acc_random= $db->fetch_assoc($sql_acc_random, 1);
$type = $acc_random['type'];
$img = type_random($type)['img'] ? type_random($type)['img']:'/assets/images/thumb/random-'.$type.'.jpg';
}

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
                            <h3 class="c-font-uppercase c-font-bold">#<?=$acc_random['id'];?></h3>
                            <span class="c-font-red c-font-bold">Random <?=type_random($type)['name'].' '.type_random($type)['price']*0.001.'K';?></span>
                        </div>
                    </div>
                </div>
            <?php /*
                <div class="col-sm-12 visible-sm visible-xs visible-sm">
                    <div class="text-center m-t-20">
                        <img class="img-responsive img-thumbnail" src="/assets/images/random-<?=$type;?>.jpg">
                    </div>
                    <div class="c-product-meta">
                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold"><span class="c-font-red"><?=random_notify($type);?></span></p>
                            </div>
                        </div>
                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                    </div>
                </div>
            */?>    
                <div class="col-md-4">
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
                            <?=number_format(type_random($type)['price']);?> Đ<br/>
                            <font color="red">
                            <?=number_format(type_random($type)['price']*0.8);?> ATM
                            </font>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">
                            <div class="c-content-title-1">
                            <?php if($acc_random['status'] == 0){?>
                                <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/purchase/random/<?=$acc_random['id'];?>.html">Mua ngay</button>
                                <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/user/recharge.html">Nạp thẻ cào</a>
                            <?php }else{?>
                                <b class="btn c-btn btn-lg c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20">Đã hết hàng</b>
                            <?php }?>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="c-product-meta">
                <div class="c-content-divider">
                    <i class="icon-dot"></i>
                </div>
                <div class="row"> 
                    <div class="col-sm-12 col-xs-12 c-product-variant">
                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold"><span class="c-font-red"><?=type_random($type)['content'];?></span></p>
                    </div>
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
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="info">
                    <ul class="c-tab-items" style="padding-right:5px;padding-left: 5px;">
                        <li class="text-center m-t-20">
                            <img class="img-responsive img-thumbnail" src="<?=$img;?>" style="width:100%;">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
$sql_get = "SELECT * FROM `acc_random` WHERE `status` = '0' AND `id` != '{$id}' AND `type` = '{$type}' ORDER BY RAND() LIMIT 8";
if ($db->fetch_row("SELECT COUNT(id) FROM `acc_random` WHERE `status` = '0' AND `id` != '{$id}' AND `type` = '{$type}' LIMIT 1") > 0):?>
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
                        <a href="/random/<?=$data['id']?>.html">
                            <img src="<?=$img;?>">
                            <span class="ms">MS: <?=$data['id']?></span>
                        </a>
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
    </div>
</div>
<?php endif;?>