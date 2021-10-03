<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');

if (is_client()) {
  load_url('/'); die();
}
//thong tin app
$fb_app_id = '2512555152315268';
$fb_app_secret = 'd84ebe9c950befcbb37ff5a42287254e';


// added in v4.0.0
include 'core/src/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( $fb_app_id , $fb_app_secret);
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://'.$_SERVER["SERVER_NAME"].'/oauth.php');
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id'); // To Get Facebook ID
 	    $fbfullname = $db->real_escape_string($graphObject->getProperty('name')); // To Get Facebook full name
	    //$token = $db->real_escape_string($session->getAccessToken());
    
    $token = md5($_SERVER['REMOTE_ADDR'] . uniqid(mt_rand(), true));
    
	/* ---- Session Variables -----*/
    if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '".$fbid."'") == 0) {
        $db->query("INSERT INTO `accounts` (`username`,`name`,`cash`,`datetime`,`token`,`expired_token`) VALUES ('".$fbid."','".$fbfullname."','0','".$date_current."','".md5($token)."','".time()."')");
    }else{
        $db->query("UPDATE `accounts` SET `token` = '".md5($token)."',`expired_token` = '".time()."' WHERE `username` = '".$fbid."'");//update
    }
	load_url('https://shophip.vn/check-token.php?uid='.$fbid.'&token='.$token);die();
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
