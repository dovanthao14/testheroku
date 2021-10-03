<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/create_champ_skin.php');
?>

<link rel="stylesheet" id="css-main" href="/admin/assets/css/style.css">
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm tướng vào CSDL</h4>
                            </div>
                            <div class="content">                                
                            <form action="" enctype="multipart/form-data" method="post">
                            <input name="type" type="hidden" value="lq_champion">
                            <div class="row">
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="img">Ảnh Champ:</label>
                                <input name="image" type="file" class="form-control border-input">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="username">Tên hiển thị:</label>
                                <input type="text" class="form-control border-input" name="name" placeholder="Nhập tên vào đây">
                              </div></div>
                                                         
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="vip">Trạng thái:</label>
                                    <select name="vip" class="form-control border-input">
                                      <option value="yes">VIP</option>
                                      <option value="no" selected>Thường</option>
                                    </select>
                              </div></div>    
                              <div class="col-sm-3">
                              <div class="form-group">
                                <label for="submit"><br/></label>
                                    <button type="submit" class="form-control btn-default active">Upload</button>
                              </div></div>    
                            </div>
                                                                
                            </form>

                                </div>
                            </div>
                        </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách tướng trong CSDL</h4>
                            </div>
                            <div class="content">
                            <div class="listskin row">
                                    <?php
                                    $list_champ = $db->fetch_assoc("SELECT * FROM lq_champion ORDER BY name DESC",0);
                                    foreach ($list_champ as $item) { 
                                    ?>                                   
                                        <div class="col-sm-1 col-xs-4">
                                        	<div class="featured-article"><img src="/assets/images/lq_champion/<?php echo $item['img_name']; ?>" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" class="img-responsive img-thumbnail" onclick="del_img_champ_skin('lq_champion','<?php echo $item['id']; ?>','<?php echo $item['img_name']; ?>','<?php echo $item['name']; ?>');" width="100" height="100" <?php if($item['vip'] == "yes"){echo 'style="background-color:red;"';}?>><div class="block-title text-center" style="width:100;"><?php echo $item['name']; ?></div></div>
                                        </div>
                                    <?php } ?>                            
                </div></div>

            </div>
        </div>
                    </div>
                </div>

            </div>
        </div>
