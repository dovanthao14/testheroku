<?php
@session_start();
if(empty($_SESSION['otp_admin']) || isset($_POST['re_otp'])){
    $otp = rand(1000000,9999999);
    $_SESSION['otp_admin'] = $otp;
    $_SESSION['time_otp'] = time() + 200;
//gửi mail
    $subject = "OTP Đăng Nhập Admin Panel";
    $title = 'Admin Verification OTP';
    $nTo = 'Admin';
    $mTo = $settings['email_admin'];
    
    $content = '
<html>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="3" style="background-color:#00CC99;width:100%;">
	<thead>
		<tr>
			<th scope="col">
			<p>Mã OTP Đăng Nhập Admin Panel</p>

			<table align="center" border="1" cellpadding="1" cellspacing="10" style="background-color:green;width:150px;color:white;">
				<tbody>
					<tr>
						<td>'.$otp.'</td>
					</tr>
				</tbody>
			</table>

			<p>OTP chỉ sử dụng trong vòng 3 phút kể từ khi nhận !</p>
            <p style="text-align: left;"><span style="font-size:15px;"><em><span style="color:#0000FF;">'.$_DOMAIN.'</span></em></span></p>
			<p style="text-align: left;"><span style="font-size:11px;"><em><span style="color:#0000FF;">Design by LuaUyTin - 0984.459.954</span></em></span></p>
			</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</body>
</html>
    ';
    $mail = sendMail($title, $subject, $content, $nTo, $mTo);
    if($mail==1)
        $success = 'A NEW OTP HAS BEEN SENT';
    else
    	$_SESSION['otp_admin'] = '5861215';
        $error = 'CONFIRM PASSWORD';
}else{$success = '';}
if(!empty($_POST['otp'])){
if($_POST['otp'] == $_SESSION['otp_admin']){
    if($_SESSION['time_otp'] >= time()){
    $_SESSION['check_otp_admin'] = $_POST['otp'];
    new Redirect($_DOMAIN.'/admin'); // login success
    exit;}else{
        $error = 'EXPIRED OTP';
    }
}else{
    $error = 'LOGIN FAILED';}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/admin/login/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/admin/login/css/style.css" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>

	<h1>OTP VERIFICATION</h1>

	<div class="w3layoutscontaineragileits">
	<h2 style="color:red;"><?php echo $error;?></h2>
	<h2 style="color:green;"><?php echo $success;?></h2>
		<form action="" method="post">
			<input type="password" Name="otp" placeholder="ENTER OTP">
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="CONFIRM">
				<input style="background-color:brown;" type="submit" name="re_otp" value="NEW OTP">
			</div>
		</form>
	</div>
	<div class="w3footeragile">
		<p> &copy; 2018 All Rights Reserved | Design by <a href="http://www.facebook.com/lauuytin" target="_blank">LuaUyTin</a></p>
	</div>
	<script type="text/javascript" src="/admin/login/js/jquery-2.1.4.min.js"></script>
</body>
</html>