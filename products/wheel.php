<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║ 
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//lấy dữ liệu vòng quay
$sql_setting_wheel =  "SELECT * FROM `setting_wheel`";
if ($db->num_rows($sql_setting_wheel)){
    $setting_wheel = $db->fetch_assoc($sql_setting_wheel, 1);
}else{
    die('Bảo trì');
}
$type = GET('type') == 'free-fire' || GET('type') == 'kc-free-fire' ? GET('type'):'';

if (!$type){
//đếm lượt quay
    $count_acc = $db->fetch_row("SELECT COUNT(*) FROM `history_wheel` WHERE `type` <= '8'");
    $count_kc = $db->fetch_row("SELECT COUNT(*) FROM `history_wheel` WHERE `type` >= '9'");

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
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">VÒNG QUAY MAY MẮN</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="row row-flex-safari game-list">
            <!--  BEGIN LIST GAME -->
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/luckywheel/kc-free-fire" title="Free Fire" class="">
                                <img src="/assets/images/P3F0Vcbtia_1573134582.jpg" alt="Free Fire">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/luckywheel/kc-free-fire" title="Free Fire">Vòng quay Kim cương</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số lượt quay: <?=number_format($count_kc);?>
                            </p>
                            <p>
                                Cơ hội nhận kim cương khủng
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/luckywheel/kc-free-fire" title="Free Fire">Quay luôn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/luckywheel/free-fire" title="Free Fire" class="">
                                <img src="/assets/images/oMEnarWkzr_1561610860.jpg" alt="Free Fire">
                            </a>
                        </div>
                        <div class="news_title">
                            <h2>
                                <a href="/luckywheel/free-fire" title="Free Fire">Vòng quay tài khoản</a>
                            </h2>
                        </div>
                        <div class="news_description">
                            <p>
                                Số lượt quay: <?=number_format($count_acc);?>
                            </p>
                            <p>
                                Cơ hội nhận tài khoản vip
                            </p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/luckywheel/free-fire" title="Free Fire">Quay luôn</a>
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


<?php }else{ ?>
<script>
    var type = <?="'".$type."'";?>;
</script>
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="/assets/frontend/vongquay/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/frontend/vongquay/css/components.css" id="style_components" rel="stylesheet" type="text/css">
    <link href="/assets/frontend/vongquay/css/style.css" rel="stylesheet" type="text/css">

<div class="c-content-title-1 pd50">
    <h3 class="c-center c-font-uppercase c-font-bold"><?=$type=='free-fire' ? 'Vòng quay tài khoản':'Vòng quay kim cương';?></h3>
    <div class="c-line-center c-theme-bg"></div>
</div>
<div class="col-lg-6 col-md-12">
    <div class="c-content-box c-size-md c-bg-white">
        <!-- <div class="container"> -->
            <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                
                <div class="row row-flex-safari game-list" style="display: flex; flex-wrap: wrap">
                    <div class="item item-left">

                      <section class="rotation">
                        <div class="play-spin">
                            <a class="ani-zoom" id="start-played1"><img src="/assets/images/IMG_3478.png" alt="Play Center"></a>
                            <img style="width: 80%;max-width: 80%;opacity: 1;" src="/assets/images/<?=$type=='free-fire' ? 'ff_wheel':'wheel_kc_2';?>.png" alt="Play" id="rotate-play">
                        </div>
                        <div class="text-center">           
                            <h1 class="num-play"><span style="color: #cf9011;font-weight: 900;"><?=$type=='free-fire' ? number_format($setting_wheel['wheel_price']):number_format($setting_wheel['wheel_price_2']);?>đ</span> lượt quay.</h1>
                        </div>
                      </section>    
                    </div>
                </div>
                <div class="table-body scrollbar-inner">
                  <table class="table table-bordered">
                     <tbody></tbody>
                  </table>
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>
<div class="col-lg-6 col-md-12 list-roll">
    <div class="btn-top">
        <a href="#" class="thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
            <span>
                <i class="la la-cloud-upload"></i>
                <span>Thể Lệ</span>
            </span>
        </a>
        <a href="/history/wheel.html" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
            <span>
                <i class="la la-cloud-upload"></i>
                <span>Lịch Sử Quay</span>
            </span>
        </a>
    </div>

<div class="modal fade" id="theleModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thể Lệ</h4>
            </div>

            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
<p>PHÍ <b><?=number_format($setting_wheel['wheel_price']);?>đ</b> MỖI LƯỢT QUAY , BẠN CHỈ CẦN NHẤP QUAY LÀ NÓ QUAY VÀ NÓ SẼ TRỪ TIỀN VÀO LẦN QUAY BẠN NHẤN</p>

<p>&nbsp;</p>

<p>Nếu quay được 20k Tiền , Nick thì hệ thống sẽ tự động gửi phần thưởng vào lịch sử trúng của bạn.</p>

<p>Nếu quay được <b>NGỌC</b>,<b>VÀNG</b> hoặc <b>VẬT PHẨM</b>. Bạn Vui Lòng Inbox Page Để Nhận</p>

<p>&nbsp;</p>

<p>CHÚC CÁC BẠN QUAY TRÚNG ĐƯỢC NHIỀU NICK NGON VÍP</p>

<p>&nbsp;</p>

<p>NẾU VÒNG QUAY KHÔNG QUAY ĐƯỢC LÀ DO HIỆN TẠI QUÀ TRÊN VÒNG QUAY ĐÃ HẾT CÁC BẠN NHÉ</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".thele").on("click", function(){
            $("#theleModal").modal('show');
        })
    });
