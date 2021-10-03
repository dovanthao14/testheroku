<?php
$sql_descr_game = "SELECT * FROM `descr_game` WHERE `type` = '{$widget}' LIMIT 1";
if ($db->num_rows($sql_descr_game)):
    $descr_game = $db->fetch_assoc($sql_descr_game, 1);
?>
				<div class="col-md-12">
                <div class="card">
                <div class="content">
                <div class="row">
                <form id="descr_game">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <input type="hidden" name="type" value="<?=$widget;?>">
                        <textarea id="content" name="content" class="form-control border-input" placeholder="Nhập mô tả"><?=$descr_game['content'];?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: right;">
                    	<div class="footer">
                              <button type="submit" id="descr_game" class="btn btn-default">Lưu</button>
                        </div>
                    </div>
                </form>
                </div>    
                </div>
                </div>
                </div>
<?php
endif;
?>