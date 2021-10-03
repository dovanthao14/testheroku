<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$id = !empty(GET('id')) ? GET('id') : 0;
$sql_card = "SELECT * FROM `card` WHERE `id` = '{$id}'";
    if ($id != 0 && $db->num_rows($sql_card) > 0){
        $card = $db->fetch_assoc($sql_card, 1);
    }else{
        echo 'Không tìm thấy dữ liệu !';die();
    }
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thẻ <?=$card['name'];?> <b>#<?=$id;?></b></h4> </h4>
                            </div>
                            <div class="content">                                
                            <form id="card_create_edit" enctype ="multipart/form-data" method="POST">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="id" value="<?=$card['id'];?>">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Mã ID:</label>
                                <input type="number" class="form-control border-input" placeholder="<?=$card['id'];?>" value="<?=$card['id'];?>" disabled>
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="name">Loại thẻ:</label>
                                <input type="text" class="form-control border-input" id="name" name="name" placeholder="<?=$card['name'];?>" value="<?=$card['name'];?>">
                              </div></div>
                              <div class="col-sm-4">
                              <div class="form-group">
                                <label for="ck">Chiết khấu(%):</label>
                               <input type="number" class="form-control border-input" id="ck" name="ck" placeholder="<?=100-$card['ck'];?>" value="<?=100-$card['ck'];?>">
                              </div></div>
                            </div>
                            <div class="row">
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="auto">Nạp Auto:</label>
                                <select class="form-control border-input" name="auto">
                                    <option value="1" <?=$card['auto'] != 0 ? 'selected':'';?>>Có</option>
                                    <option value="0" <?=$card['auto'] == 0 ? 'selected':'';?>>Không</option>
                                 </select>
                              </div></div>    
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select class="form-control border-input" name="status">
                                    <option value="1" <?=$card['status'] != 0 ? 'selected':'';?>>Hoạt động</option>
                                    <option value="0" <?=$card['status'] == 0 ? 'selected':'';?>>Bảo trì</option>
                                 </select>
                              </div></div>                    
                            </div>
                            <div class="footer"><hr/>
                              <button type="submit" class="btn btn-default">CẬP NHẬT <i class="fa fa-spinner fa-spin loading" style="display: none;"></i></button>
                            </div>
                            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
