<meta charset = "utf-8">

<?php
  
$data = 'amount;123456;mdOrder;3ff6962a-7dcc-4283-ab50-a6d7dd3386fe;operation;deposited;orderNumber;10747;status;1;';
$key = '9na06usmbdmbrqsuetva9aio57';
$hmac = hash_hmac ( 'sha256' , $data , $key);
  
echo "[$hmac]\n";
?>


<?php

$client = new SoapClient('https://3dsec.sberbank.ru/payment/webservices/merchant-ws?wsdl');

echo '<br><br>getFunctions<br><br>';
var_dump($client->__getFunctions());
$n = $client->__getFunctions();
echo '<br><br>'.$n[0].' _ '.count($n);

echo '<br><br>doRequest<br><br>';
var_dump($client->__doRequest());
echo '<br><br>';

echo '<br><br>';
var_dump($client->__doRequest());
echo '<br><br><br><br>getCookies<br><br>';
var_dump($client->__getCookies());

echo '<br><br><br><br>getTypes<br><br>';
var_dump($client->__getTypes());

echo '<br><br>soapCall<br>';
var_dump($client->__soapCall());


/*
URL для доступа к методам REST:
Название метода URL
Регистрация заказа https://3dsec.sberbank.ru/payment/rest/register.do
Регистрация заказа с предавторизацией https://3dsec.sberbank.ru/payment/rest/registerPreAuth.do
Запрос завершения оплаты заказа https://3dsec.sberbank.ru/payment/rest/deposit.do
Запрос отмены оплаты заказа https://3dsec.sberbank.ru/payment/rest/reverse.do
Запрос возврата средств оплаты заказа https://3dsec.sberbank.ru/payment/rest/refund.do
Получение статуса заказа https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do
Запрос проверки вовлеченности карты в 3DS https://3dsec.sberbank.ru/payment/rest/verifyEnrollment.do
Запрос проведения оплаты по связкам https://3dsec.sberbank.ru/payment/rest/paymentOrderBinding.do
Запрос деактивации связки https://3dsec.sberbank.ru/payment/rest/unBindCard.do
Запрос активации связки https://3dsec.sberbank.ru/payment/rest/bindCard.do
Запрос изменения срока действия связки https://3dsec.sberbank.ru/payment/rest/extendBinding.do
Запрос списка всех связок клиента https://3dsec.sberbank.ru/payment/rest/getBindings.do
Запрос списка связок определённой банковской карты https://3dsec.sberbank.ru/payment/rest/getBindingsByCardOrId.do
Запрос оплаты через Apple Pay https://3dsec.sberbank.ru/payment/applepay/payment.do
Запрос оплаты через Samsung Pay https://3dsec.sberbank.ru/payment/samsung/payment.do
Запрос оплаты через Samsung Pay Web https://3dsec.sberbank.ru/payment/samsungWeb/payment.do
Запрос оплаты через Google Pay https://3dsec.sberbank.ru/payment/google/payment.do
*/
?>



