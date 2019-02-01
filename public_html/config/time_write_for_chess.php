<meta charset = "utf-8">

<?php

if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history']; }					// считываем имя файла оперативной истории
if (isset($_REQUEST['display_month'])) { $display_month = $_REQUEST['display_month']; }			// считываем просматриваемый на экране месяц
if (isset($_REQUEST['display_year'])) { $display_year = $_REQUEST['display_year']; }			// считываем просматриваемый на экране год
if (isset($_REQUEST['next_month'])) { $next_month = $_REQUEST['next_month']; }			// считываем следующий месяц
if (isset($_REQUEST['next_year'])) { $next_year = $_REQUEST['next_year']; }				// считываем следующий или текущий год

$date_today = date("H:i:s_d.m.Y");
echo $date_today.'<br>';


$date_today = preg_split('/\./', $date_today);

$current_date = preg_split('/_/', $date_today[0]);
$current_date = $current_date[1];

$current_month = $date_today[1];					// операция фонового контроля происходят только в настоящем и будущем
$current_year = $date_today[2];



require_once '../../base/connection_base.php';

$house_bufer =  $db->query('SELECT * FROM rate');				// обращаемся к таблице цен
$read_house = $house_bufer->fetchAll();

$number_bufer = $db->query('SELECT * FROM numbers');			// обращаемся к таблице прайса номеров
$read_number = $number_bufer->fetchAll();

$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения	
$contents = file_get_contents($file); 							// считываем содержимое
$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"


foreach ($read_house as $house_field)
	{
		if ($house_field[''] != 10)
			{
				foreach ($read_number as $number_field)
					{
						if ($number_field['year'] == $current_year)					// если год текущий
							{
								if ($number_field['year'] == $display_year or $number_field['year'] == $next_year)     // осуществляем контроль просматриваемого и следущего года
									{
										if ($number_field['month'] == $current_month && $number_field['month'] == $display_month)		// если месяц текущий
											{
												if ($number_field['month'] == $display_month or $number_field['month'] == $next_month)		// осуществляем контроль просматриваемого и следущего месяца
													{
														if ($number_field['date'] >= $current_date )			// если дата не прошедшая
															{
																if ($number_field['number_'.$house_field['id']] == '')							// если нет брони (белый цвет)
																	{
																		echo '	<script>
																					document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking";
																				</script>';
																	}
																if ($number_field['number_'.$house_field['id']] == '0')					// если временная бронь (оранжевый цвет)
																	{
																		echo '	<script>
																					document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking_tentative";
																				</script>';
																	}
																if ($number_field['number_'.$house_field['id']] == '1')					// если капитальная бронь (бурый цвет)
																	{
																		echo '	<script>
																					document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "paid_booking";
																				</script>';
																	}
															}
													}
											}
										if ($number_field['month'] > $current_month)		// если месяц будущий
											{
												if ($number_field['month'] == $display_month or $number_field['month'] == $next_month) 	// осуществляем контроль просматриваемого и следущего месяца
													{
														if ($number_field['number_'.$house_field['id']] == '')					// если нет брони (белый цвет)
															{
																echo '	<script>
																			document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking";
																		</script>';
															}
														if ($number_field['number_'.$house_field['id']] == '0')					// если временная бронь (оранжевый цвет)
															{
																echo '	<script>
																			document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking_tentative";
																		</script>';
															}
														if ($number_field['number_'.$house_field['id']] == '1')					// если капитальная бронь (бурый цвет)
															{
																echo '	<script>
																			document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "paid_booking";
																		</script>';
															}
													}
											}	
											
									}
							
							}
							
						if ($number_field['year'] > $current_year)		// если год будущий
							{
								if ($number_field['year'] == $display_year or $number_field['year'] == $next_year)     // осуществляем контроль просматриваемого и следущего года
									{
										if ($number_field['month'] == $display_month or $number_field['month'] == $next_month)		// осуществляем контроль просматриваемого и следущего месяца
											{
												if ($number_field['number_'.$house_field['id']] == '')					// если нет брони (белый цвет)
													{
														echo '	<script>
																	document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking";
																</script>';
													}
												if ($number_field['number_'.$house_field['id']] == '0')					// если временная бронь (оранжевый цвет)
													{
														echo '	<script>
																	document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "booking_tentative";
																</script>';
													}
												if ($number_field['number_'.$house_field['id']] == '1')					// если капитальная бронь (бурый цвет)
													{
														echo '	<script>
																	document.getElementById("date_'.$house_field['id'].'_'.$number_field['id'].'").className = "paid_booking";
																</script>';
													}
											}
									}
							}
					}
			}
	}

?>