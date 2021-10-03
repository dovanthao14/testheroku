<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if (is_client() || !$_GET || $_SERVER["SERVER_NAME"] != $maindomain) {load_url('https://'.$maindomain.'/'); die();}

$token = $db->real_escape_string(md5(GET('token')));
$uid = $db->real_escape_string(GET('uid'));

if ($db->check_token($uid,$token) && is_numeric($uid)){$_SESSION["user"] = $uid;}

load_url('https://'.$maindomain.'/'); die();