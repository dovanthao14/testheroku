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
username = "";
id_acc = "";
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12"><div class="card"><div class="content">
                <a href="/admin/<?=$widget;?>/create"><button type="button" class="btn btn-success btn-block">Đăng tài khoản</button></a>
                <br/>
                <div class="btn-group btn-group-justified">
                  <a href="/admin/<?=$widget;?>/champion" class="btn btn-warning">Dữ liệu tướng</a>
                  <a href="/admin/<?=$widget;?>/skin" class="btn btn-warning">Dữ liệu trang phục</a>
                </div>
                </div></div></div>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/widget/content.php');?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><center style="font-weight:bold;"><?=type_game($widget);?></center></h4><br/>
                        </div>
                        <div class="content">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control border-input" placeholder="Nhập tài khoản">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                <input type="text" id="id_acc" name="id_acc" class="form-control border-input" placeholder="Nhập ID tài khoản">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                                </span>
                                </div>
                            </div>
                            <hr/><br/>
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
                $.post("/admin/assets/ajax/products/<?=$widget;?>.php", { page : page , username : username , id_acc : id_acc })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                username = $("#username").val();
                id_acc = $("#id_acc").val();
                load_list();                                              
            }

load_list();
</script>