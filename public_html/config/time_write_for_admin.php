<meta charset = "utf-8">

<?php

if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history']; }			// считываем имя файла оперативной истории
if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house'];}  	// считываем номер дома 
if (isset($_REQUEST['select_month'])) { $select_month = $_REQUEST['select_month'];}  	// считываем выбранный месяц
if (isset($_REQUEST['select_tarif'])) { $select_tarif = $_REQUEST['select_tarif'];}  	// считываем выбранный тариф


$date_today = date("H:i:s_d.m.Y");
echo $date_today.'<br>';


require_once '../../base/connection_base.php';

$house_bufer =  $db->query('SELECT * FROM house');				// обращаемся к таблице домов
$read_house = $house_bufer->fetchAll();

$number_bufer = $db->query('SELECT * FROM numbers');			// обращаемся к таблице прайса номеров
$read_number = $number_bufer->fetchAll();

$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения	
$contents = file_get_contents($file); 							// считываем содержимое
$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"
						


$count_number = 0;													// счетчик номеров в доме

foreach ($read_house as $house_field)
	{
		$count_number++;
		
		if ($house_field['house_'.$number_house] != '')             // есть ли такой номер в доме от 1 до 4
			{  
				foreach ($read_number as $number_field)
					{
						if ($number_field['month'] == $select_month)                //  считываем выбранный месяц
							{
								if ($number_field['number_'.$house_field['house_'.$number_house]] == '')					// если нет брони (белый цвет)
									{
										
										
										
										// процедура определения цены на данную дату 
										
										$rate_bufer =  $db->query('SELECT * FROM rate WHERE id = "'.$house_field['house_'.$number_house].'"');			// обращаемся к таблице цен
										$read_rate = $rate_bufer->fetchAll();
										
										foreach ($read_rate as $rate_field)
											{
												if ($number_field['weekday'] < 6)
													{
														$place_rate = $rate_field['rate_workday'];
														
														
														// зимняя скидка на комфорт 4 места 1 комната
												
														$class_komfort = $rate_field['class'];   				// считываем класс комфортности
														$class_komfort = preg_split('/_/', $class_komfort);
														$class_komfort = $class_komfort[1];                     // выводим код класса комфортности
													
														
														if ($class_komfort == '4x1r')
															{
																if ($number_field['year'] == 2019 && $number_field['month'] <= '02')
																	{
																		$place_rate = $place_rate - 200*$rate_field['count_place'];
																	}
																if ($number_field['year'] == 2018)
																	{
																		$place_rate = $place_rate - 200*$rate_field['count_place'];
																	}
															}
															
															
															
														// пересчитываем цены по выбранному тарифу 
														if ($number_field['year'] == 2018 && $number_field['month'] < 12)
															{
																if ($select_tarif == 'GM50')
																	{
																		$place_rate = $place_rate*0.5;
																	}
																if ($select_tarif == 'MD')
																	{
																		$place_rate = 1200*$rate_field['count_place'];
																	}
															}
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 10)
															{	
																if ($select_tarif == 'GM50')
																	{
																		$place_rate = $place_rate*0.5;
																	}
															}
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 31)
															{																
																if ($select_tarif == 'MD')
																	{
																		$place_rate = 1200*$rate_field['count_place'];
																	}
															}
															
															
														
														
														// процедура определения цены на новогодние дни
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] == 31)
															{
																$place_rate = 2500*$rate_field['count_place'];
																echo '	<script>
																			document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																		</script>';
															}
														if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] == 1)
															{
																$place_rate = 2500*$rate_field['count_place'];
																echo '	<script>
																			document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																		</script>';
															}

															
														if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] > 1)
															{
																if ($number_field['date'] < 9)
																	{
																		$place_rate = 2000*$rate_field['count_place'];
																		echo '	<script>
																					document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																				</script>';
																	}
															}
													}
												else
													{
														$place_rate = $rate_field['rate_weekend'];
														
														
														// зимняя скидка на комфорт 4 места 1 комната
												
														$class_komfort = $rate_field['class'];   				// считываем класс комфортности
														$class_komfort = preg_split('/_/', $class_komfort);
														$class_komfort = $class_komfort[1];                     // выводим код класса комфортности
													
														
														if ($class_komfort == '4x1r')
															{
																if ($number_field['year'] == 2019 && $number_field['month'] <= '02')
																	{
																		$place_rate = $place_rate - 200*$rate_field['count_place'];
																	}
																if ($number_field['year'] == 2018)
																	{
																		$place_rate = $place_rate - 200*$rate_field['count_place'];
																	}
															}
															
															
															
														
														// пересчитываем цены по выбранному тарифу
														if ($number_field['year'] == 2018 && $number_field['month'] < 12)
															{
																if ($select_tarif == 'GM50')
																	{
																		$place_rate = $place_rate*0.7;
																	}
																if ($select_tarif == 'MD')
																	{
																		$place_rate = 1200*$rate_field['count_place'];
																	}
															}
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 10)
															{	
																if ($select_tarif == 'GM50')
																	{
																		$place_rate = $place_rate*0.7;
																	}
															}
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 31)
															{
																if ($select_tarif == 'MD')
																	{
																		$place_rate = 1200*$rate_field['count_place'];
																	}
															}
														
														
														
														
														// процедура определения цены на новогодние дни
														if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] == 31)
															{
																$place_rate = 2500*$rate_field['count_place'];
																echo '	<script>
																			document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																		</script>';
															}
														if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] == 1)
															{
																$place_rate = 2500*$rate_field['count_place'];
																echo '	<script>
																			document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																		</script>';
															}

															
															
														if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] > 1)
															{
																if ($number_field['date'] < 9)
																	{
																		$place_rate = 2000*$rate_field['count_place'];
																		echo '	<script>
																					document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").style.color = "red";
																				</script>';
																	}
															}
													}
											}
											
										
											
										echo '	<script>								
													document.getElementById("date_'.$count_number.'_'.$number_field['id'].'").className = "booking";
													document.getElementById("click_booking_'.$count_number.'_'.$number_field['id'].'").style.display = "block";
													
													var count_place = document.getElementById("write_count_place").innerHTML;
													count_place = count_place.split(" ");
													count_place = count_place[1];
													
													document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").innerHTML = '.$place_rate.' + " руб.";
												</script>';
									}
							
								if ($number_field['number_'.$house_field['house_'.$number_house]] == '0')  // если поставлена бронь при селекции даты
									{
										
										
										$equality = 0;											
										/* отрицательное значение равенства даты из 
										текстового файла оперативной истории и из базы */
										
										for ($i = 0; $i <= count($contents)-2; $i++)           // прочесываем выбранные мной даты ...
											{
												$booking_date = preg_split('/,/', $contents[$i]);    	
												
												if ($number_field['id'] == $booking_date[0] && $house_field['house_'.$number_house] == $booking_date[2])        // если дата соответствует моей ...
													{
														$equality = 1;							// значение равенства положительное
													}
											}
											
										if ($equality == 0)									// если бронировал не я дата блокируется (оранжевый цвет)
											{
												if ($number_field['user_'.$house_field['house_'.$number_house]] == '')
													{
														echo '	<script>
																	document.getElementById("date_'.$count_number.'_'.$number_field['id'].'").className = "booking_tentative";
																	document.getElementById("click_booking_'.$count_number.'_'.$number_field['id'].'").style.display = "none";
																	document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").innerHTML = "Ждем оплаты";
																</script>';
													}
												else
													{
														$user_bufer = $db->query('SELECT * FROM user WHERE id = "'.$number_field['user_'.$house_field['house_'.$number_house]].'"');    			// обращаемся к таблице пользователей
														$read_user = $user_bufer->fetchAll();
														
														foreach ($read_user as $user_field)
															{
																$user = $user_field['surname'];				// выводим фамилию
																$telephone = $user_field['telephone'];		// выводим телефон
																$function_id = 'remove_style(); load_user_history_'.$user_field['id'].'()';
															}
																			
														echo '	<script>
																	document.getElementById("date_'.$count_number.'_'.$number_field['id'].'").className = "booking_tentative";
																	document.getElementById("click_booking_'.$count_number.'_'.$number_field['id'].'").style.display = "none";
																	document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").innerHTML = "'.$user.'<br>'.$telephone.'";
																</script>';
													}
											}
										else												// если бронировал я дата (зеленый цвет)
											{
												echo '	<script>
															document.getElementById("date_'.$count_number.'_'.$number_field['id'].'").className = "booking_select";
															document.getElementById("click_booking_'.$count_number.'_'.$number_field['id'].'").style.display = "none";
															document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").innerHTML = "Мой выбор";
														</script>';
											}								
									}
									
								if ($number_field['number_'.$house_field['house_'.$number_house]] == '1')
									{
										$user_bufer = $db->query('SELECT * FROM user WHERE id = "'.$number_field['user_'.$house_field['house_'.$number_house]].'"');    			// обращаемся к таблице пользователей
										$read_user = $user_bufer->fetchAll();
										
										foreach ($read_user as $user_field)
											{
												$user = $user_field['surname'];				// выводим фамилию
												$telephone = $user_field['telephone'];		// выводим телефон
												$function_id = 'remove_style(); load_user_history_'.$user_field['id'].'()';
											}
											
										echo '	
												<script>
													document.getElementById("date_'.$count_number.'_'.$number_field['id'].'").className = "paid_booking";
													document.getElementById("click_booking_'.$count_number.'_'.$number_field['id'].'").style.display = "none";
													document.getElementById("rate_'.$count_number.'_'.$number_field['id'].'").innerHTML = "'.$user.'<br>'.$telephone.'";
												</script>';											
									}
							}
					}
			} 
	}




/*


$alert = '../../history/alert.txt';

if (file_exists($alert)) 
	{
		echo '<input type = "text" id = "alert" value = "1" >';
	} 
else
	{
		echo '<input type = "text" id = "alert" value = "" >';
	}
	

	
$contents = file_get_contents($file); 					// считываем содержимое
$contents = preg_split('/;/', $contents);				// разбиваем на массив по регулярному выражению ";"

$contents[0] = $date_today;								// заменяем значение даты


$contents_write = '';

for ($i = 0; $i <= count($contents)-2; $i++)
	{
		$contents_write = $contents_write.$contents[$i].';';
	}
	
$file = fopen('../../history/'.$my_history.'.txt', 'w');
fwrite($file, $contents_write."\n");
fclose($file);

$file = '../../history/'.$my_history.'.txt';				// открываем файл оперативной истории для чтения	
$contents = file_get_contents($file); 						// считываем содержимое
echo $contents;
                                                                
*/

?>