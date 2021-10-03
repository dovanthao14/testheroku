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
name = username = phone = email = '';
</script>

<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12"><div class="card"><div class="content">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control border-input" placeholder="Name">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control border-input" placeholder="Username">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control border-input" placeholder="Email">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" id="phone" name="phone" class="form-control border-input" placeholder="Phone">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                    </span>
                </div>
            </div>
        </div>
        </div></div></div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"><center style="font-weight:bold;">DANH SÁCH THÀNH VIÊN</center></h4>
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
                $.post("/admin/assets/ajax/pages/member.php", { page : page , name : name , username : username , phone : phone , email : email})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                name = $("#name").val();
                username = $("#username").val();
                phone = $("#phone").val();
                email = $("#email").val();
                load_list();                                              
            }

load_list();
</script>
