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
serial = code = '';
</script>
<div class="c-layout-page">
<div class="m-t-20 visible-sm visible-xs"></div>
<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
<script src="/assets/js/luauytin/modals.js"></script>
<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Nạp tiền từ thẻ cào</h3>
        <div class="c-line-left"></div>
    </div>
    <form class="form-horizontal" id="recharge" method="POST">
    <div class="col-md-7">
        <div class="form-group">
            <label class="col-md-3 control-label">Nhà mạng:</label>
            <div class="col-md-9">
                <select class="form-control  c-square c-theme" name="card_type_id" id="card_type_id">
                    <option value="" style="display:none;">Chọn nhà mạng</option>
                    <?php foreach ($db->fetch_assoc($sql_card, 0) as $key => $data):?>
                        <option value="<?=$data['id'];?>"><?=$data['name'];?> (<?=$data['ck'];?>%)</option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group" id="price_guest">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-9">
                <select class="form-control  c-square c-theme" name="price_guest">
                    <option value="" style="display:none;">Chọn mệnh giá</option>
                    <option value="10000">10.000</option>
                    <option value="20000">20.000</option>
                    <option value="30000">30.000</option>
                    <option value="50000">50.000</option>
                    <option value="100000">100.000</option>
                    <option value="200000">200.000</option>
                    <option value="300000">300.000</option>
                    <option value="500000">500.000</option>
                    <option value="1000000">1.000.000</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mã số thẻ:</label>
            <div class="col-md-9">
                <input class="form-control  c-square c-theme" id="pin" name="pin" type="text" placeholder="Nhập mã thẻ">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Số serial:</label>
            <div class="col-md-9">
                <input class="form-control c-square c-theme" id="seri" name="seri" type="text" placeholder="Nhập Serial thẻ">
            </div>
        </div>
        <div class="form-group c-margin-t-40">
            <div class="col-md-offset-3 col-md-9">
                <button id="recharge_submit" type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">NẠP THẺ</button>
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
                <?=bbcode($descr_game['content']);?>
            </div>
        </div>
    </form>
    
</div>
<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Lịch sử nạp thẻ  <i class="fa fa-refresh" onclick="search();"></i></h3>
        <div class="c-line-left"></div>
    </div>
    <div class="form-inline form-find m-b-20">
        <div class="input-group m-t-10 c-square">
            <span class="input-group-addon">Serial</span>
            <input id="serial" type="text" class="form-control c-square c-theme" placeholder="Serial"> 
        </div>
        <div class="input-group m-t-10 c-square">
            <span class="input-group-addon">Mã thẻ</span>
            <input id="code" type="text" class="form-control c-square c-theme" placeholder="Mã thẻ">
        </div>
        <button class="btn c-theme-btn c-btn-square m-t-10" onclick="search();"><i class="fa fa-search"></i> Tìm kiếm</button>
        <button class="btn c-theme-btn c-btn-square m-t-10 c_fitler" onclick="c_search();" style="display: none;color: #ffffff;background: #e7505a;border-color: #e7505a;"><i class="fa fa-close"></i> Xóa lọc</button>
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
                $.post("/assets/ajax/pages/history_card.php", { page : page , seri : serial , pin : code })
                .done(function(data) {
                    $(".loading").hide();
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();
                }); 
            }
            function search(){
                serial = $("#serial").val();
                code = $("#code").val();
                if(serial || code) $(".c_fitler").show();
                $(".loading").show();
                load_page();
            }
            function c_search(){
                page = 1;
                serial = code = '';
                $("#serial").val('');
                $("#code").val('');
                $(".loading").show();
                $(".c_fitler").hide();
                load_page();                                              
            }
load_page();
</script>