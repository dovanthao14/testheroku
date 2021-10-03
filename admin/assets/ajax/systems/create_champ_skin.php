<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$status = "";
if(!is_admin()){die();}
if($_POST){
    if(is_admin()){
    $type = $_POST['type'];
    $name = $_POST['name'];
    $img_name = $_FILES['image']['name'];
    $vip = $_POST['vip'];
    $add_time = time();
    $path = $root."/assets/images/".$type;
    
    if(!empty($name) && ($_FILES["image"]["error"] == 0)){
    if($db->fetch_row("SELECT COUNT(*) FROM `{$type}` WHERE `name` = '{$name}' OR `img_name` = '{$img_name}'") == 0){    
    
    //them data
    $db->query("INSERT INTO `{$type}` (name,vip,img_name,add_time) VALUES 
        ('$name','$vip','$img_name','$add_time')");
    
    //Up ảnh    
    if ($_FILES["image"]["error"] == 0) {
        if(in_array(strtolower(end(explode('.',$_FILES['image']['name'][$i]))),array("jpeg","jpg","png")) === true ){
            $arr = explode(".", $_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $path."/".$_FILES["image"]["name"]);
        }
    }
    $status = "success";
    }else{$status = "error";$msg = "File hoặc tên bị trùng !";}
        
    }else{$status = "error";$msg = "Thiếu tên hoặc chưa có file ảnh !";}
    
    }else{$status = "error";$msg = "Bạn chưa đăng nhập hoặc không phải admin !";}
}
?>
<?php if($status == "success"){?>
<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Upload thành công !"
            },{
                type: 'success',
                timer: 4000
            });
        setTimeout(function () {
            window.location.href = "";}, 2000);
      });
</script>    
<?php }elseif($status == "error"){?>
<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "<?php echo $msg;?>"
            },{
                type: 'warning',
                timer: 4000
            });
        setTimeout(function () {
            window.location.href = "<?php echo $wedget?>";}, 2000);
      });
</script>
<?php }?>