</script>

        <div class="c-content-title-1" style="margin: 0 auto">
        <h3 class="c-center c-font-uppercase c-font-bold">LƯỢT QUAY GẦN ĐÂY</h3>
    </div>
    <div class="list-roll-inner">
        
        <table cellpadding="10" class="table table-striped">
            <tbody>
                <tr>
                    <th>Tài khoản</th>
                    <th>Giải thưởng</th>
                    <th>Thời gian</th>
                </tr>
            </tbody>
            <tbody>
<?php
$luauytin ="SELECT * FROM `history_wheel` WHERE `hide` = '0' ORDER BY id DESC LIMIT 25";;
if ($db->num_rows($luauytin) > 0){
    foreach ($db->fetch_assoc($luauytin, 0) as $key => $data){
echo 
                '<tr>
                    <td>'.str_replace(mb_substr($data['name'], -6), '******', $data['name'] ).'</td>
                    <th>'.$data['prize'].'</th>
                    <th>'.$data['time'].'</th>
                </tr>';
    }
}else{
echo '<tr><th colspan="3" class="text-center">Chưa có ai quay !</th><tr>';
}
?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                </div>

                <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    
    <style type="text/css">
        #start-played1{
            cursor: pointer;
        }
        .c-content-client-logos-slider-1 .item{
            width: 85%;
        }
    </style>
<script type="text/javascript">
    $(document).ready(function(e){
   
    var roll_check = true;
    var angles = 0;
    var rotate = 0;
    //Click nút quay
    $('body').delegate('#start-played1', 'click', function(){
        if(roll_check){
            roll_check = false;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/luckywheel-roll/'+type,
                success: function (data) {
                    if(data.status == 'ERROR'){                       
                        roll_check = true;
                        $('.content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                    }else if(data.status=='LOGIN'){
                        $('.content-popup').text('Vui lòng đăng nhập để sử dụng dịch vụ !');
                        $('#noticeModal').modal('show');
                    }else{ 
                        rotate = data.rotate;
                        detail = data.msg;
                        loop();
                    }   
                },
                error: function(){
                    $('.content-popup').text('Có lỗi xảy ra. Vui lòng thử lại sau !');
                    $('#noticeModal').modal('show');
                }
            })
        }
    });


    function loop() {
        $('#rotate-play').css({"transform": "rotate("+angles+"deg)"});
        if(angles < rotate+(360*4)){
            angles = angles+10;
        }else if(angles < rotate+(360*3)){
            angles = angles+5;
        }else if(angles < rotate+(360*3.5)){
            angles = angles+3;
        }else{
            angles = angles+1;
        }
        if(angles <= rotate+(360*5)){
            requestAnimationFrame(loop);
        }else{
            angles = 0;
            roll_check = true;
            $('.content-popup').text('Kết quả: '+detail);
            $('#noticeModal').modal('show');
        }
    }
});
</script>
<!-- END: PAGE CONTENT -->
</div>
<?php }?>