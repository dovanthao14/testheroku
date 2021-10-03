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
username_s = type_s = id_s = "";
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12"><div class="card"><div class="content">
                <div class="btn-group btn-group-justified">
                  <a href="/admin/<?=$widget;?>/account" class="btn btn-danger">Tài khoản dự trữ</a>
                  <a href="/admin/<?=$widget;?>/ratio" class="btn btn-danger">Sửa tỉ lệ</a>
                </div>
                </div></div></div>

                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Tìm kiếm yêu cầu</h4>
                </div>    
                <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control border-input" id="type_s" name="type_s">
                                <option value="">Tất cả</option>
                                <option value="1"><?=info_wheel(1)['msg'];?></option>
                                <option value="2"><?=info_wheel(2)['msg'];?></option>
                                <option value="3"><?=info_wheel(3)['msg'];?></option>
                                <option value="5"><?=info_wheel(5)['msg'];?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="id_s" name="id_s" class="form-control border-input" placeholder="Nhập ID">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input type="text" id="username_s" name="username_s" class="form-control border-input" placeholder="Nhập Username">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                        </span>
                        </div>
                    </div>    
                
                </div>    
                </div>
                </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><center style="font-weight:bold;">YÊU CẦU XỬ LÝ</center></h4>
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
                $.post("/admin/assets/ajax/<?=$widget;?>/products.php", { page : page , username_s : username_s , type_s : type_s , id_s: id_s})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
            function fitler(){
                username_s = $("#username_s").val()
                id_s = $("#id_s").val();
                type_s = $("#type_s").val();
                load_list();                                              
            }

load_list();
</script>