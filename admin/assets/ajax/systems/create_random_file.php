<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$path = $root."/admin/assets/ajax/systems/luauytin.txt";
if(!is_admin()){die();}
if($_POST){
    if(is_admin()){
        $type = $_POST['type'];

       // file
        if ($_FILES["file_acc"]["error"] == 0) {
         if(in_array(strtolower(end(explode('.',$_FILES['file_acc']['name']))),array("txt")) === true ){
            move_uploaded_file($_FILES["file_acc"]["tmp_name"], $path);
            //up lên data
            $myfile = fopen($path,'r');
            while(!feof($myfile)) {
	            $info = explode('|', fgets($myfile));
	            $db->query("INSERT INTO `acc_random` (username,password,type,status) VALUES ('".$info[0]."','".$info[1]."','$type','0')");
            }
            unlink($path);
            
echo 
'<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Upload Thành công !"
            },{
                type: "success",
                timer: 4000
            });
            window.location = "random";
      });
</script>';

         }else{
echo 
'<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "File không hợp lệ !"
            },{
                type: "warning",
                timer: 4000
            });

      });
</script>';
         }
            
        }else{
echo 
'<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "File không tồn tại !"
            },{
                type: "warning",
                timer: 4000
            });

      });
</script>';

        }


}else{?>
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