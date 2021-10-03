<?php
    $id = !empty($_GET['id']) ? (int)GET('id') : 0; 
    $info = new Info;
    if(empty($descr)){$descr = $settings['descr'];}
    if(empty($keywords)){$keywords = $settings['keywords'];}
    $meta = '<meta property="og:locale" content="vi_VN" /><meta property="og:type" content="product" />';
    $meta .= '<meta property="og:image" content="'.thumb($id).'" />';
    $meta .= '<link rel="alternate" hreflang="x-default" href="'.$_DOMAIN.'" />';  
    $sql_products = "SELECT id, note, price, type_account, status, skins_count,champs_count FROM products WHERE id = '{$id}' LIMIT 1";
    if($db->num_rows($sql_products) > 0){
    $post_info = $db->fetch_assoc($sql_products, 1);
    $meta .= '<meta property="og:title" content="Tài khoản '.$post_info["type_account"].' #'.$id.' | '.$settings['title'].'" />';
    $settings['title'] = 'Tài khoản #'.$id.' - '.type_game($post_info["type_account"]).'| '.$settings['title'];
    $meta .= '<meta property="og:url" content="'.$_DOMAIN.'accounts/'.$id.'.html" />';
    if($post_info["type_account"] == 'Liên Quân Mobile'){
    $meta .= '<meta property="og:description" content="'.$post_info["champs_count"].' Tướng - '.$post_info["skins_count"].' Trang Phục - Giá '.number_format($post_info["price"], 0, '.', '.').'đ"/>';
    }else{
    $meta .= '<meta property="og:description" content="Giá '.number_format($post_info["price"], 0, '.', '.').'đ"/>';
    }
    }else{
        $meta .= '<meta property="og:url" content="'.$_DOMAIN.'" /><meta property="og:title" content="'.$settings['title'].'" /><meta property="og:description" content="'.$descr.'"/>';
    }
?>
<!--
╔═════════════════════════════════════════════╗
║           Designed by XTECH.VN              ║
║    Facebook: facebook.com/page.xtech.vn     ║
║           Hotline: 0899.91.31.91            ║
╚═════════════════════════════════════════════╝
-->
<!DOCTYPE html>
<html lang="vi">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title><?=$settings['title'];?></title>
    <meta name="description" content="<?=$descr;?>">
    <meta name="keywords" content="<?=$keywords;?>">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/assets/images/favicon.png" rel="icon" type="image/x-icon">
    <link rel="canonical" href="<?=$_DOMAIN;?>">
    <meta content="" name="author"/>
    <?=$meta?>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="/assets/frontend/theme/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN: BASE PLUGINS  -->
    <link href="/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN: PAGE STYLES -->
    <link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- END: PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/assets/frontend/theme/assets/demos/default/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/demos/default/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/theme/assets/demos/default/css/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
    <link href="/assets/frontend/theme/assets/demos/default/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/assets/frontend/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="/assets/frontend/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="/assets/frontend/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/css/more.css" rel="stylesheet" type="text/css"/>

    <script src="/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
    <script src="/assets/js/jquery.validate.js"></script>
    <script src="/assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/frontend/plugins/owl-carousel/slider.js"></script>
    <script src="/assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
