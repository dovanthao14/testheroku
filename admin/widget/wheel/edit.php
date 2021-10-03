<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$id = GET('id') && GET('id') > 0 ? (int)GET('id'):die('Có lỗi -> Liên Hệ: 0984.459.954');
if($db->fetch_row("SELECT COUNT(*) FROM `wheel` WHERE `id` = '".$id."' LIMIT 1") == 0){die('không tồn tại tài khoản này');}
$wheel = $db->fetch_assoc("SELECT * FROM `wheel` WHERE `id` = '".$id."' LIMIT 1", 1);
$wheel['name'] = $db->fetch_assoc("SELECT * FROM `accounts` WHERE `username` = '".$wheel['iduser']."' LIMIT 1", 1)['name'];
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit ID Wheel <b>#<?=$id;?></b></h4>
                            </div>
                            <div class="content">                                
                            <form id="form_edit_wheel" method="POST">
                            <input type="hidden" name="id" value="<?=$wheel['id'];?>">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Loại tài khoản:</label>
                                <input type="text" class="form-control border-input" placeholder="<?=info_wheel($wheel['type'])['msg'];?>" value="<?=info_wheel($wheel['type'])['msg'];?>" disabled>
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="id_username">ID Username:</label>
                                <input type="text" class="form-control border-input" placeholder="<?=$wheel['iduser'];?>" value="<?=$wheel['iduser'];?>" disabled>
                              </div></div>
                              <div class="col-sm-4">
                              <div class="form-group">
                                <label for="id_username">Name:</label>
                                <input type="text" class="form-control border-input" placeholder="<?=$wheel['name'];?>" value="<?=$wheel['name'];?>" disabled>
                              </div></div>
                            </div>
                            <div class="row">
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control border-input" id="username" name="username" placeholder="Tên đăng nhập" value="<?=$wheel['username'];?>">
                              </div></div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" class="form-control border-input" id="password" name="password" placeholder="Mật khẩu" value="<?=$wheel['password'];?>">
                              </div></div>
                            </div>

                            <div class="footer">
                              <hr>
                              <button type="submit" class="btn btn-default">CẬP NHẬT</button>
                            </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>