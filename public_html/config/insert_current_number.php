<?php



if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house'];}  	// считываем номер дома 
if (isset($_REQUEST['number'])) { $number = $_REQUEST['number'];}  						// считываем гостиничный номер по порядку 
if (isset($_REQUEST['date'])) { $date = $_REQUEST['date'];}  							// считываем выбираемую дату
if (isset($_REQUEST['weekday'])) { $weekday = $_REQUEST['weekday'];}  					// считываем день недели
if (isset($_REQUEST['id_primary'])) { $id_primary = $_REQUEST['id_primary'];}  			// считываем первичный ключ
if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history']; }  		// считываем имя файла оперативной истории
if (isset($_REQUEST['select_tarif'])) { $select_tarif = $_REQUEST['select_tarif'];}  	// считываем выбранный тариф

echo 'День недели: '.$weekday.'<br>';
echo 'Первичный ключ: '.$id_primary.'<br>';


require_once '../../base/connection_base.php';

$rate_bufer = $db->query('SELECT * FROM rate');					// обращаемся к таблице цен								
$read_rate = $rate_bufer->fetchAll();

$house_bufer =  $db->query('SELECT * FROM house');				// обращаемся к таблице домов
$read_house = $house_bufer->fetchAll();

$number_bufer = $db->query('SELECT * FROM numbers WHERE id = "'.$id_primary.'"');			// обращаемся к таблице прайса номеров
$read_number = $number_bufer->fetchAll();


foreach ($read_house as $house_field)                   // процедура предварительной проверки брони даты
	{
		if ($house_field['id'] == $number)
			{
				foreach ($read_number as $number_field)
					{
						$booing_date = $number_field['number_'.$house_field['house_'.$number_house]];
						$month = $number_field['month'];
						$year = $number_field['year'];
					}
			}
	}
	
	
$sum = 0;	
	
