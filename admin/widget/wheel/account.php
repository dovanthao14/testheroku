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
username_s = type_s = "";
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Thêm tài khoản</h4>
                </div>   
                <div class="content">
                <form id="add_wheel">
                <input type="hidden" name="type" value="0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control border-input" name="type_wheel">
                                <option value="" style="display:none;">Chọn loại tài khoản</option>
                                <option value="1"><?=info_wheel(1)['msg'];?></option>
                                <option value="2"><?=info_wheel(2)['msg'];?></option>
                                <option value="3"><?=info_wheel(3)['msg'];?></option>
                                <option value="5"><?=info_wheel(5)['msg'];?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <textarea name="info_wheel" class="form-control border-input" rows="4" cols="50" placeholder="<?="TK1|MK1\nTK2|MK2\nTK3|MK3\n...";?>"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: right;">
                        <div class="footer">
                              <button type="submit" id="add_wheel_submit" class="btn btn-default">Thêm tài khoản</button>
                        </div>
                    </div>
                </div>    
                </form>
                </div>
                </div>
                </div>

                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Tìm kiếm dữ liệu</h4>
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
                        <div class="input-group">
                        <input type="text" id="username_s" name="username_s" class="form-control border-input" placeholder="Nhập TK Acc">
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
                            <h4 class="title"><center style="font-weight:bold;">TÀI KHOẢN DỰ TRỮ</center></h4>
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
                $.post("/admin/assets/ajax/<?=$widget;?>/account.php", { page : page , username_s : username_s , type_s : type_s})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
            function fitler(){
                username_s = $("#username_s").val()
                type_s = $("#type_s").val();
                load_list();                                              
            }

load_list();
</script>