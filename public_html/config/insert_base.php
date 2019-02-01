<head>
	<meta charset = "utf-8">
	<link href = "../css/styles.css" rel = "stylesheet"  type = "text/css" media = "all">
	
	<script type="text/javascript" src = "../js/scripts.js"></script>
	<script type="text/javascript" src = "../js/jquery-3.1.1.js"></script>
	
</head>

<br><br><br>
<div style = "	position: relative; 
				left: 0px; 
				top: 0px; 
				width: 98%; 
				background: #fff; 
				padding: 10px; 
				border-radius: 5px; 
				background: rgba(245, 245, 245, 1); 
				overflow: auto; 
				-webkit-overflow-scrolling: touch;">
<center>
<div style = "position: relative; background: #fff; left: 0px; top: 0px; width: 0px; height: 0px; overflow: auto;  z-index: 999; -webkit-overflow-scrolling: touch;" id = "load_request_sberbank">
</div>
</center>



<?php


$number_house = preg_split('/№/', $_POST['number_house']); 			// считываем номер дома
$number_house_for_history = $number_house[1];						// номер дома без приставки "house_" для истории пользователя 
$number_house = 'house_'.$number_house[1];
$number_house = substr($number_house, 0, -1);

$my_history = $_POST['again_my_history'];


$surname = $_POST['surname'];                       				// считываем фамилию
$name = $_POST['name'];												// считываем имя
$patronymic = $_POST['patronymic'];									// считываем отчество
$telephone = $_POST['telephone'];									// считываем телефон
$email = $_POST['email'];											// считываем email

$sum = $_POST['sum_confirm'];										// считываем сумму к оплате

$payment = 0;														// предоплата

if (isset($_POST['payment_100']))
	{
		$prepayment = 1;	// 100%
	}
if (isset($_POST['payment_30']))
	{
		$prepayment = 0.3;	// 30%		
	}
	
	
$payment = $sum*$prepayment;

$type_rate = $_POST['select_type_rate'];						// считываем тип оплаты


$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения	
$contents = file_get_contents($file); 							// считываем содержимое
$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"

for ($i = 1; $i <= count($contents)-2; $i++)           			// прочесываем выбранные мной даты ...
	{
		$tarif = preg_split('/,/', $contents[$i]);              // определяем тариф
		$tarif = $tarif[7];
	}
if($tarif == "RACK")
	{
		$name_tarif = 'Основной';
	}
if($tarif == "GM50")
	{
		$name_tarif = 'Gilmon';
	}
if($tarif == "MD") 
	{
		$name_tarif = 'Матери с детьми';
	}
	

require_once '../../base/connection_base.php';


$user_bufer = $db->query('SELECT * FROM user');    			// обращаемся к таблице пользователей
$read_user = $user_bufer->fetchAll();


$switch = 0;												// переключатель для определения есть ли данный пользователь среди ранее зарегистрированных

foreach ($read_user as $user_field)
	{
		if ($user_field['telephone'] == $telephone)			// есть ли уже этот пользователь в списке ...
			{
				$switch = 1;
				$user_number = $user_field['id'];          // запоминаем идентификационный номер пользователя
			}
	}
if ($switch == 0)											// ... если нет - добавляем
	{
		$db->query('INSERT INTO user (surname, name, patronymic, telephone, email) VALUES ("'.$surname.'", "'.$name.'", "'.$patronymic.'", "'.$telephone.'", "'.$email.'")');
		$user_number = count($read_user) + 1;																// запоминаем идентификационный номер пользователя
	}
		
	

$house_bufer =  $db->query('SELECT * FROM house');			// обращаемся к таблице домов
$read_house = $house_bufer->fetchAll();

$number_bufer = $db->query('SELECT * FROM numbers');				// обращаемся к таблице гостиничных номеров
$read_number = $number_bufer->fetchAll();

$list_booking = '';											// суммируемый список брони в данной операции

