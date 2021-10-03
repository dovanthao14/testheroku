<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$sql_card = "SELECT * FROM `card` WHERE status != '0' ORDER BY id ASC";
$descr_game = $db->fetch_assoc("SELECT * FROM `descr_game` WHERE `type` = 'card' LIMIT 1", 1);
?>
<script>
page = 1;
</script>
<div class="c-layout-page">
<div class="m-t-20 visible-sm visible-xs"></div>
<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
<script src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Rút kim cương</h3>
        <div class="c-line-left"></div>
    </div>
    <form class="form-horizontal" id="rut_kc_ff_luauytin" method="POST">
    <div class="col-md-7">
        <div class="form-group">
            <div class="col-md-3"></div>
            <p class="text-center" style="font-weight: 900;">Bạn có <span style="color: blue;"><?=$accounts['diamon_ff'];?></span> kim cương</p>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-9">
                <select class="form-control  c-square c-theme" id="soluong" name="soluong">
                    <option value="" style="display: none;">Gói kim cương</option>
                    <option value="1">90 Kim Cương</option>
                    <option value="2">230 Kim Cương</option>
                    <option value="3">465 Kim Cương</option>
                    <option value="4">950 Kim Cương</option>
                    <option value="5">1900 Kim Cương</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">ID Ingame:</label>
            <div class="col-md-9">
                <input class="form-control  c-square c-theme" id="id_ingame" name="id_ingame" type="text" placeholder="Nhập ID Ingame">
            </div>
        </div>
        <div class="form-group c-margin-t-40">
            <div class="col-md-offset-3 col-md-9">
                <button id="recharge_submit" type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">GỬI YÊU CẦU</button>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-xs-12 col-md-9">
                <p id="msg" style="text-align:center;font-weight:bold;"></p>
            </div>
        </div>
        </div>
        <div class="col-md-5">
            <div id="tintuc" class="col-sm-12 col-xs-12 alert alert-success" style="margin-top: 0px;font-size: 18px;color:black;">
                Nhập chính xác ID Ingame để tránh nạp nhầm ID
            </div>
        </div>
    </form>
    
</div>
<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Lịch sử  <i class="fa fa-refresh" onclick="search();"></i></h3>
        <div class="c-line-left"></div>
    </div>
    <div id="HHT_LoadTable" data-page="1">
        <center><img class="loading" src="/assets/images/dna-spin-spiral-preloader.gif" style="display:none;"></center>
        <div class="list" style="display:none;"></div>
    </div>
</div>
</div>
</div>
</div>
<script>
           function load_page(){
               $(".loading").show();
               $(".list").hide();
                $.post("/assets/ajax/pages/history_dff.php", { page : page })
                .done(function(data) {
                    $(".loading").hide();
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();
                }); 
            }
            function search(){
                $(".loading").show();
                load_page();
            }
load_page();
</script>