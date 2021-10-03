<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$count_products_ff = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `type_account` = 'free-fire'");
$count_products_ff_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `type_account` = 'free-fire' AND `status` != '0'")+653;
$count_products_lq = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `type_account` = 'lien-quan'");
$count_products_lq_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `type_account` = 'lien-quan' AND `status` != '0'")+426;
$count_card = $db->fetch_row("SELECT COUNT(*) FROM `history_card`")+0;
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box">
        <div id="slider" class="owl-theme section section-cate slideshow_full_width">
            <div id="slide_banner" class="owl-carousel">
                <?php
                    $arr_info = glob($root."/assets/images/banner/banner-*");
                    if($arr_info){
                        foreach ($arr_info as $inf) {
                        $img = str_replace($root,"",$inf);?>
                    <div class="item">
                        <a alt="banner">
                            <img src="<?=$img;?>">
                        </a>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    
    <div class="c-content-box c-size-md c-bg-white">
<?php
$luauytin = "SELECT * FROM `history_buy` where `id` != '0' order by id desc LIMIT 20";
if ($db->num_rows($luauytin) > 0):?>
        <div class="container c-margin-b-20">
		    <marquee style="border: 3px solid #ff6a00;font-weight: bold;background: #fff;padding: 4px;">
<?php foreach ($db->fetch_assoc($luauytin, 0) as $key => $data){?>
		        <span class="label label-info"><i class="fa fa-star"></i><?=$data['name'];?></span> vừa mua thành công tài khoản <?=$data['id_products'] > 0 ? '':'random';?> <b>#<?=$data['id_products'] > 0 ? $data['id_products']:$data['id_random'];?></b> với giá  <?=number_format($data['price']);?> <sup>VNĐ</sup>
<?php }?> 
		    </marquee>
        </div>
<?php endif;?>
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Danh mục game</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="row row-flex-safari game-list">
            <!--  BEGIN LIST GAME -->        
                <!--luckywheel-->
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/luckywheel" title="Free Fire" class="">
                                <img src="/assets/images/menu-game/vong-quay.jpg" alt="Free Fire">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/luckywheel" title="Free Fire">Vòng quay free fire 20k</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Vòng quay tài khoản VIP
                            </p>
                            <p>
                                Vòng quay kim cương khủng
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/luckywheel" title="Free Fire">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--rut kim cuong-->
            <?php 
                $i=4;
                //đếm số acc
                $count = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `type` = '".$i."'");
                $count_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '".$i."'");
                $img = type_random($i)['img'] ? type_random($i)['img']:'/assets/images/thumb/random-'.$i.'.jpg';
            echo 
            '<div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'" class="">
                                <img src="'.$img.'" alt="Thử vận may '.type_random($i)['name'].'">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'">'.type_random($i)['name'].' '.type_random($i)['price']*0.001.'K</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số tài khoản: '.number_format($count).'
                            </p>
                            <p>
                                Đã bán: '.number_format($count_buy+$buff[$i]).'
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
                
                <!--free fire-->
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/shop-game/free-fire.html" title="Free Fire" class="">
                                <img src="/assets/images/Anh/ACCFF.png" alt="Free Fire">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/shop-game/free-fire.html" title="Free Fire">Acc Free Fire</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số tài khoản: <?=number_format($count_products_ff);?>
                            </p>
                            <p>
                                Đã bán: <?=number_format($count_products_ff_buy);?>
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/shop-game/free-fire.html" title="Free Fire">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Liên Quân-->
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/shop-game/lien-quan.html" title="Free Fire" class="">
                                <img src="/assets/images/Anh/ACCLQ.jpg" alt="Free Fire">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/shop-game/lien-quan.html" title="Free Fire">Acc liên quân</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số tài khoản: <?=number_format($count_products_lq);?>
                            </p>
                            <p>
                                Đã bán: <?=number_format($count_products_lq_buy);?>
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/shop-game/lien-quan.html" title="Free Fire">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- END LIST GAME-->
            </div>
        <!-- End-->
        </div>
    </div>
    </div>
    <div class="c-content-box c-size-md c-bg-white">

    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Danh mục random</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="row row-flex-safari game-list">
            <!--  BEGIN LIST GAME -->
            <?php 
            $buff = array(
                1 => 879,
                2 => 589,
                3 => 256,
                4 => 463,
                5 => 1098,
                6 => 478,
                7 => 304,
                8 => 190,
                9 => 102
            );
            
            for ($i=1;$i<=9;$i++){
                if($i != 4){
                //đếm số acc
                $count = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `type` = '".$i."'");
                $count_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '".$i."'");
                $img = type_random($i)['img'] ? type_random($i)['img']:'/assets/images/thumb/random-'.$i.'.jpg';
            echo 
            '<div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'" class="">
                                <img src="'.$img.'" alt="Thử vận may '.type_random($i)['name'].'">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'">'.type_random($i)['name'].' '.type_random($i)['price']*0.001.'K</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số tài khoản: '.number_format($count).'
                            </p>
                            <p>
                                Đã bán: '.number_format($count_buy+$buff[$i]).'
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/random/'.type_random($i)['url'].'.html" title="Thử vận may '.type_random($i)['name'].'">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                }
            }?>
            
            
            
            
            <!-- END LIST GAME-->
            </div>
        <!-- End-->
        </div>
    </div>
    </div>


    <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                </div>

                <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                   <?=bbcode($settings['notify']);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
        <script>
            var noticeModal = <?=$settings['status_notify'] != 1 ? 0:1;?>;
            $(document).ready(function(){
                if (noticeModal != 0) {
                    $('#noticeModal').modal('show');}
            });
        </script>    
    




