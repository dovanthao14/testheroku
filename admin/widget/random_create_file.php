<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/create_random_file.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <form action="" enctype ="multipart/form-data" method="POST">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đăng <b class="count_rd"></b> tài khoản random</h4><br/>
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control border-input" name="type">
                                    <?php
                                        for ($i = 1; $i <= 9; $i++){
                                        echo '<option value="'.$i.'">'.type_random($i)['name'].' '.type_random($i)['price']*0.001.'K</option>';
                                    }?>
                                      </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control border-input" name="file_acc">
                                    </div>
                                </div>
                                <br/>
                                <div class="footer">
                                    <button id="submit" type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> ĐĂNG</button>
                                </div><br/>
                            </div>
                    </form>
                    <blockquote class="blockquote">
                                  <p>* Chỉ hỗ trợ file text dạng tk|mk</p>
                    </blockquote>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

