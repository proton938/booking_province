<meta charset = "utf-8">

<?php

// Одностадийная оплата

$order_id = 'trtrtrtr65446';
$sum  = 3000;

$vars = array();
$vars['userName'] = 'clubprovincia-api';
$vars['password'] = 'clubprovincia';

// ID заказа в магазине.
$vars['orderNumber'] = $order_id;
    
// Сумма заказа в копейках.
$vars['amount'] = $sum * 100;
    
// URL куда клиент вернется в случае успешной оплаты.
$vars['returnUrl'] = 'http://proton938.ru/test/success_payment.php';
    
// URL куда клиент вернется в случае ошибки.
$vars['failUrl'] = 'http://proton938.ru/test/error_payment.php';

// Описание заказа, не более 24 символов, запрещены % + \r \n
$vars['description'] = 'Оплата за проживание';

$ch = curl_init('https://3dsec.sberbank.ru/payment/rest/register.do?' . http_build_query($vars)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);

curl_close($ch);



// обрабатываем ответ в JSON в переменной $res

$res = json_decode($res, JSON_OBJECT_AS_ARRAY);
if (empty($res['orderId'])){
    // Возникла ошибка:
    echo $res['errorMessage'];                        
} else {
    // Успех:
    // Тут нужно сохранить ID платежа в своей БД - $res['orderId']

    // Перенаправление клиента на страницу оплаты.
    header('Location: ' . $res['formUrl'], true);
    
    // Или на JS
    echo '<script>document.location.href = "' . $res['formUrl'] . '"</script>';
}


