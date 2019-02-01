<meta charset = "utf-8">

<?php

require_once '../../base/connection_base.php';

$payment_bufer = $db->query('SELECT * FROM hotel_accountpayments');    			// обращаемся к таблице истории платежей
$read_payment = $payment_bufer->fetchAll();

foreach ($read_payment as $payment_field)
	{
		if ($payment_field['BANK_ORDER_ID'] != '' && $payment_field['SUCCESS'] == '')
			{
				$vars = array();
				$vars['userName'] = 'clubprovincia-api';
				$vars['password'] = 'clubprovincia';
				$vars['orderId'] = $payment_field['BANK_ORDER_ID'];

				$ch = curl_init('https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do?' . http_build_query($vars));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				$res = curl_exec($ch);
				curl_close($ch);

				$res = json_decode($res, JSON_OBJECT_AS_ARRAY);   			
				
				if ($res['orderStatus'] == 2)    // если статус платежа = 2 (Проведена полная авторизация суммы заказа)
					{
						// запоминаем уникальное имя файла платежа
						$db->query('UPDATE hotel_accountpayments SET FILE_NAME = "payment_'.$payment_field['id'].'.xml" WHERE id = "'.$payment_field['id'].'"');
						// отмечаем успешность платежа
						$db->query('UPDATE hotel_accountpayments SET SUCCESS = "1" WHERE id = "'.$payment_field['id'].'"'); 
						
						
						
						$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$payment_field['SITENUMBER'].'"');     // обращаемся к таблице для delfin
						$read_request = $request_bufer->fetchAll();
						
						$db->query('UPDATE hotel_accounts SET APPROVAL = "1" WHERE SITENUMBER = "'.$payment_field['SITENUMBER'].'"'); 
						
						$number_bufer = $db->query('SELECT * FROM numbers');			// обращаемся к таблице прайса номеров
						$read_number = $number_bufer->fetchAll();
						
						foreach ($read_request as $request_field)
							{
								$rate_bufer =  $db->query('SELECT * FROM rate WHERE id_room = "'.$request_field['IDROOM'].'"');			// обращаемся к таблице цен
								$read_rate = $rate_bufer->fetchAll();
								
								foreach ($read_rate as $rate_field)
									{
										$current_number_id = $rate_field['id'];						// выводим номер
										$name_room = $rate_field['name_room'];	
									}
									
								$checkin =	$request_field['CHECKIN'];								// дата заезда
								$checkin = preg_split('/\./', $checkin);
								
								$checkout =	$request_field['CHECKOUT'];								// дата выезда
								$checkout = preg_split('/\./', $checkout);
								
								require '../../requests/report_payment_mail.php';  					// отправляем отчет о оплате на почту
							}
						
						$switch = 0;
						
						foreach ($read_number as $number_field)
							{
								if ($number_field['year']==$checkin[2] && $number_field['month']==$checkin[1] && $number_field['date']==$checkin[0])
									{										
										 $switch = 1;	
									}
								if ($number_field['year']==$checkout[2] && $number_field['month']==$checkout[1] && $number_field['date']==$checkout[0])
									{										
										 $switch = 0;	
									}
								if ($switch == 1)
									{
										// капитальное бронирование - вводим 1 в соответствующее поле
										$db->query('UPDATE numbers SET number_'.$current_number_id.' = "1" WHERE id = "'.$number_field['id'].'"'); 
									}
							}
						
						
						
						//Создает XML-строку и XML-документ при помощи DOM 
						$dom = new DomDocument('1.0', 'UTF-8');
						
						//добавление корня - <data> 
						$data = $dom->appendChild($dom->createElement('data'));
						
						//добавление корня - <table> 
						$table = $data->appendChild($dom->createElement('table'));
						// добавление элемента текстового узла <table> в <table> 
						$table->appendChild($dom->createTextNode('HOTEL_ACCOUNTPAYMENTS'));
						
						//добавление корня - <row> 
						$row = $data->appendChild($dom->createElement('row'));
						
						//добавление элемента <SITEPAY> в <row> 
						$SITEPAY = $row->appendChild($dom->createElement('SITEPAY')); 
						// добавление элемента текстового узла <SITEPAY> в <SITEPAY> 
						$SITEPAY->appendChild($dom->createTextNode($payment_field['SITEPAY']));
						
						//добавление элемента <SITENUMBER> в <row> 
						$SITENUMBER = $row->appendChild($dom->createElement('SITENUMBER')); 
						// добавление элемента текстового узла <SITENUMBER> в <SITENUMBER> 
						$SITENUMBER->appendChild($dom->createTextNode($payment_field['SITENUMBER']));
						
						//добавление элемента <DATEDOC> в <row> 
						$DATEDOC = $row->appendChild($dom->createElement('DATEDOC')); 
						// добавление элемента текстового узла <DATEDOC> в <DATEDOC> 
						$DATEDOC->appendChild($dom->createTextNode($payment_field['DATEDOC']));
						
						//добавление элемента <IDPAYMENTTYPE> в <row> 
						$IDPAYMENTTYPE = $row->appendChild($dom->createElement('IDPAYMENTTYPE')); 
						// добавление элемента текстового узла <IDPAYMENTTYPE> в <IDPAYMENTTYPE> 
						$IDPAYMENTTYPE->appendChild($dom->createTextNode($payment_field['IDPAYMENTTYPE']));
						
						//добавление элемента <COMMENT> в <row> 
						$COMMENT = $row->appendChild($dom->createElement('COMMENT')); 
						// добавление элемента текстового узла <COMMENT> в <COMMENT> 
						$COMMENT->appendChild($dom->createTextNode($payment_field['COMMENT']));
						
						//добавление элемента <SUMMA> в <row> 
						$SUMMA = $row->appendChild($dom->createElement('SUMMA')); 
						// добавление элемента текстового узла <SUMMA> в <SUMMA> 
						$SUMMA->appendChild($dom->createTextNode($payment_field['SUMMA']));
						
						//добавление элемента <IDPROFITGROUP> в <row> 
						$IDPROFITGROUP = $row->appendChild($dom->createElement('IDPROFITGROUP')); 
						// добавление элемента текстового узла <IDPROFITGROUP> в <IDPROFITGROUP> 
						$IDPROFITGROUP->appendChild($dom->createTextNode($payment_field['IDPROFITGROUP']));
						
						//генерация xml 
						$dom->formatOutput = true; // установка атрибута formatOutput
												   // domDocument в значение true 
						// save XML as string or file 
						$test1 = $dom->saveXML(); // передача строки в файл
						
						
						$dom->save('../../requests/import/payment_'.$payment_field['id'].'.xml'); // сохранение файла 
					}
			}
	}

echo '
<center>
	<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 450px; background: #CAA79C; position: relative; ">
		<div style = "position: relative; top: 100px; width: 300px; height: 300px;  background: #fff; border-radius: 100%;">
		<br>
		<br>
		<br>
		<br>
			<img src = "../province_74/images/big_logo_provance.png" style = "width: 300px;">
		</div>
		<br>
		<br>
		<br>
		<br>
		<p style = " font-size: 30px; color: #fff; font-family: calibri; font-weight: bold; letter-spacing: 2px; ">
			Оплата прошла успешно!<br><br>
		</p>
	</div>
	
	<p style = " font-size: 40px; color: #CAA79C; font-family: calibri; font-weight: bold; letter-spacing: 2px; ">
		Добро пожаловать!
	</p>
</center>
';

?>

