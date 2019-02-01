<meta charset = "utf-8">

<?php


// Одностадийная оплата

$alphabet = '0123456789qwertyuiopasdfghjklzxcvbnm';				// генерируем идентификатор денежной операции
$order_id = '';
for ($j = 0; $j <= 20; $j++)
	{
		$order_id = $order_id.$alphabet[mt_rand(0, 35)];
	}
	
if (isset($_REQUEST['sitenumber'])) { $sitenumber = $_REQUEST['sitenumber']; }			// номер заявки
if (isset($_REQUEST['sum'])) { $sum = $_REQUEST['sum']; }								// сумма оплаты

if (isset($_REQUEST['surname'])) { $surname = $_REQUEST['surname']; }					// Фамилия
if (isset($_REQUEST['name'])) { $name = $_REQUEST['name']; }							// Имя
if (isset($_REQUEST['patronymic'])) { $patronymic = $_REQUEST['patronymic']; }			// Отчество
if (isset($_REQUEST['telephone'])) { $telephone = $_REQUEST['telephone']; }				// Телефон

if (isset($_REQUEST['accountnumber'])) { $accountnumber = $_REQUEST['accountnumber']; }	 // код заявки

$vars = array();
$vars['userName'] = 'clubprovincia-api';
$vars['password'] = 'clubprovincia';

// ID заказа в магазине.
$vars['orderNumber'] = $order_id;
    
// Сумма заказа в копейках.
$vars['amount'] = $sum * 100;
    
// URL куда клиент вернется в случае успешной оплаты.
$vars['returnUrl'] = 'http://proton938.ru/config/success_payment.php';
    
// URL куда клиент вернется в случае ошибки.
$vars['failUrl'] = 'http://proton938.ru/config/error_payment.php';

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
	require_once '../../base/connection_base.php';
	
	$date_today = date("d.m.Y H:i");									

	$db->query('INSERT INTO hotel_accountpayments (	SITEPAY,
													BANK_ORDER_ID,
													SITENUMBER,
													DATEDOC,
													IDPAYMENTTYPE,
													COMMENT,
													SUMMA,
													IDPROFITGROUP 
													)	
													VALUES
														  (	"'.$order_id.'",
															"'.$res['orderId'].'",
															"'.$sitenumber.'",
															"'.$date_today.'",
															"77",
															"Оплата через сайт",
															"'.$sum.'",
															"11"
																)
																');
    
    echo '
		<iframe	style = "width: 610px; height: 720px; position: relative; float: left; overflow: auto; z-index: 990; border: none; "	src = "'.$res['formUrl'].'"  >
		</iframe>
		
		<input 	type = "button" 
				style = "position: absolute;
						right: 0px; 
						top: 0px; 
						z-index: 999;
						background: rgba(255, 165, 0, 1); 
						border: none; padding: 3px 10px 3px 10px; 
						border-radius: 5px;
						font-size: 25px; 
						cursor: pointer;" value = "X"
						onclick = "back_insert()"
						>
		
		<script>
		
			function back_insert()
				{
					document.getElementById("load_request_sberbank").style.width = "0px";
					document.getElementById("load_request_sberbank").style.height = "0px";
					$("#load_request_sberbank").load("../load/dummy.txt")
				}
				
		</script>';
		
}


