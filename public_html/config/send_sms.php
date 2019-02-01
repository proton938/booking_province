<?php

if ($_REQUEST['number']) {$number = $_REQUEST['number'];}

$digits = '0123456789';
$text = '';
for ($i = 0; $i <= 3; $i++)
	{
		$text = $text.$digits[mt_rand(0, 9)];
	}
	
$f = fopen('../../history/reg_'.$number.'.txt', 'w');	// сохраняем код авторизации телефона для проверки
fwrite($f, $text);										
fclose($f);
	
/*

$channel = 'DIRECT';
$dateSend = '1510656981';
$callbackUrl = 'proton938.ru';

include_once('../config/SmsaeroApiV2.class.php');
use SmsaeroApiV2\SmsaeroApiV2;

$smsaero_api = new SmsaeroApiV2('proton938@mail.ru', 'aOnOIqfE5sHlV3mhxh7CZqYB6uer', 'SMS Aero'); // api_key из личного кабинета

var_dump($smsaero_api->send([$number], $text, 'DIRECT')); // 

 */
?>