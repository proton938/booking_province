<meta charset = "utf-8">

<?php

$vars = array();
$vars['userName'] = 'clubprovincia-api';
$vars['password'] = 'clubprovincia';
$vars['orderId'] = 'e91b2fef-4a36-7a17-9dda-362c04b1c343';

$ch = curl_init('https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do?' . http_build_query($vars));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_decode($res, JSON_OBJECT_AS_ARRAY);
print_r($res);
echo '<br><br>';
echo 'Статус: '.$res['orderStatus'];


$orderStatus = array(
    0 => 'Заказ зарегистрирован, но не оплачен',
    1 => 'Предавторизованная сумма захолдирована (для двухстадийных платежей)',
    2 => 'Проведена полная авторизация суммы заказа',
    3 => 'Авторизация отменена',
    4 => 'По транзакции была проведена операция возврата',
    5 => 'Инициирована авторизация через ACS банка-эмитента',
    6 => 'Авторизация отклонена',
);


echo '<br><br>'.$orderStatus[$res['orderStatus']].'<br><br>';

echo ($res['paymentAmountInfo']['approvedAmount'] / 100).'р.<br><br>'; 

echo ($res['paymentAmountInfo']['refundedAmount'] / 100).'р.<br><br>';