foreach ($read_house as $house_field)
	{
		if ($house_field[$number_house] != '')              // если гостинничный номер number_n выведен (зависит от того сколько номеров в доме) ...
			{		
				$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения				
				$contents = file_get_contents($file); 							// считываем содержимое
				$contents = preg_split('/;/', $contents);
				
				$select_number = 0;                                         // переменная для проверки наличия выбора гостевого номера
				
				for ($i=1; $i<=count($contents)-2; $i++)
					{
						$verify_select_number = preg_split('/,/', $contents[$i]);
						
						if ($house_field[$number_house] == $verify_select_number[2])      // если в выбранных номерах есть данный номер ...
							{
								$select_number = 1;
							}
					}
				
				if ($select_number == 1)                                                  // ... проделываем процедуру оформления бронирования
					{
						$list_booking = $list_booking.'number:'.$house_field[$number_house].'dates:';
						
						for ($i=1; $i<=count($contents)-2; $i++)
							{
								$booking_date = preg_split('/,/', $contents[$i]);
								
								if ($house_field[$number_house] == $booking_date[2])
									{
										$current_number = $booking_date[2];           // читаем кол-во мест в номере для таблицы hotel_accounts
										
										$db->query('UPDATE numbers SET number_'.$house_field[$number_house].' = "0" WHERE id = "'.$booking_date[0].'"');  				// бронируем - вводим ноль в соответствующее поле
										$db->query('UPDATE numbers SET user_'.$house_field[$number_house].' = "'.$user_number.'" WHERE id = "'.$booking_date[0].'"');  // вводим идентификационный номер пользователя, осуществляющего бронь

										$list_booking = ' '.$list_booking.$booking_date[3].'.'.$booking_date[4].'.'.$booking_date[5].'; '; 		// суммируем выбранные даты для записи в историю пользователя

									}
							}	
					}

			}
	}
	
	
															
	$date_today = date("d.m.Y H:i"); 														
	$counter_request = '';														
																														
															
	$rate_bufer =  $db->query('SELECT * FROM rate');			// обращаемся к таблице цен
	$read_rate = $rate_bufer->fetchAll();
	
	
	
	
	
	$select_number = array(	1 => "0", 
							2 => "0", 
							3 => "0",
							4 => "0",);                             // вывод массива номеров в доме
	
	foreach ($read_rate as $rate_field) 
		{								
									
			$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения				
			$contents = file_get_contents($file); 							// считываем содержимое
			$contents = preg_split('/;/', $contents);
			
			for ($i=1; $i<=count($contents)-2; $i++)
				{
					$booking = preg_split('/,/', $contents[$i]);
					
					if ($rate_field['id'] == $booking[2])	      				// если гостинничный номер имеется в файле текущей сессии на момент запроса...
						{
							$switch = 0; 										// переключатель определяющий наличие элемента в массиве
							
							for ($j=1; $j<=4; $j++)								// ищем элемент в массиве
								{
									if($select_number[$j] == $booking[2])
										{
											$switch = 1;
										}
								}
								
							if ($switch == 0)
								{
									$loop = 0;                                          // замок для прерывания цикла
									
									for ($j=1; $j<=4; $j++)								// ищем элемент в массиве
										{
											if($select_number[$j] == 0 && $loop == 0)
												{
													$select_number[$j] = $booking[2];
													$loop = 1;
												}
										}
								}
							
						}
				}
		}
		
$number_request_for_user = 0;
	
