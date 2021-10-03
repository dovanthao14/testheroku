<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/create.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đăng tài khoản <?=type_game($widget);?></h4>
                            </div>
                            <div class="content">                                
                            <form id="form_create" action="" enctype ="multipart/form-data" method="POST">
                            <input type="hidden" name="type_account" value="<?=$widget;?>">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control border-input" id="username" name="username" placeholder="Tên đăng nhập">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" class="form-control border-input" name="password" placeholder="*******">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="price">Giá tiền:</label>
                                <input type="number" class="form-control border-input" id="price" name="price" placeholder="Nhập số tiền vào đây">
                              </div></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                              <div class="form-group">
                                <label for="champs_count">Số tướng:</label>
                               <input type="number" class="form-control border-input" name="champs_count" placeholder="Số tướng">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="skins_count">Số trang phục:</label>
                               <input type="number" class="form-control border-input" name="skins_count" placeholder="Số trang phục">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="skins_count">Bậc ngọc:</label>
                               <input type="number" class="form-control border-input" name="gem_count" placeholder="Số bảng ngọc">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="rank">Hạng:</label>
                                 <select class="form-control border-input" name="rank">
                                    <?php
                                        for ($i = 0; $i < 29; $i++){
                                        echo '<option value="'.$i.'">'.string_rank($i).'</option>';
                                    }?>
                                 </select>
                                </div></div>                            
                            </div>                          
                            <div class="row">  
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="thumb">Ảnh mô tả:</label>
                                <input type="file" id="thumb" name="thumb" class="form-control border-input" />
                              </div></div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="champs">Ảnh thông tin:</label>
                                <input type="file" id="info" name="info[]" class="form-control border-input" multiple />
                              </div></div>
                             </div>
                             
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                 <select id="champ" name="champ[]" class="form-control" multiple>
                                    <?php
                                    $list_champ = $db->fetch_assoc("SELECT * FROM lq_champion ORDER BY name DESC",0);
                                    foreach ($list_champ as $item) { 
                                    ?>                                   
                                        <option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
                                    <?php } ?>
                                 </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                 <select id="skin" name="skin[]" class="form-control" multiple>
                                    <?php
                                    $list_skin = $db->fetch_assoc("SELECT * FROM lq_skin ORDER BY name DESC",0);
                                    foreach ($list_skin as $item) { 
                                    ?>                                   
                                        <option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
                                    <?php } ?>
                                 </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Ghi chú:</label>
                                <input type="text" class="form-control border-input" name="note" placeholder="Ghi chú">
                            </div>



                                                                <div class="footer">
                                                                <hr>
                              <button type="submit" class="btn btn-default">ĐĂNG</button>

                                                            </div>
                            </form>

                                </div>
                                <blockquote class="blockquote">
                                  <p>* Giữ ctrl để chọn được nhiều ảnh một lần</p>
                                  <p>* Số tướng, trang phục, bảng ngọc là số ảnh, số tướng, số trang phục bạn chọn</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


<script>
$(document).ready(function(){
    $('#champ').multiselect({
        nonSelectedText: 'Chọn tướng',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'100%'
    });
    $('#skin').multiselect({
        nonSelectedText: 'Chọn trang phục',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'100%'
    });     
});
</script>