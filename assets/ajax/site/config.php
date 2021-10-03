<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//thong tin tich hop
$url         = 'https://naptudong.com/chargingws/v2'; 
$partner_id  = $settings['merchant_id']; //API key, lấy từ website thesieure.vn thay vào trong cặp dấu
$partner_key = $settings['merchant_key']; //API secret lấy từ website thesieure.vn thay vào trong cặp dấu '


    function creatSign($partner_key, $params)
    {
        $data = array();
        $data['request_id'] = $params['request_id'];
        $data['code'] = $params['code'];
        $data['partner_id'] = $params['partner_id'];
        $data['serial'] = $params['serial'];
        $data['telco'] = $params['telco'];
        $data['command'] = $params['command'];
        ksort($data);
        $sign = $partner_key;
        foreach ($data as $item) {
            $sign .= $item;
        }
		
		//return $sign;

        return md5($sign);
    }