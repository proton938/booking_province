<?php

if (isset($_REQUEST['user_number'])) { $user_number = $_REQUEST['user_number']; }                  	// номер пользователя в таблице
if (isset($_REQUEST['number_request'])) { $number_request = $_REQUEST['number_request']; }			// номер заявки
if (isset($_REQUEST['booking'])) { $booking = $_REQUEST['booking']; }								// содержимое заявки
if (isset($_REQUEST['payment_type'])) { $payment_type = $_REQUEST['payment_type']; }				// тип оплаты
	
	$booking = preg_split('/ number:/', $booking);
	
	require_once '../../base/connection_base.php';
	
	$number_bufer = $db->query('SELECT * FROM numbers');			  // обращаемся к таблице прайса номеров
	$read_number = $number_bufer->fetchAll();
	
	foreach ($read_number as $number_field)
		{
			for ($i = 1; $i <= count($booking)-1; $i++)				  // выводим брони всех номеов в доме
				{
					$dates = preg_split('/dates:/', $booking[$i]);    
					$hotel_number = $dates[0];						  // гостиничный номер
					$dates = $dates[1];
					
					$every_date = preg_split('/;/', $dates);			// перечитываем даты в заявке			
										
					for ($j=0; $j<=count($every_date)-1; $j++)
						{							
							$date = preg_split('/\./', $every_date[$j]);
							$year = $date[2];
							$month = $date[1];
							$date = $date[0];
							
							if ($number_field['year']==$year && $number_field['month']==$month && $number_field['date']==$date)
								{
									
									// отменяем капитальное бронирование - вводим 0 в соответствующее поле
									$db->query('UPDATE numbers SET number_'.$hotel_number.' = "0" WHERE id = "'.$number_field['id'].'"');  	
								}
						}
				}
		}
		
						

	$history_bufer =  $db->query('SELECT * FROM history WHERE id = "'.$number_request.'"');			// обращаемся к таблице истории конкретного пользователя по id 
	$read_history = $history_bufer->fetchAll();

	$db->query('UPDATE history SET approval = "" WHERE id = "'.$number_request.'"'); 
	
	
	foreach($read_history as $history_field)													// выводим номера заявок
		{
			$counter_request = preg_split('/,/', $history_field['request_code']);
			for ($i = 0; $i <= count($counter_request)-2; $i++)
				{	
					$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$counter_request[$i].'"');     // обращаемся к таблице для delfin				
					$read_request = $request_bufer->fetchAll();
					
					foreach ($read_request as $request_field)
						{
							$payment = $request_field['BALANCE'];
						}
							
					$alphabet = '0123456789qwertyuiopasdfghjklzxcvbnm';				// генерируем идентификатор денежной операции
					$code_payment = '';
					for ($j = 0; $j <= 20; $j++)
						{
							$code_payment = $code_payment.$alphabet[mt_rand(0, 35)];
						}
						
					$date_today = date("d.m.Y H:i");									

					$db->query('INSERT INTO hotel_accountpayments (	SUCCESS,
																	SITEPAY,
																	SITENUMBER,
																	DATEDOC,
																	IDPAYMENTTYPE,
																	COMMENT,
																	SUMMA,
																	IDPROFITGROUP 
																	)	
																	VALUES
																		  (	"1",
																			"'.$code_payment.'",
																			"'.$counter_request[$i].'",
																			"'.$date_today.'",
																			"'.$payment_type.'",
																			"Возврат",
																			"'.$payment.'",
																			"11"
																				)
																				');
																				
																				
																				
					$hotel_accountpayments_bufer = $db->query('SELECT * FROM hotel_accountpayments');					// обращаемся к таблице платежей 
					$read_hotel_accountpayments = $hotel_accountpayments_bufer->fetchAll();
					foreach ($read_hotel_accountpayments as $hotel_accountpayments_field)
						{
							$id_payment = $hotel_accountpayments_field['id'];											// выводим номер платежа
						}
						
					// запоминаем уникальное имя файла платежа
					$db->query('UPDATE hotel_accountpayments SET FILE_NAME = "payment_'.$id_payment.'.xml" WHERE id = "'.$id_payment.'"'); 
													
													
					
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
					$SITEPAY->appendChild($dom->createTextNode($code_payment));
					
					//добавление элемента <SITENUMBER> в <row> 
					$SITENUMBER = $row->appendChild($dom->createElement('SITENUMBER')); 
					// добавление элемента текстового узла <SITENUMBER> в <SITENUMBER> 
					$SITENUMBER->appendChild($dom->createTextNode($counter_request[$i]));
					
					//добавление элемента <DATEDOC> в <row> 
					$DATEDOC = $row->appendChild($dom->createElement('DATEDOC')); 
					// добавление элемента текстового узла <DATEDOC> в <DATEDOC> 
					$DATEDOC->appendChild($dom->createTextNode($date_today));
					
					//добавление элемента <IDPAYMENTTYPE> в <row> 
					$IDPAYMENTTYPE = $row->appendChild($dom->createElement('IDPAYMENTTYPE')); 
					// добавление элемента текстового узла <IDPAYMENTTYPE> в <IDPAYMENTTYPE> 
					$IDPAYMENTTYPE->appendChild($dom->createTextNode($payment_type));
					
					//добавление элемента <COMMENT> в <row> 
					$COMMENT = $row->appendChild($dom->createElement('COMMENT')); 
					// добавление элемента текстового узла <COMMENT> в <COMMENT> 
					$COMMENT->appendChild($dom->createTextNode('Возврат'));
					
					//добавление элемента <SUMMA> в <row> 
					$SUMMA = $row->appendChild($dom->createElement('SUMMA')); 
					// добавление элемента текстового узла <SUMMA> в <SUMMA> 
					$SUMMA->appendChild($dom->createTextNode($payment));
					
					//добавление элемента <IDPROFITGROUP> в <row> 
					$IDPROFITGROUP = $row->appendChild($dom->createElement('IDPROFITGROUP')); 
					// добавление элемента текстового узла <IDPROFITGROUP> в <IDPROFITGROUP> 
					$IDPROFITGROUP->appendChild($dom->createTextNode('11'));
					
					//генерация xml 
					$dom->formatOutput = true; // установка атрибута formatOutput
											   // domDocument в значение true 
					// save XML as string or file 
					$test1 = $dom->saveXML(); // передача строки в test1 
					
					
					$dom->save('../../requests/import/payment_'.$id_payment.'.xml'); // сохранение файла 
												
				}
		}
	
	
	echo '<script>setTimeout("load_user_history_'.$user_number.'()", 100);</script>';