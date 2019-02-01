<meta charset = "utf-8">

<?php

// Сумма возврата.
$sum = 700;

$vars = array();
$vars['userName'] = 'clubprovincia-api';
$vars['password'] = 'clubprovincia';
$vars['orderId'] = 'a3dda87c-5bb2-7dca-93cd-9f0104b1c343';
$vars['amount'] = $sum * 100;

$ch = curl_init('https://3dsec.sberbank.ru/payment/rest/refund.do?' . http_build_query($vars));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_decode($res, JSON_OBJECT_AS_ARRAY);
if (!empty($res['errorCode'])) {
    echo $res['errorMessage'];
} else {
    echo $sum . 'р. возвращены плательщику';
}