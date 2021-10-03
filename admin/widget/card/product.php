<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
?>
<script>
page = 1;
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12"><div class="card"><div class="content">
                <a href="/admin/<?=$widget;?>/create"><button type="button" class="btn btn-success btn-block">Thêm thẻ nạp mới</button></a>
                </div></div></div>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/widget/content.php');?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><center style="font-weight:bold;">DANH SÁCH THẺ NẠP</center></h4><br/>
                        </div>
                        <div class="content">
                             <div style="display: block;" class="list"></div>        
                        </div>
                    </div>
                </div>
                </div>
            </div>
</div>
<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/products/<?=$widget;?>.php", { page : page })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
load_list();
</script>