if ($booing_date == '')   // если дата свободна - можно бронировать
	{
		$count_number = 0;																// счетчик гостиничных номеров по дому 														

		foreach ($read_rate as $rate_field)
			{		
				if ($rate_field['number_house'] == $number_house)
					{
						$count_number++;
						if ($number == $count_number)
							{
								echo 'Гост_номер: '.$rate_field['id'].'<br>';
								
								if ($weekday < 6)
									{
										
										
										$current_rate = $rate_field['rate_workday'];
										
										
										
										// зимняя скидка на комфорт 4 места 1 комната
												
										$class_komfort = $rate_field['class'];   				// считываем класс комфортности
										$class_komfort = preg_split('/_/', $class_komfort);
										$class_komfort = $class_komfort[1];                     // выводим код класса комфортности
									
										
										if ($class_komfort == '4x1r')
											{
												if ($number_field['year'] == 2019 && $number_field['month'] <= '02')
													{
														$current_rate = $current_rate - 200*$rate_field['count_place'];
													}
												if ($number_field['year'] == 2018)
													{
														$current_rate = $current_rate - 200*$rate_field['count_place'];
													}
											}
											
										
										// пересчитываем цены по выбранному тарифу
										if ($number_field['year'] == 2018 && $number_field['month'] < 12)
											{
												if ($select_tarif == 'GM50')
													{
														$current_rate = $current_rate*0.5;
													}
												if ($select_tarif == 'MD')
													{
														$current_rate = 1200*$rate_field['count_place'];
													}
											}
										if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 10)
											{
												if ($select_tarif == 'GM50')
													{
														$current_rate = $current_rate*0.5;
													}
											}
										if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 31)
											{
												if ($select_tarif == 'MD')
													{
														$current_rate = 1200*$rate_field['count_place'];
													}
											}
										
										
										
										// процедура определения цены на новогодние дни
										
										foreach ($read_number as $number_field)       
											{
												if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] == 31)
													{
														$current_rate = 2500*$rate_field['count_place'];
													}
												if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] == 1)
													{
														$current_rate = 2500*$rate_field['count_place'];
													}
					
													
												if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] > 1)
													{
														if ($number_field['date'] < 9)
															{
																$current_rate = 2000*$rate_field['count_place'];
															}
													}
											}
											
											
											
										
										$db->query('UPDATE numbers SET number_'.$rate_field['id'].' = "0" WHERE id = "'.$id_primary.'"');  					// бронируем - вводим ноль в соответствующее поле
										echo $rate_field['rate_workday'].'<br>';
										
										$file = '../../history/'.$my_history.'.txt';																	// открываем файл оперативной истории для чтения
										$contents = file_get_contents($file); 				
										$contents .= $id_primary.','.$number_house.','.$rate_field['id'].','.$date.','.$month.','.$year.','.$current_rate.','.$select_tarif.";\n";				// добавляем значение
										file_put_contents($file, $contents);   																			// пишем результат 
										
	
									}
								else
									{
										
										
										$current_rate = $rate_field['rate_weekend'];
										
										
										
										// зимняя скидка на комфорт 4 места 1 комната
												
										$class_komfort = $rate_field['class'];   				// считываем класс комфортности
										$class_komfort = preg_split('/_/', $class_komfort);
										$class_komfort = $class_komfort[1];                     // выводим код класса комфортности
									
										
										if ($class_komfort == '4x1r')
											{
												if ($number_field['year'] == 2019 && $number_field['month'] <= '02')
													{
														$current_rate = $current_rate - 200*$rate_field['count_place'];
													}
												if ($number_field['year'] == 2018)
													{
														$current_rate = $current_rate - 200*$rate_field['count_place'];
													}
											}
											
											
											
										// пересчитываем цены по выбранному тарифу
										if ($number_field['year'] == 2018 && $number_field['month'] < 12)
											{
												if ($select_tarif == 'GM50')
													{
														$current_rate = $current_rate*0.7;
													}
												if ($select_tarif == 'MD')
													{
														$current_rate = 1200*$rate_field['count_place'];
													}
											}
										if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 10)
											{
												if ($select_tarif == 'GM50')
													{
														$current_rate = $current_rate*0.7;
													}
											}
										if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] < 31)
											{
												if ($select_tarif == 'MD')
													{
														$current_rate = 1200*$rate_field['count_place'];
													}
											}
															
										
										
										
										// процедура определения цены на новогодние дни
										
										foreach ($read_number as $number_field)       
											{
												if ($number_field['year'] == 2018 && $number_field['month'] == 12 && $number_field['date'] == 31)
													{
														$current_rate = 2500*$rate_field['count_place'];
													}
												if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] == 1)
													{
														$current_rate = 2500*$rate_field['count_place'];
													}
													
													
												if ($number_field['year'] == 2019 && $number_field['month'] == '01' && $number_field['date'] > 1)
													{
														if ($number_field['date'] < 9)
															{
																$current_rate = 2000*$rate_field['count_place'];
															}
													}
											}
											
											
											
											
										$db->query('UPDATE numbers SET number_'.$rate_field['id'].' = "0" WHERE id = "'.$id_primary.'"');	// бронируем - вводим ноль в соответствующее поле		
										echo $rate_field['rate_weekend'].'<br>';
										
										$file = '../../history/'.$my_history.'.txt';																	// открываем файл оперативной истории для чтения
										$contents = file_get_contents($file); 			
										$contents .= $id_primary.','.$number_house.','.$rate_field['id'].','.$date.','.$month.','.$year.','.$current_rate.','.$select_tarif.";\n";				// добавляем значение
										file_put_contents($file, $contents);   																			// пишем результат
										

									}
							}
					}
			}

		echo 'id: '.$id_primary.'<br>Номер дома: '.$number_house.'<br>Номер комнаты: '.$number.'<br>Кол-во комнат: '.$count_number.'<br>День недели: '.$weekday.'<br>Дата: '.$date;
		
		
		// процедура вывода суммы к оплате из файла оперативной истории
		
		$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения	
		$contents = file_get_contents($file); 							// считываем содержимое
		$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"
		
		for ($i=0; $i<=count($contents); $i++)
			{
				$booking_date = preg_split('/,/', $contents[$i]);
				$sum = $sum + $booking_date[6];
			}
	
		echo   '<script>
					document.getElementById("sum").value = "'.$sum.'";
				</script>';
	}

?>