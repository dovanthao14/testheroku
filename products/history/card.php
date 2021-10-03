<script>
page = 1;
seri = pin = '';
</script>
<div class="c-layout-page">
<div class="m-t-20 visible-sm visible-xs"></div>
<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$active ="card";
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/products/sidebar.php');
?>

<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Lịch sử nạp thẻ</h3>
        <div class="c-line-left"></div>
    </div>
    <div class="form-inline form-find m-b-20">
        <div class="input-group m-t-10 c-square">
            <span class="input-group-addon">Serial</span>
            <input id="seri" type="text" class="form-control c-square c-theme" placeholder="Serial" autofocus="">
        </div>
        <div class="input-group m-t-10 c-square">
            <span class="input-group-addon">Mã thẻ</span>
            <input id="pin" type="text" class="form-control c-square c-theme" placeholder="Mã thẻ" autofocus="">
        </div>
        <button id="loading" class="btn c-theme-btn c-btn-square m-t-10" onclick="search();">Tìm kiếm <i class="fa fa-spinner fa-spin loading" style="color:white;display: none;"></i></button>
    </div>
    <div id="HHT_LoadTable" data-page="1">
        <div class="list" style="display:none;"></div>
    </div>
</div>
</div>
</div>
</div>
<script>
           function load_page(){
                $.post("/assets/ajax/pages/history_card.php", { page : page , seri : seri , pin : pin })
                .done(function(data) {
                    $(".loading").hide();
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();
                }); 
            }
            function search(){
                seri = $("#seri").val();
                pin = $("#pin").val();
                $(".loading").show(); 
                load_page();                                                                                                                                          
            }
load_page();
</script>