</head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light">
        <div class="container">
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-left">
                <ul class="c-icons c-theme-ul">
                    <li>
                        <a href="<?=$settings['fb_admin'];?>" target="_blank">
                            <i class="icon-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$settings['youtube'];?>" target="_blank">
                            <i class="icon-social-youtube"></i>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- END: INLINE NAV -->
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-right m-t-10">
                <ul class="c-links c-theme-ul">
                    <li>
                        Hotline: <a href="tel:<?=$settings['phone_admin']?>"><?=$settings['phone_admin']?> (8h-17h)</a>
                    </li>
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <h1 style="margin: 0px;display: inline-block">
                        <a href="/" class="c-logo" alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
                            <img height="55px" src="/assets/images/shophip.vn.png" alt="<?=$settings['title'];?>" class="c-desktop-logo">
                            <img height="40px" src="/assets/images/shophip.vn.png" alt="<?=$settings['title'];?>" class="c-desktop-logo-inverse">
                            <img height="26px" src="/assets/images/shophip.vn.png" alt="<?=$settings['title'];?>" class="c-mobile-logo"> </a>
                    </h1>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                <?php if(!is_client()){ ?>
                    <a style="float: right;margin-right: 8px;" href="/user/login" class="visible-xs c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-xs c-btn-border-1x c-btn-dark c-btn-square c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Đăng nhập</a>
                <?php }else{ ?>
                    <a style="float: right;margin-right: 8px;" href="/user/profile.html" class="visible-xs c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-xs c-btn-border-1x c-btn-dark c-btn-square c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Profile</a>
                <?php } ?>
                    <!--<button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>-->
                    </button>
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                <style>
                    .c-menu-type-mega:hover {
                        transition-delay: 1s;
                    }

                    .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:focus > a:not(.btn), .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:active > a:not(.btn), .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:hover > a:not(.btn) {
                        color: #3a3f45;
                        background: #FAFAFA;
                    }
                </style>
                <!-- BEGIN: HOR NAV -->
                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <ul class="nav navbar-nav c-theme-nav">
                        <li class="c-menu-type-classic">
                            <a rel="" href="/" class="c-link dropdown-toggle ">Trang chủ</a>
                        </li>
                        <li class="c-menu-type-classic">
                                <a class="c-link dropdown-toggle c-toggler" href="javascript:;">
                                    Free Fire<span class="c-arrow c-toggler"></span>
                                </a>
                                <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                    <li>
                                        <a href="/shop-game/free-fire.html">
                                            Acc free fire 
                                        </a>
                                    </li>
                                <?php for ($i=1;$i<=4;$i++){
                                echo '<li>
                                        <a href="/random/'.type_random($i)['url'].'.html">
                                            Random '.type_random($i)['name'].' '.type_random($i)['price']*0.001.'K
                                        </a>
                                    </li>';
                                }?>
                                </ul>
                        </li>
                        <li class="c-menu-type-classic">
                                <a class="c-link dropdown-toggle c-toggler" href="javascript:;">
                                    Liên Quân<span class="c-arrow c-toggler"></span>
                                </a>
                                <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                    <li>
                                        <a href="/shop-game/lien-quan.html">
                                            Acc liên quân 
                                        </a>
                                    </li>
                                <?php for ($i=5;$i<=9;$i++){
                                echo '<li>
                                        <a href="/random/'.type_random($i)['url'].'.html">
                                            Random '.type_random($i)['name'].' '.type_random($i)['price']*0.001.'K
                                        </a>
                                    </li>';
                                }?>
                                </ul>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="/user/recharge.html" class="c-link dropdown-toggle">
                                Nạp tiền
                            </a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="/user/rut-kim-cuong.html" class="c-link dropdown-toggle">
                                Rút Kim Cương
                            </a>
                        </li>
                        <?php if(is_client()){?>
                    
                        <li>
                            <a href="/user/profile.html" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                            <i class="icon-user"></i> <?=$accounts['name'];?> - $ <?=number_format($accounts['cash']);?></a>
                        </li>
                        <li>
                            <a href="/user/logout" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                            Thoát</a>
                        </li>
                        <?php }else{?>
                        <li>
                            <a href="/user/login" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                <i class="icon-user"></i> Đăng nhập
                            </a>
                        </li>
                        <li>
                            <a href="/user/register" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                <i class="icon-key icons"></i> Đăng ký
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </nav>

                <!-- END: MEGA MENU -->
                <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- END: HOR NAV -->
            </div>
        </div>
    </div>
</header>
<!-- END: HEADER -->
<!-- END: LAYOUT/HEADERS/HEADER-1 -->