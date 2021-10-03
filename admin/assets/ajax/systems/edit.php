<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/

$path = $root."/assets/files/";
$id = GET("id");
if (!$id || !is_admin()){die();}else{
if($db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `id` = '{$id}'") == 0){echo 'Có lỗi !';die();}
$products = $db->fetch_assoc("SELECT * FROM `products` WHERE `id` = '{$id}' LIMIT 1", 1);
$text_champ = text($products['champs']);
$text_skin = text($products['skins']); 
} 
if($_POST){
    if(is_admin()){
    // ghép post skin
    if(!empty($_POST["skin"])){
    $skin = '';
        foreach($_POST["skin"] as $row){
            $skin .= $row . ', ';
        }     
    $_POST["skins"] = substr($skin, 0, -2);
    }else{
    $_POST["skins"] = "";    
    }
    
    // ghép post champ
    if(!empty($_POST["champ"])){    
    $champ = '';
        foreach($_POST["champ"] as $row){
            $champ .= $row . ', ';
        }     
    $_POST["champs"] = substr($champ, 0, -2); 
    }else{
    $_POST["champs"] = "";    
    }
    

    $type_account = !empty($_POST['type_account']) ? addslashes(htmlspecialchars($_POST['type_account'])) : '';
    $total_info = !empty($_FILES['info']['name']) ? count($_FILES['info']['name']) : 0;
    $username = !empty($_POST['username']) ? addslashes(htmlspecialchars($_POST['username'])) : '';
    $password = !empty($_POST['password']) ? addslashes(htmlspecialchars($_POST['password'])) : '';
    $price = !empty($_POST['price']) ? addslashes(htmlspecialchars($_POST['price'])) : 0;
    $gem_count = !empty($_POST['gem_count']) ? addslashes(htmlspecialchars($_POST['gem_count'])) : 0;
    $skins_count = !empty($_POST['skins_count']) ? addslashes(htmlspecialchars($_POST['skins_count'])) : 0;
    $skins = !empty($_POST['skins']) ? addslashes(htmlspecialchars($_POST['skins'])) : '';
    $champs_count = !empty($_POST['champs_count']) ? addslashes(htmlspecialchars($_POST['champs_count'])) : 0;
    $champs = !empty($_POST['champs']) ? addslashes(htmlspecialchars($_POST['champs'])) : '';
    $rank = !empty($_POST['rank']) ? addslashes(htmlspecialchars($_POST['rank'])) : '';
    $note = !empty($_POST['note']) ? addslashes(htmlspecialchars($_POST['note'])) : '';
    $sdt = !empty($_POST['sdt']) ? addslashes(htmlspecialchars($_POST['sdt'])) : '';
    $cmnd = !empty($_POST['cmnd']) ? addslashes(htmlspecialchars($_POST['cmnd'])) : '';
    $email = !empty($_POST['email']) ? addslashes(htmlspecialchars($_POST['email'])) : '';

if(empty($type_account) || empty($username) || empty($password)):
        echo '
<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Có lỗi. Vui lòng thử lại !"
            },{
                type: "warning",
                timer: 4000
            });
        setTimeout(function () {
            window.location.href = "/";}, 2000);
      });
</script>';
    else:

    $db->query("UPDATE `products` SET `username` = '{$username}',`password` = '{$password}',`price` = '{$price}',`gem_count` = '{$gem_count}',`skins_count` = '{$skins_count}',`skins` = '{$skins}',`champs_count` = '{$champs_count}',`champs` = '{$champs}',`rank` = '{$rank}',`note` = '{$note}',`type_account` = '{$type_account}',`sdt` = '{$sdt}',`cmnd` = '{$cmnd}',`email` = '{$email}' WHERE `id` = '{$id}'");

        // ảnh thông tin
        for ($i = 0; $i < $total_info; $i++) {
          if ($_FILES["info"]["error"][$i] == 0) {
            if(in_array(strtolower(end(explode('.',$_FILES['info']['name'][$i]))),array("jpeg","jpg","png")) === true ){
             $arr = explode(".", $_FILES["info"]["name"][$i]);
             move_uploaded_file($_FILES["info"]["tmp_name"][$i], $path."post/".$id_new."-".($i + 1).".".end($arr));
            }
          }
       }
       // ảnh thumb
        if ($_FILES["thumb"]["error"] == 0) {
         if(in_array(strtolower(end(explode('.',$_FILES['thumb']['name']))),array("jpeg","jpg","png")) === true ){
            $arr = explode(".", $_FILES["thumb"]["name"]);
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."thumb/".$id_new.".".end($arr));
         }
        }
    endif;
?>

<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Edit ID #<?php echo "$id $type_account";?> thành công !"
            },{
                type: 'success',
                timer: 4000
            });
            setTimeout(function () {
            window.location.href = "/admin/<?php echo $widget;?>";}, 2000);

      });
</script>    
<?php }else{?>
<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Bạn chưa đăng nhập hoặc không phải admin"
            },{
                type: 'warning',
                timer: 4000
            });
        setTimeout(function () {
            window.location.href = "/";}, 2000);
      });
</script>
<?php }}?>