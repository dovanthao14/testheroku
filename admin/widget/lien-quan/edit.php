<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/edit.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
              <?php    
	           $arr_info = glob($root."/assets/files/post/".$id."-*");
    					if($arr_info){
    					?>
		                <div class="col-md-12"><div class="card">
	                            <div class="header">
	                                <h4 class="title">Ảnh thông tin ID #<?=$id; ?></h4>
	                            </div>
		                <div class="content"><div class="row">
		                	<?php foreach ($arr_info as $inf) { 
		                	  $img = str_replace($root,"",$inf);		
    	                	$name = str_replace($root."/assets/files/post/","",$inf);		
		                	?>
    	                	<div class="col-sm-4 col-xs-6"><img src="<?=$img; ?>" class="img-responsive img-thumbnail" onclick="del_img('<?=$name; ?>','<?=$img; ?>');" style="height:240px;width:480px;"></div>
		          <?php } ?>
		                </div></div></div></div>
		          <?php } ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit ID <b>#<?=$id;?></b> <?=$products['type_account']?></h4> </h4>
                            </div>
                            <div class="content">                                
                            <form id="form_create" action="" enctype ="multipart/form-data" method="POST">
                            <input type="hidden" name="type_account" value="<?=$products['type_account']?>">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control border-input" id="username" name="username" placeholder="<?=$products['username']?>" value="<?=$products['username']?>">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" class="form-control border-input" name="password" placeholder="<?=$products['password']?>" value="<?=$products['password']?>">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="price">Giá tiền:</label>
                                <input type="number" class="form-control border-input" id="price" name="price" placeholder="<?=$products['price']?>" value="<?=$products['price']?>">
                              </div></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                              <div class="form-group">
                                <label for="champs_count">Số tướng:</label>
                               <input type="number" class="form-control border-input" name="champs_count" placeholder="<?=$products['champs_count']?>" value="<?=$products['champs_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="skins_count">Số trang phục:</label>
                               <input type="number" class="form-control border-input" name="skins_count" placeholder="<?=$products['skins_count']?>" value="<?=$products['skins_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="gem_count">Bảng ngọc:</label>
                               <input type="number" class="form-control border-input" name="gem_count" placeholder="<?=$products['gem_count']?>" value="<?=$products['gem_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="rank">Hạng:</label>
                                 <select class="form-control border-input" name="rank">
                                    <?php
                                        for ($i = 0; $i < 29; $i++){
                                        if($i == $products['rank']):
                                            echo '<option value="'.$i.'" selected>'.string_rank($i).'</option>';
                                        else:
                                            echo '<option value="'.$i.'">'.string_rank($i).'</option>';
                                        endif;        
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
                                <label for="info">Ảnh thông tin:</label>
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
                                        if (in_array_r(strtolower(trim($item['name'])), $text_champ)) {
                                    ?>                                   
                                        <option value="<?=$item['name']; ?>" selected><?=$item['name']; ?></option>
                                    <?php
                                        }else{
                                    ?>
                                        <option value="<?=$item['name']; ?>"><?=$item['name']; ?></option>                                    
                                    <?php
                                        }
                                    }
                                
                                    ?>
                                 </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                 <select id="skin" name="skin[]" class="form-control" multiple>
                                    <?php
                                    $list_skin = $db->fetch_assoc("SELECT * FROM lq_skin ORDER BY name DESC",0);
                                    foreach ($list_skin as $item) {
                                        if (in_array_r(strtolower(trim($item['name'])), $text_skin)) {
                                    ?>                                   
                                        <option value="<?=$item['name']; ?>" selected><?=$item['name']; ?></option>
                                    <?php
                                        }else{
                                    ?>
                                        <option value="<?=$item['name']; ?>"><?=$item['name']; ?></option>                                    
                                    <?php
                                        }
                                    }
                                
                                    ?>
                                 </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Ghi chú:</label>
                                <input type="text" class="form-control border-input" name="note" placeholder="<?=$products['note']?>" value="<?=$products['note']?>">
                            </div>



                                                                <div class="footer">
                                                                <hr>
                              <button type="submit" class="btn btn-default">CẬP NHẬT</button>

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