for ($j=1; $j<=4; $j++)								
	{
		if ($select_number[$j] != 0)
			{	
	
				foreach ($read_rate as $rate_field) 
					{								
						
						if ($rate_field['id'] == $select_number[$j])
							{

								$counter_interval = 0;        	// счетчик интервалов проживания 
								$switch = 0;        		  	// переключатель  (условие определения пустой ячейки должно сработать по окончании интервала, но не до)                										

								$start = 0;						// id заезда
								$end = 0;						// id выезда
								
								$sum_interval = 0;              // сумма за интервал проживания

								foreach ($read_number as $number_field) 
									{		
										$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения				
										$contents = file_get_contents($file); 							// считываем содержимое
										$contents = preg_split('/;/', $contents);
										
										for ($i=1; $i<=count($contents)-2; $i++)
											{
												$booking = preg_split('/,/', $contents[$i]);
												
												if ($number_field['id'] == $booking[0] && $booking[2] == $select_number[$j] && $switch == 0)	      // если id даты имеется в файле текущей сессии на момент запроса...
													{
														$number_request_for_user++;
														$switch = 1;										// блокируем выключатель, что бы процедура определения даты заезда не сработала среди интервала
														$start = $number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'];		// ... выводим дату заезда
														echo '<center>
															<div id = "reg_payment_'.$number_request_for_user.'" style = "width: 600px; background: #fff; border: dotted 1px #bbb; padding: 10px;">
															Заявка №'.$number_request_for_user.'
															<a style = "float: right;">Гостиничный номер: '.$rate_field['name_room'].'</a><br><br>
															<center>
															<table cellspacing = "10px" style = "width: 80%; background: rgba(245, 245, 245, 1);; ">	
																<tr>
																	<td style = "width: 40%; height: 20px; font-size: 15px; color: #555; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px; ">
																		Заезд: 
																	</td>
																	<td style = "width: 40%; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px;">
																		<span style = "font-size: 17px; color: red;">'.$start.'</span>
																	</td>
																</tr>';
													}
												
												if ($number_field['id'] == $booking[0] && $booking[2] == $select_number[$j])	    // если id даты имеется в файле текущей сессии на момент запроса...
													{
														$counter_interval = $number_field['id'];
														$sum_interval = $sum_interval + $booking[6];
														$tarif = $booking[7];
														
														$tarif_bufer = $db->query('SELECT * FROM tarif WHERE code_tarif = "'.$tarif.'"');					// обращаемся к таблице тарифов
														$read_tarif = $tarif_bufer->fetchAll();
														
														foreach ($read_tarif as $tarif_field)
															{
																$id_tarif = $tarif_field['id_tarif'];
															}
													}
											}
											
										if ($counter_interval != $number_field['id'] && $switch == 1) 	 // когда последовательность дат в фале сессии прервалась ...
											{
												$end = $number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'];			// ... выводим дату выезда
												echo '	<tr>
															<td style = "width: 40%; height: 20px; font-size: 15px; color: #555; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px;">
																Выезд: 
															</td>
															<td style = "width: 40%; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px;">
																<span style = "font-size: 17px; color: red;">'.$end.'</span>
															</td>
														</tr>
														<tr>
															<td style = "width: 40%; height: 20px; font-size: 15px; color: #555; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px;">
																К оплате: 
															</td>
															<td style = "width: 40%; background: #fff; border: dotted 1px #bbb; padding: 5px 10px 5px 10px;">
																<span style = "font-size: 17px; color: red;">'.$sum_interval*$prepayment.'</span>
															</td>
														</tr>
													</table>
													</center>
													<br>
													<input 	onclick = "load_request_sberbank_'.$number_request_for_user.'(); 
																		document.getElementById(\'reg_payment_'.$number_request_for_user.'\').style.display = \'none\';" 
															type = "button" style = "background: rgba(255, 165, 0, 1); padding: 5px; -10px; border-radius: 5px; border: none; float: right;"
															value = "Оплатить"><br><br>
													</div></center><br>';
												$switch = 0;
												
												
												$alphabet = '0123456789qwertyuiopasdfghjklzxcvbnm';				// генерируем код заявки (номер заказа)
												$accountnumber = '';
												for ($i = 0; $i <= 9; $i++)
													{
														$accountnumber = $accountnumber.$alphabet[mt_rand(0, 35)];
													}
													
												echo '<script>
														function load_request_sberbank_'.$number_request_for_user.'()
															{
																document.getElementById("load_request_sberbank").style.width = "620px";
																document.getElementById("load_request_sberbank").style.height = "720px";
																$("#load_request_sberbank").load("../config/request_sberbank.php", "sitenumber='.$accountnumber.'&sum='.$sum_interval*$prepayment.'");
															}
													</script>';
													
												$counter_request = $counter_request.$accountnumber.',';
												
												require '../../requests/report_mail.php';  // отправляем отчет о заявке на почту
												
																			
												// заполняем таблицу hotel_accounts для передачи данных в delfin

												$db->query('INSERT INTO hotel_accounts (FROM_THE_SITE,
																						SITENUMBER,
																						ACCOUNTNUMBER,
																						NUMBER,
																						IDACCOUNT,
																						CR,
																						IDHOTEL,
																						IDPERSON,											
																						FIO, 
																						BIRTHDATE,
																						BIRTHPLACE,
																						IDGUESTTYPE,
																						
																						CHECKIN,
																						CHECKOUT,
																						
																						MEN,
																						CHILDREN,
																						IDTYPEROOM,
																						IDROOM,
																						
																						IDRATEPLAN,
																						ISHIDERATE,
																						CONTACT,
																						
																						IDKA,
																						IDTA,
																						IDFIRM,
																						IDCOUNTRY,
																						IDCITY,
																						ADDRESS,
																						
																						EMAIL,
																						COMMENT,																					
																						PHONE,
																						IDWARRANTY,
																						IDSOURCE,
																						CAR,
																						
																						IDGEO,
																						IDLANGUAGE,
																						IDAIM,
																						ISNC,
																						
																						ISPAIDCOMM,
																						PROCCOMM,
																						IDGROUP,
																						
																						ISTAX,																						
																						IDSTATUS,
																						IDDENIAL,
																						
																						IDCANCELLATION,
																						ISCONFIRMATLON,
																						LOGINCREATE,
																						DATECHANGE,
																						LOGINCHANGE,
																						IDPAYMENTTYPE,
																						BALANCE,
																						FULL_RATE,
																						
																						IDOWNER,
																						IDINOWNER,
																						RECORDCOLOR,
																						RECORDFONT,
																						STATUS,
																						DATECREATE,
																						CITY,
																						
																						SMALLCHILDREN,
																						WARRANTYDATE,
																						IDVIPCUSTOMER,
																						IDMANAGER,
																						PRIORITET,
																						ISSHAREROOM,
																						
																						BEDS,
																						
																						CHILDREN2,
																						IDACCOUNTSHAREROOM,
																						KINDSHAREROOM,
																						IDSUBJECT,
																						VOUCHER,
																						ISSPECIALRATE,
																						SPECIALRATE,
																						IDGROUPTYPEROOM,
																						IDMENUKIND,
																						CRCHANNEL,
																						ANCILLARY
																						) 
																							VALUES 
																								   ("1",
																									"'.$accountnumber.'",
																									"",
																									"",
																									"",
																									"",
																									"1",
																									"0",
																									"'.$surname.' '.$name.' '.$patronymic.'",
																									"",
																									"",
																									"9",
																									
																									"'.$start.'",
																									"'.$end.'",
																									
																									"1",
																									"0",
																									"'.$rate_field['id_type_room'].'",
																									"'.$rate_field['id_room'].'",

																									"'.$id_tarif.'",
																									"0",
																									"'.$surname.' '.$name.' '.$patronymic.'",
																									
																									"0",
																									"0",
																									"3",
																									"54",
																									"",
																									"",
																									
																									"'.$email.'",
																									"",
																									"'.$telephone.'",
																									"15",
																									"10",
																									"",
																									
																									"9",
																									"",
																									"",
																									"1",
																									
																									"0",
																									"0",
																									"0",
																									
																									"0",																							
																									"14",
																									"0",
																									
																									"0",
																									"",
																									"",
																									"'.$date_today.'",
																									"",
																									"'.$type_rate.'",
																									"'.$sum_interval*$prepayment.'",
																									"'.$sum_interval.'", 
																									
																									"",
																									"",
																									"",
																									"",
																									"0",
																									"'.$date_today.'",
																									"",
																									
																									"0",
																									"",
																									"0",
																									"",
																									"",
																									"0",
																									
																									"",
																									
																									"0",
																									"0",
																									"",
																									"0",
																									"",
																									"0",
																									"0",
																									"",
																									"0",
																									"",
																									""
																									)');
																									
																									
												$hotel_accounts_bufer = $db->query('SELECT * FROM hotel_accounts');					// обращаемся к таблице заявок 
												$read_hotel_accounts = $hotel_accounts_bufer->fetchAll();
												foreach ($read_hotel_accounts as $hotel_accounts_field)
													{
														$id_order = $hotel_accounts_field['id'];									// выводим номер заявки
													}
													
												// запоминаем уникальное имя файла заявки
												$db->query('UPDATE hotel_accounts SET FILE_NAME = "order_'.$id_order.'.xml" WHERE id = "'.$id_order.'"');
																									
																									
												//Создает XML-строку и XML-документ при помощи DOM 
												$dom = new DomDocument('1.0', 'UTF-8');
												
												//добавление корня - <data> 
												$data = $dom->appendChild($dom->createElement('data'));
												
												//добавление корня - <table> 
												$table = $data->appendChild($dom->createElement('table'));
												// добавление элемента текстового узла <table> в <table> 
												$table->appendChild($dom->createTextNode('HOTEL_ACCOUNTS'));
												
												//добавление корня - <row> 
												$row = $data->appendChild($dom->createElement('row'));
												
												//добавление элемента <SITENUMBER> в <row> 
												$SITENUMBER = $row->appendChild($dom->createElement('SITENUMBER')); 
												// добавление элемента текстового узла <SITENUMBER> в <SITENUMBER> 
												$SITENUMBER->appendChild($dom->createTextNode($accountnumber)); 	
												
												//добавление элемента <ACCOUNTNUMBER> в <row> 
												$ACCOUNTNUMBER= $row->appendChild($dom->createElement('ACCOUNTNUMBER')); 
												// добавление элемента текстового узла <ACCOUNTNUMBER> в <ACCOUNTNUMBER> 
												$ACCOUNTNUMBER->appendChild($dom->createTextNode('')); 
												
												//добавление элемента <NUMBER> в <row> 
												$NUMBER = $row->appendChild($dom->createElement('NUMBER')); 
												// добавление элемента текстового узла <NUMBER> в <NUMBER> 
												$NUMBER->appendChild($dom->createTextNode('')); 
												
												//добавление элемента <IDACCOUNT> в <row> 
												$IDACCOUNT = $row->appendChild($dom->createElement('IDACCOUNT')); 		
												// добавление элемента текстового узла <IDACCOUNT> в <IDACCOUNT> 
												$IDACCOUNT->appendChild($dom->createTextNode(''));
												
												//добавление элемента <CR> в <row> 
												$CR = $row->appendChild($dom->createElement('CR')); 		
												// добавление элемента текстового узла <CR> в <CR> 
												$CR->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDHOTEL> в <row> 
												$IDHOTEL = $row->appendChild($dom->createElement('IDHOTEL')); 	
												// добавление элемента текстового узла <IDHOTEL> в <IDHOTEL> 
												$IDHOTEL->appendChild($dom->createTextNode('1'));
												
												//добавление элемента <IDPERSON> в <row> 
												$IDPERSON = $row->appendChild($dom->createElement('IDPERSON')); 
												// добавление элемента текстового узла <IDPERSON> в <IDPERSON> 
												$IDPERSON->appendChild($dom->createTextNode('0'));
															
												//добавление элемента <FIO> в <row> 
												$FIO = $row->appendChild($dom->createElement('FIO')); 
												// добавление элемента текстового узла <FIO> в <FIO> 
												$FIO->appendChild($dom->createTextNode($surname.' '.$name.' '.$patronymic));
												
												//добавление элемента <BIRTHDATE> в <row> 
												$BIRTHDATE = $row->appendChild($dom->createElement('BIRTHDATE'));			
												// добавление элемента текстового узла <BIRTHDATE> в <BIRTHDATE> 
												$BIRTHDATE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <BIRTHPLACE> в <row> 
												$BIRTHPLACE = $row->appendChild($dom->createElement('BIRTHPLACE')); 
												// добавление элемента текстового узла <BIRTHPLACE> в <BIRTHPLACE> 
												$BIRTHPLACE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDGUESTTYPE> в <row> 
												$IDGUESTTYPE = $row->appendChild($dom->createElement('IDGUESTTYPE'));
												// добавление элемента текстового узла <IDGUESTTYPE> в <IDGUESTTYPE> 
												$IDGUESTTYPE->appendChild($dom->createTextNode('9'));
												
												//добавление элемента <CHECKIN> в <row> 
												$CHECKIN = $row->appendChild($dom->createElement('CHECKIN')); 
												// добавление элемента текстового узла <CHECKIN> в <CHECKIN> 
												$CHECKIN->appendChild($dom->createTextNode($start));
												
												//добавление элемента <CHECKOUT> в <row> 
												$CHECKOUT = $row->appendChild($dom->createElement('CHECKOUT')); 			
												// добавление элемента текстового узла <CHECKOUT> в <CHECKOUT> 
												$CHECKOUT->appendChild($dom->createTextNode($end));
												
												//добавление элемента <MEN> в <row> 
												$MEN = $row->appendChild($dom->createElement('MEN')); 
												// добавление элемента текстового узла <MEN> в <MEN> 
												$MEN->appendChild($dom->createTextNode('1'));
												
												//добавление элемента <CHILDREN> в <row> 
												$CHILDREN = $row->appendChild($dom->createElement('CHILDREN'));
												// добавление элемента текстового узла <CHILDREN> в <CHILDREN> 
												$CHILDREN->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDTYPEROOM> в <row> 
												$IDTYPEROOM = $row->appendChild($dom->createElement('IDTYPEROOM'));
												// добавление элемента текстового узла <IDTYPEROOM> в <IDTYPEROOM> 
												$IDTYPEROOM->appendChild($dom->createTextNode($rate_field['id_type_room']));
												
												//добавление элемента <IDROOM> в <row> 
												$IDROOM = $row->appendChild($dom->createElement('IDROOM')); 
												// добавление элемента текстового узла <IDROOM> в <IDROOM> 
												$IDROOM->appendChild($dom->createTextNode($rate_field['id_room']));
												
												//добавление элемента <IDRATEPLAN> в <row> 
												$IDRATEPLAN = $row->appendChild($dom->createElement('IDRATEPLAN'));
												// добавление элемента текстового узла <IDRATEPLAN> в <IDRATEPLAN> 
												$IDRATEPLAN->appendChild($dom->createTextNode($id_tarif));
												
												//добавление элемента <ISHIDERATE> в <row> 
												$ISHIDERATE = $row->appendChild($dom->createElement('ISHIDERATE')); 
												// добавление элемента текстового узла <ISHIDERATE> в <ISHIDERATE> 
												$ISHIDERATE->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <CONTACT> в <row> 
												$CONTACT = $row->appendChild($dom->createElement('CONTACT'));
												// добавление элемента текстового узла <CONTACT> в <CONTACT> 
												$CONTACT->appendChild($dom->createTextNode($surname.' '.$name.' '.$patronymic));
												
												//добавление элемента <IDKA> в <row> 
												$IDKA = $row->appendChild($dom->createElement('IDKA')); 	
												// добавление элемента текстового узла <IDKA> в <IDKA> 
												$IDKA->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDTA> в <row> 
												$IDTA = $row->appendChild($dom->createElement('IDTA'));
												// добавление элемента текстового узла <IDTA> в <IDTA> 
												$IDTA->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDFIRM> в <row> 
												$IDFIRM = $row->appendChild($dom->createElement('IDFIRM')); 
												// добавление элемента текстового узла <IDFIRM> в <IDFIRM> 
												$IDFIRM->appendChild($dom->createTextNode('3'));
												
												//добавление элемента <IDCOUNTRY> в <row> 
												$IDCOUNTRY = $row->appendChild($dom->createElement('IDCOUNTRY')); 
												// добавление элемента текстового узла <IDCOUNTRY> в <IDCOUNTRY> 
												$IDCOUNTRY->appendChild($dom->createTextNode('54'));
												
												//добавление элемента <IDCITY> в <row> 
												$IDCITY = $row->appendChild($dom->createElement('IDCITY')); 
												// добавление элемента текстового узла <IDCITY> в <IDCITY> 
												$IDCITY->appendChild($dom->createTextNode(''));
												
												//добавление элемента <ADDRESS> в <row> 
												$ADDRESS = $row->appendChild($dom->createElement('ADDRESS'));
												// добавление элемента текстового узла <ADDRESS> в <ADDRESS> 
												$ADDRESS->appendChild($dom->createTextNode(''));
												
												//добавление элемента <EMAIL> в <row> 
												$EMAIL = $row->appendChild($dom->createElement('EMAIL')); 
												// добавление элемента текстового узла <EMAIL> в <EMAIL> 
												$EMAIL->appendChild($dom->createTextNode($email));
												
												//добавление элемента <COMMENT> в <row> 
												$COMMENT = $row->appendChild($dom->createElement('COMMENT')); 
												// добавление элемента текстового узла <COMMENT> в <COMMENT> 
												$COMMENT->appendChild($dom->createTextNode(''));
												
												//добавление элемента <PHONE> в <row> 
												$PHONE = $row->appendChild($dom->createElement('PHONE')); 
												// добавление элемента текстового узла <PHONE> в <PHONE> 
												$PHONE->appendChild($dom->createTextNode($telephone));
												
												//добавление элемента <IDWARRANTY> в <row> 
												$IDWARRANTY = $row->appendChild($dom->createElement('IDWARRANTY')); 
												// добавление элемента текстового узла <IDWARRANTY> в <IDWARRANTY> 
												$IDWARRANTY->appendChild($dom->createTextNode('15'));
												
												//добавление элемента <IDSOURCE> в <row> 
												$IDSOURCE = $row->appendChild($dom->createElement('IDSOURCE'));
												// добавление элемента текстового узла <IDSOURCE> в <IDSOURCE> 
												$IDSOURCE->appendChild($dom->createTextNode('10'));
												
												//добавление элемента <CAR> в <row> 
												$CAR = $row->appendChild($dom->createElement('CAR'));
												// добавление элемента текстового узла <CAR> в <CAR> 
												$CAR->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDGEO> в <row> 
												$IDGEO = $row->appendChild($dom->createElement('IDGEO'));
												// добавление элемента текстового узла <IDGEO> в <IDGEO> 
												$IDGEO->appendChild($dom->createTextNode('9'));
												
												//добавление элемента <IDLANGUAGE> в <row> 
												$IDLANGUAGE = $row->appendChild($dom->createElement('IDLANGUAGE'));
												// добавление элемента текстового узла <IDLANGUAGE> в <IDLANGUAGE> 
												$IDLANGUAGE->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDAIM> в <row> 
												$IDAIM = $row->appendChild($dom->createElement('IDAIM'));
												// добавление элемента текстового узла <IDAIM> в <IDAIM> 
												$IDAIM->appendChild($dom->createTextNode('7'));
												
												//добавление элемента <ISNC> в <row> 
												$ISNC = $row->appendChild($dom->createElement('ISNC')); 
												// добавление элемента текстового узла <ISNC> в <ISNC> 
												$ISNC->appendChild($dom->createTextNode('1'));
												
												//добавление элемента <ISPAIDCOMM> в <row> 
												$ISPAIDCOMM = $row->appendChild($dom->createElement('ISPAIDCOMM')); 
												// добавление элемента текстового узла <ISPAIDCOMM> в <ISPAIDCOMM> 
												$ISPAIDCOMM->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <PROCCOMM> в <row> 
												$PROCCOMM = $row->appendChild($dom->createElement('PROCCOMM'));
												// добавление элемента текстового узла <PROCCOMM> в <PROCCOMM> 
												$PROCCOMM->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDGROUP> в <row> 
												$IDGROUP = $row->appendChild($dom->createElement('IDGROUP')); 
												// добавление элемента текстового узла <IDGROUP> в <IDGROUP> 
												$IDGROUP->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <ISTAX> в <row> 
												$ISTAX = $row->appendChild($dom->createElement('ISTAX')); 	
												// добавление элемента текстового узла <ISTAX> в <ISTAX> 
												$ISTAX->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDSTATUS> в <row> 
												$IDSTATUS = $row->appendChild($dom->createElement('IDSTATUS')); 
												// добавление элемента текстового узла <IDSTATUS> в <IDSTATUS> 
												$IDSTATUS->appendChild($dom->createTextNode('14'));
												
												//добавление элемента <IDDENIAL> в <row> 
												$IDDENIAL = $row->appendChild($dom->createElement('IDDENIAL')); 
												// добавление элемента текстового узла <IDDENIAL> в <IDDENIAL> 
												$IDDENIAL->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDCANCELLATION> в <row> 
												$IDCANCELLATION = $row->appendChild($dom->createElement('IDCANCELLATION')); 
												// добавление элемента текстового узла <IDCANCELLATION> в <IDCANCELLATION> 
												$IDCANCELLATION->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <ISCONFIRMATLON> в <row> 
												$ISCONFIRMATLON= $row->appendChild($dom->createElement('ISCONFIRMATLON'));
												// добавление элемента текстового узла <ISCONFIRMATLON> в <ISCONFIRMATLON> 
												$ISCONFIRMATLON->appendChild($dom->createTextNode(''));
												
												//добавление элемента <LOGINCREATE> в <row> 
												$LOGINCREATE = $row->appendChild($dom->createElement('LOGINCREATE')); 
												// добавление элемента текстового узла <LOGINCREATE> в <LOGINCREATE> 
												$LOGINCREATE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <DATECHANGE> в <row> 
												$DATECHANGE = $row->appendChild($dom->createElement('DATECHANGE')); 
												// добавление элемента текстового узла <DATECHANGE> в <DATECHANGE> 
												$DATECHANGE->appendChild($dom->createTextNode($date_today));
												
												//добавление элемента <LOGINCHANGE> в <row> 
												$LOGINCHANGE = $row->appendChild($dom->createElement('LOGINCHANGE'));
												// добавление элемента текстового узла <LOGINCHANGE> в <LOGINCHANGE> 
												$LOGINCHANGE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <BALANCE> в <row> 
												$BALANCE = $row->appendChild($dom->createElement('BALANCE')); 
												// добавление элемента текстового узла <BALANCE> в <BALANCE> 
												$BALANCE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDOWNER> в <row> 
												$IDOWNER = $row->appendChild($dom->createElement('IDOWNER')); 
												// добавление элемента текстового узла <IDOWNER> в <IDOWNER> 
												$IDOWNER->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDINOWNER> в <row> 
												$IDINOWNER = $row->appendChild($dom->createElement('IDINOWNER'));
												// добавление элемента текстового узла <IDINOWNER> в <IDINOWNER> 
												$IDINOWNER->appendChild($dom->createTextNode(''));
												
												//добавление элемента <RECORDCOLOR> в <row> 
												$RECORDCOLOR = $row->appendChild($dom->createElement('RECORDCOLOR'));
												// добавление элемента текстового узла <RECORDCOLOR> в <RECORDCOLOR> 
												$RECORDCOLOR->appendChild($dom->createTextNode(''));
												
												//добавление элемента <RECORDFONT> в <row> 
												$RECORDFONT = $row->appendChild($dom->createElement('RECORDFONT')); 
												// добавление элемента текстового узла <RECORDFONT> в <RECORDFONT> 
												$RECORDFONT->appendChild($dom->createTextNode(''));
												
												//добавление элемента <STATUS> в <row> 
												$STATUS = $row->appendChild($dom->createElement('STATUS'));
												// добавление элемента текстового узла <STATUS> в <STATUS> 
												$STATUS->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <DATECREATE> в <row> 
												$DATECREATE = $row->appendChild($dom->createElement('DATECREATE')); 
												// добавление элемента текстового узла <DATECREATE> в <DATECREATE> 
												$DATECREATE->appendChild($dom->createTextNode($date_today));
												
												//добавление элемента <CITY> в <row> 
												$CITY = $row->appendChild($dom->createElement('CITY'));
												// добавление элемента текстового узла <CITY> в <CITY> 
												$CITY->appendChild($dom->createTextNode(''));
												
												//добавление элемента <SMALLCHILDREN> в <row> 
												$SMALLCHILDREN = $row->appendChild($dom->createElement('SMALLCHILDREN')); 
												// добавление элемента текстового узла <SMALLCHILDREN> в <SMALLCHILDREN> 
												$SMALLCHILDREN->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <WARRANTYDATE> в <row> 
												$WARRANTYDATE = $row->appendChild($dom->createElement('WARRANTYDATE')); 
												// добавление элемента текстового узла <WARRANTYDATE> в <WARRANTYDATE> 
												$WARRANTYDATE->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDVIPCUSTOMER> в <row> 
												$IDVIPCUSTOMER = $row->appendChild($dom->createElement('IDVIPCUSTOMER'));
												// добавление элемента текстового узла <IDVIPCUSTOMER> в <IDVIPCUSTOMER> 
												$IDVIPCUSTOMER->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDMANAGER> в <row> 
												$IDMANAGER = $row->appendChild($dom->createElement('IDMANAGER')); 
												// добавление элемента текстового узла <IDMANAGER> в <IDMANAGER> 
												$IDMANAGER->appendChild($dom->createTextNode(''));
												
												//добавление элемента <PRIORITET> в <row> 
												$PRIORITET = $row->appendChild($dom->createElement('PRIORITET')); 
												// добавление элемента текстового узла <PRIORITET> в <PRIORITET> 
												$PRIORITET->appendChild($dom->createTextNode(''));
												
												//добавление элемента <ISSHAREROOM> в <row> 
												$ISSHAREROOM = $row->appendChild($dom->createElement('ISSHAREROOM')); 
												// добавление элемента текстового узла <ISSHAREROOM> в <ISSHAREROOM> 
												$ISSHAREROOM->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <BEDS> в <row> 
												$BEDS = $row->appendChild($dom->createElement('BEDS'));
												// добавление элемента текстового узла <BEDS> в <BEDS> 
												$BEDS->appendChild($dom->createTextNode(''));
												
												//добавление элемента <CHILDREN2> в <row> 
												$CHILDREN2 = $row->appendChild($dom->createElement('CHILDREN2'));
												// добавление элемента текстового узла <CHILDREN2> в <CHILDREN2> 
												$CHILDREN2->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDACCOUNTSHAREROOM> в <row> 
												$IDACCOUNTSHAREROOM = $row->appendChild($dom->createElement('IDACCOUNTSHAREROOM'));
												// добавление элемента текстового узла <IDACCOUNTSHAREROOM> в <IDACCOUNTSHAREROOM> 
												$IDACCOUNTSHAREROOM->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <KINDSHAREROOM> в <row> 
												$KINDSHAREROOM = $row->appendChild($dom->createElement('KINDSHAREROOM')); 
												// добавление элемента текстового узла <KINDSHAREROOM> в <KINDSHAREROOM> 
												$KINDSHAREROOM->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDSUBJECT> в <row> 
												$IDSUBJECT = $row->appendChild($dom->createElement('IDSUBJECT')); 
												// добавление элемента текстового узла <IDSUBJECT> в <IDSUBJECT> 
												$IDSUBJECT->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <VOUCHER> в <row> 
												$VOUCHER = $row->appendChild($dom->createElement('VOUCHER'));
												// добавление элемента текстового узла <VOUCHER> в <VOUCHER> 
												$VOUCHER->appendChild($dom->createTextNode(''));
												
												//добавление элемента <ISSPECIALRATE> в <row> 
												$ISSPECIALRATE = $row->appendChild($dom->createElement('ISSPECIALRATE')); 
												// добавление элемента текстового узла <ISSPECIALRATE> в <ISSPECIALRATE> 
												$ISSPECIALRATE->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <SPECIALRATE> в <row> 
												$SPECIALRATE = $row->appendChild($dom->createElement('SPECIALRATE')); 
												// добавление элемента текстового узла <SPECIALRATE> в <SPECIALRATE> 
												$SPECIALRATE->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <IDGROUPTYPEROOM> в <row> 
												$IDGROUPTYPEROOM = $row->appendChild($dom->createElement('IDGROUPTYPEROOM'));
												// добавление элемента текстового узла <IDGROUPTYPEROOM> в <IDGROUPTYPEROOM> 
												$IDGROUPTYPEROOM->appendChild($dom->createTextNode(''));
												
												//добавление элемента <IDMENUKIND> в <row> 
												$IDMENUKIND = $row->appendChild($dom->createElement('IDMENUKIND')); 
												// добавление элемента текстового узла <IDMENUKIND> в <IDMENUKIND> 
												$IDMENUKIND->appendChild($dom->createTextNode('0'));
												
												//добавление элемента <CRCHANNEL> в <row> 
												$CRCHANNEL = $row->appendChild($dom->createElement('CRCHANNEL'));
												// добавление элемента текстового узла <CRCHANNEL> в <CRCHANNEL> 
												$CRCHANNEL->appendChild($dom->createTextNode(''));
												
												//добавление элемента <ANCILLARY> в <row> 
												$ANCILLARY = $row->appendChild($dom->createElement('ANCILLARY'));  
												// добавление элемента текстового узла <ANCILLARY> в <ANCILLARY> 
												$ANCILLARY->appendChild($dom->createTextNode(''));	
												
													
												//генерация xml 
												$dom->formatOutput = true; // установка атрибута formatOutput
																		   // domDocument в значение true 
												// save XML as string or file 
												$test1 = $dom->saveXML(); // передача строки в test1 
												
												
												$dom->save('../../requests/import/order_'.$id_order.'.xml'); // сохранение файла 
														
																								
												$sum_interval = 0;	
											}
									
									}
							
							}
												
															
					}
			
			}
	}
					
		
		
// процедура записи в историю пользователя	

$db->query('INSERT INTO history (	user_id,
									time, 
									booking, 
									sum,
									payment,
									tarif,
									request_code) 
										VALUES 
												(	"'.$user_number.'",
													"'.$date_today.'", 
													"'.$number_house_for_history.$list_booking.'",
													"'.$sum.'",
													"'.$payment.'",
													"'.$name_tarif.'",
													"'.$counter_request.'"
													)'); 
																
													
																															

echo '<center><a style = "color: #fff; font-size: 18px; font-family: pragmatica;" ></a></center>';
unlink('../../history/'.$my_history.'.txt');
?>


</div>

