<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$setting_wheel = $db->fetch_assoc("SELECT * FROM `setting_wheel` LIMIT 1", 1);
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                            <div class="header">
                                <h4 class="title">Chỉnh tỷ lệ vòng quay thường</h4>
                            </div>
<form id="ratio_wheel">

<?php 
    $lut = 1;
    for ($i=1; $i <= 8; $i++) {
        if ($lut == 1) echo '<div class="row">';
        echo
    '<div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_'.$i.'">'.info_wheel($i)['msg'].':</label>
            <input type="number" class="form-control border-input" id="wheel_'.$i.'" name="wheel_'.$i.'" placeholder="'.$setting_wheel[$i].'" value="'.$setting_wheel[$i].'">
        </div>
    </div>';
        if ($lut == 4){echo '</div>'; $lut = 1;}else{ $lut++;}
        
    }
?>
<hr>
                            <div class="header">
                                <h4 class="title">Chỉnh tỷ lệ vòng quay kim cương</h4>
                            </div>
<?php 
    $lut = 1;
    for ($i=9; $i <= 16; $i++) {
        if ($lut == 1) echo '<div class="row">';
        echo
    '<div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_'.$i.'">'.info_wheel($i)['msg'].' Kim cương:</label>
            <input type="number" class="form-control border-input" id="wheel_'.$i.'" name="wheel_'.$i.'" placeholder="'.$setting_wheel[$i].'" value="'.$setting_wheel[$i].'">
        </div>
    </div>';
        if ($lut == 4){echo '</div>'; $lut = 1;}else{ $lut++;}
        
    }
?>
<hr>
<div class="row">
    <div class="col-sm-4 col-xs-6">
        <div class="form-group">
            <label for="wheel_price">Giá Quay thường:</label>
            <input type="number" class="form-control border-input" id="wheel_price" name="wheel_price" placeholder="<?=$setting_wheel['wheel_price']; ?>" value="<?=$setting_wheel['wheel_price']; ?>">
        </div>
    </div>
    <div class="col-sm-4 col-xs-6">
        <div class="form-group">
            <label for="wheel_price_2">Giá quay KC:</label>
            <input type="number" class="form-control border-input" id="wheel_price_2" name="wheel_price_2" placeholder="<?=$setting_wheel['wheel_price_2']; ?>" value="<?=$setting_wheel['wheel_price_2']; ?>">
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select class="form-control border-input" id="status" name="status">
                <option value="0" <?=($setting_wheel['status']=='0') ? 'selected':''; ?>>Bảo trì</option>
                <option value="1" <?=($setting_wheel['status']=='1') ? 'selected':''; ?>>Hoạt động</option>
            </select> 
        </div>
    </div>
</div>
<div class="footer">
<hr>
  <button type="submit" class="btn btn-default">LƯU</button>
</div>
</form>
<blockquote class="blockquote">
  <p>* Tỉ lệ được tính theo phần trăm (%).</p>
  <p>* Tỉ lệ < 2% thì sẽ không bao giờ trúng.</p>
</blockquote>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>