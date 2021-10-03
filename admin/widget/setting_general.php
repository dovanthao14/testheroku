<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thiết lập chung</h4>
                            </div>
                            <div class="content">
<form id="setting_general"> 
<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
    <label for="title">Tiêu đề trang web:</label>
    <input type="text" class="form-control border-input" name="title" placeholder="Tiêu đề mặc định cho trang web" value="<?php echo $settings['title']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
    <label for="descr">Mô tả trang web:</label>
    <input type="text" class="form-control border-input" name="descr" placeholder="Mô tả về trang web" value="<?php echo $settings['descr']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
    <label for="keywords">Từ khóa tìm kiếm:</label>
    <input type="text" class="form-control border-input" name="keywords" placeholder="Từ khóa tìm kiếm" value="<?php echo $settings['keywords']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-3 col-xs-6">
  <div class="form-group">
    <label for="youtube">Youtube:</label>
    <input type="text" class="form-control border-input" name="youtube" placeholder="<?php echo $settings['youtube']; ?>" value="<?php echo $settings['youtube']; ?>">
  </div>
 </div>
 <div class="col-sm-3 col-xs-6">
  <div class="form-group">
    <label for="domain">Tên miền:</label>
    <input type="text" class="form-control border-input" name="domain" placeholder="<?php echo $settings['domain']; ?>" value="<?php echo $settings['domain']; ?>">
  </div>
 </div>
 <div class="col-sm-3 col-xs-6">
  <div class="form-group">
    <label for="phone_admin">Hotline:</label>
    <input type="text" class="form-control border-input" name="phone_admin" placeholder="<?php echo $settings['phone_admin']; ?>" value="<?php echo $settings['phone_admin']; ?>">
  </div>
 </div>
 <div class="col-sm-3 col-xs-6">
  <div class="form-group">
    <label for="name_admin">Name Admin:</label>
    <input type="text" class="form-control border-input" name="name_admin" placeholder="<?php echo $settings['name_admin']; ?>" value="<?php echo $settings['name_admin']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="fb_admin">Facebook admin:</label>
    <input type="text" class="form-control border-input" name="fb_admin" placeholder="<?php echo $settings['fb_admin']; ?>" value="<?php echo $settings['fb_admin']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="email_admin">Email admin:</label>
    <input type="email" class="form-control border-input" name="email_admin" placeholder="<?php echo $settings['email_admin']; ?>" value="<?php echo $settings['email_admin']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-12">
  <div class="form-group">
    <label for="fanpage">Fanpage:</label>
    <input type="text" class="form-control border-input" name="fanpage" placeholder="<?php echo $settings['fanpage']; ?>" value="<?php echo $settings['fanpage']; ?>">
  </div>
 </div>
</div>

<div class="row">
 <div class="col-sm-6 col-xs-6">
  <div class="form-group">
    <label for="merchant_id">API ID:</label>
    <input type="text" class="form-control border-input" id="merchant_id" name="merchant_id" placeholder="<?php echo $settings['merchant_id']; ?>" value="<?php echo $settings['merchant_id']; ?>">
  </div>
 </div>
  <div class="col-sm-6 col-xs-6">
  <div class="form-group">
    <label for="merchant_key">API Key:</label>
    <input type="text" class="form-control border-input" id="merchant_key" name="merchant_key" placeholder="<?php echo $settings['merchant_key']; ?>" value="<?php echo $settings['merchant_key']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
    <label for="notify">Nội dung thông báo:</label>
<textarea name ="notify" class="form-control border-input" rows="4" cols="50" placeholder="Thông báo"><?php echo $settings['notify']; ?></textarea>
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-4">
  <div class="form-group">
    <label for="status_notify">Trạng thái thông báo:</label>
    <select class="form-control border-input" id="status_notify" name="status_notify">
        <option value="0" <?php echo ($settings['status_notify']=='0') ? 'selected':''; ?>>Tắt</option>
        <option value="1" <?php echo ($settings['status_notify']=='1') ? 'selected':''; ?>>Bật</option>
    </select> 
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="status_random">Trạng thái random:</label>
    <select class="form-control border-input" id="status_random" name="status_random">
        <option value="0" <?php echo ($settings['status_random']=='0') ? 'selected':''; ?>>Bảo trì</option>
        <option value="1" <?php echo ($settings['status_random']=='1') ? 'selected':''; ?>>Hoạt động</option>
    </select> 
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="status">Trạng thái website:</label>
    <select class="form-control border-input" id="status" name="status">
        <option value="0" <?php echo ($settings['status']=='0') ? 'selected':''; ?>>Bảo trì</option>
        <option value="1" <?php echo ($settings['status']=='1') ? 'selected':''; ?>>Hoạt động</option>
    </select> 
  </div>
 </div>
</div>
<div class="footer">
<hr>
  <button type="submit" class="btn btn-default" id="setting_general">LƯU</button>
</div>
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>