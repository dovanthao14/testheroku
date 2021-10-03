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
seri = "";
pin = "";
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Tìm kiếm dữ liệu</h4>
                </div>    
                <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="username" name="username" class="form-control border-input" placeholder="Nhập username">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="seri" name="seri" class="form-control border-input" placeholder="Nhập seri">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input type="text" id="pin" name="pin" class="form-control border-input" placeholder="Nhập mã thẻ">
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
                            <h4 class="title"><center style="font-weight:bold;">YÊU CẦU GẠCH THẺ</center></h4>
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
                $.post("/admin/assets/ajax/products/card-cham.php", { page : page , username : username , seri : seri , pin : pin })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                username = $("#username").val();
                seri = $("#seri").val();
                pin = $("#pin").val();
                load_list();                                              
            }

load_list();
</script>