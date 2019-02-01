
<div id = "test_monitor" style = "position: fixed; right: 20px; bottom: 20px; width: 200px; height: 200px; background: #fff; overflow: auto; z-index: 999; ">
</div>



<div style = "position: fixed; width: 100%; height: 120px; background: #CAA79C; top: 0px; left: 0px; z-index: 981; border: double 3px #ddd; ">
	<input type = "button" value = "Календарная сетка" onclick = "load_read_base_of_chess()" style = "position: fixed; top: 10px; left: 10px; z-index: 990;" >
	<input id = "data_scroll" type = "text" value = "" style = "position: fixed; top: 10px; left: 180px; padding: 2px 10px 2px 10px; border: solid 1px #CAA79C; border-style: inset; z-index: 999;" >
</div>

<!-- объекты буфера -->

<div style = "position: fixed; top: 10px; left: 400px; width: 1200px; z-index: 995;">
	<!-- пишем в базу выбранные номера в реальном времени -->

	<div id = "load_insert_current_number" style = "position: relative; top: 100%; left: 0px; padding: 10px; background: red; display: none;">    
	</div> 
	
	<input type = "button" value = "start" onclick = "write_current_time_for_chess()" style = "position: relative; left: 10px; float: left;" >
	<input type = "button" value = "stop" onclick = "document.getElementById('my_history').value = '';" style = "position: relative; left: 10px; float: left;" >
	
	<input type = "text" value = "0" id = "verify_control" style = "position: relative; float: left; left: 40px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset; " >

	<!-- хранилище имен файлов оперативной истории -->

	<input id="my_history" style="position: relative; left: 60px; z-index: 10; float: left; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">

	<!-- оперативная запись текущего времени -->

	<div id = "time_control" style = "position: relative; float: left; background: #fff; left: 80px; overflow: auto; padding: 5px 10px 5px 10px; z-index: 10; display: block; border: solid 1px #CAA79C; border-style: inset; color: #888;" >
	</div>
	
	<input id="stop_control" style="position: absolute; z-index: 10; right: 300px;  width: 30px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">

	<input id="display_current_month" style="position: absolute; z-index: 10; right: 160px; width: 40px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">
	<input id="display_current_year" style="position: absolute; z-index: 10; right: 220px;  width: 50px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">
	
	<input id="display_next_month" style="position: absolute; z-index: 10; right: 20px; width: 40px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">
	<input id="display_next_year" style="position: absolute; z-index: 10; right: 80px;  width: 50px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">
	
</div>

<div onmousemove  = "document.getElementById('stop_control').value = 0;" >   <!-- отмечаем движение курсора в поле шахматки для запроса на сервер -->

<?php

if (isset($_REQUEST['login'])) { $login = $_REQUEST['login']; }
if (isset($_REQUEST['password'])) { $password = $_REQUEST['password']; }

$date_today = date("H:i:s_d.m.Y");

$date_today = preg_split('/\./', $date_today);

$current_date = preg_split('/_/', $date_today[0]);
$current_date = $current_date[1];

$current_month = $date_today[1];
$current_year = $date_today[2];

echo '	<script>document.getElementById("my_history").value = "'.$login.'";
				document.getElementById("display_current_month").value = "'.$current_month.'";
				document.getElementById("display_current_year").value = "'.$current_year.'";
				
				var obj = document.getElementById("current_month_'.$current_month.'_'.$current_year.'");
				var rect = obj.getBoundingClientRect();
				document.getElementById("data_scroll").value = rect.left;
				window.scrollBy(rect.left-160+'.($current_date-1).'*100, 0);	
				
				setTimeout("write_current_time_for_chess()", 2000);
				
				var all_current_months = [];
		</script>';
?>

<script>
	
	window.onblur = function()	{ 														// оптимизация нагрузки на трафик - если окно бразера неактивно - прерываем цикл контроля
									document.getElementById("my_history").value = "";
								}
								
	window.onfocus = function()	{ 
									document.getElementById("my_history").value = "<?echo $login;?>";
									write_current_time_for_chess();
								}
	
</script>

<?php

require_once '../../base/connection_base.php';

$house_bufer =  $db->query('SELECT * FROM rate');			// обращаемся к таблице цен
$read_house = $house_bufer->fetchAll();

$number_bufer = $db->query('SELECT * FROM numbers');		// обращаемся к таблице гостиничных номеров
$read_number = $number_bufer->fetchAll();

$weekdays= array(	1 => "Вскр", 
					2 => "Пн", 
					3 => "Втр",
					4 => "Ср",
					5 => "Чтв",
					6 => "Пт",
					7 => "Сбт");
					
$all_months= array(	"01" => "Январь", 
					"02" => "Февраль", 
					"03" => "Март",
					"04" => "Апрель",
					"05" => "Мау",
					"06" => "Июнь",
					"07" => "Июль",
					"08" => "Август",
					"09" => "Сентябрь",
					"10" => "Октябрь",
					"11" => "Ноябрь",
					"12" => "Декабрь"
					);

echo '	<script>
			function load_read_base_of_chess()
				{
					$("#initial_load").load("../config/read_base_for_admin.php", "login='.$login.'&password='.$password.'");
				}
		</script>
		
		<table cellspacing = "1px" cellpadding = "0" style = "position: fixed; left: 0px; top: 98px; border: solid 1px #ddd; background: #CAA79C; z-index: 985;">
			<tr style = "vertical-align: center">
				<td style = "border: solid 1px #ddd;">
					<div style = "width: 50px; height: 20px;  text-align: center;">
						Дом
					</div>
				</td>
				<td style = "border: solid 1px #ddd;">
					<div style = "width: 50px; height: 20px;  text-align: center; background: #E1B593;">
						№
					</div>
				</td>
				<td style = "border: solid 1px #ddd;">
					<div style = "width: 50px; height: 20px;  text-align: center; background: #CAA79C;">
						Мест
					</div>
				</td>
			</tr>
		</table>
		
		
		<table id = "month_row" cellspacing = "0px" cellpadding = "0" style = "position: fixed; left: 160px; top: 65px; background: #ddd; z-index: 984;">
			<tr style = "vertical-align: center;">';
			
			// верхняя горизонтальная линейка с буднями и выходными
		
		$count_months = 0;
		$count_days = '';
		$month = '08';
		$year = '2018';
		foreach ($read_number as $number_field)	 			
			{
				if ($month == $number_field['month'])			// читаем текущий месяц - плюсуем в переменную счетчика дней в тегах <table>
					{
						$year = $number_field['year'];
						if ($number_field['weekday'] < 6)
							{
								$count_days = $count_days. '<td class = "working_day" style = "width: 100px; height: 20px;"> 
																<div style = "width: 100px; text-align: center; font-weight: bold;">
																	'.$number_field['date'].' '.$weekdays[$number_field['weekday']].'
																</div>
															</td>';
							}
						else
							{
								$count_days = $count_days. '<td class = "weekend_day" style = "width: 100px; height: 20px;"> 
																<div style = "width: 100px; text-align: center; font-weight: bold;">
																	'.$number_field['date'].' '.$weekdays[$number_field['weekday']].'
																</div>
															</td>';
							}
					}
				else
					{
						$count_months++;
						echo '
								<script>
									all_current_months.push("current_month_'.$month.'_'.$year.'");
								</script>
								<td class = "working_day" style = "height: 30px;" > 
									<div id = "current_month_'.$month.'_'.$year.'" style = "text-align: center; background: rgba(113, 76, 70, 1); font-weight: bold; height: 30px; border-top: solid 1px #ddd; border-left: solid 1px #ddd; border-right: solid 1px #ddd; padding-top: 5px; ">
										<span style = "font-size: 20px;">'.$all_months[$month].' '.$year.'</span> 
									</div>
									<div>
										<table cellspacing = "1px" cellpadding = "0" style = "background: #ddd; height: 10px;" >
											<tr style = "vertical-align: center;">
												'.$count_days.'
											</tr>
										</table>
									</div>
								</td>';
								
						$month = $number_field['month'];
						$count_days = '';
						
						if ($number_field['weekday'] < 6)  // ... плюс первая дата следующего месяца
							{
								$count_days = $count_days. '<td class = "working_day" style = "width: 100px; height: 20px;"> 
																<div style = "width: 100px; text-align: center; font-weight: bold;">
																	'.$number_field['date'].' '.$weekdays[$number_field['weekday']].'
																</div>
															</td>';
							}
						else
							{
								$count_days = $count_days. '<td class = "weekend_day" style = "width: 100px; height: 20px;"> 
																<div style = "width: 100px; text-align: center; font-weight: bold;">
																	'.$number_field['date'].' '.$weekdays[$number_field['weekday']].'
																</div>
															</td>';
							}
					}
			}
		$count_months++;
		// ... плюс последний месяц в базе	
	echo '	<script>
				all_current_months.push("current_month_'.$month.'_'.$year.'");
			</script>
			<td class = "working_day" style = "height: 30px;" > 
				<div id = "current_month_'.$month.'_'.$year.'" style = "text-align: center; background: rgba(113, 76, 70, 1); font-weight: bold; height: 30px; border-top: solid 1px #ddd; border-left: solid 1px #ddd; border-right: solid 1px #ddd; padding-top: 5px; ">
					<span style = "font-size: 20px;">'.$all_months[$month].' '.$year.'</span> 
				</div>
				<div>
					<table cellspacing = "1px" cellpadding = "0" style = "background: #ddd; height: 10px;" >
						<tr style = "vertical-align: center;">
							'.$count_days.'
						</tr>
					</table>
				</div>
			</td>	
			</tr>
		</table>
		';
			

		  // левая вертикальная линейка домов
	echo '	
			
		<table id = "house_column" cellspacing = "0px" cellpadding = "0" style = "position: absolute; left: 0px; top: 125px; border: solid 1px #ddd; border-style: outset; background: #bbb; z-index: 980;">';

			foreach ($read_house as $house_field)
				{
					echo '
						<tr style = "vertical-align: center;">
							<td>
								<table cellspacing = "1px" cellpadding = "0" >
									<tr>
										<td style = " background: #CAA79C;">
											<div style = "width: 50px; height: 55px;  text-align: center; font-weight: bold; color: #fff;">
												<br>'.$house_field['number_house'].'
											</div>
										</td>
										<td style = " background: #E1B593;">
											<div style = "width: 53px; height: 55px;  text-align: center;">
												<br>'.$house_field['name_room'].'
											</div>
										</td>
										<td style = " background: #CAA79C;">
											<div style = "width: 53px; height: 55px;  text-align: center; color: #fff;">
												<br>'.$house_field['count_place'].'
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>';
				}

	echo '</table>';
	
	
	
	// основная сетка - контент дат 
	
echo '<table cellspacing = "0px" cellpadding = "0" style = "position: absolute; left: 160px; top: 125px; border: solid 1px #ddd; background: #eee;">';

foreach ($read_house as $house_field)
	{
		echo '	<tr>
				';	
		
		$count_days = '';
		$month = '08';
		foreach ($read_number as $number_field)	
			{
				if ($month == $number_field['month'])      // читаем выводимый месяц - плюсуем в переменную счетчика дней в тегах <table>
					{
						if ($number_field['year'] < $current_year)		// если год прошедший
							{
								$count_days = $count_days. '<td>
																<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																	<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																		'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																	</div>
																	<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																		style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																		onclick = "">																							
																		
																	</a>
																</div>
															</td>';
							}
							
						if ($number_field['year'] == $current_year )		// если год текущий
							{
								if ($number_field['month'] < $current_month )		// если месяц прошедший
									{
										$count_days = $count_days. '<td>
																		<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																				onclick = "">																							
																				
																			</a>
																		</div>
																	</td>';
									}
								
								if ($number_field['month'] == $current_month )		// если месяц текущий
									{
										if ($number_field['date'] >= $current_date )	// если дата не прошедшая
											{
												if ($number_field['weekday'] < 6)
													{
														$count_days = $count_days. '<td>
																						<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																							<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center;">
																								'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																							</div>
																							<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																								onclick = "">																							
																								'.$house_field['rate_workday'].' руб.
																							</a>
																						</div>
																					</td>';
													}
												else
													{
														$count_days = $count_days. '<td>
																						<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																							<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																								'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																							</div>
																							<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																								onclick = "">																							
																								'.$house_field['rate_weekend'].' руб.
																							</a>
																						</div>
																					</td>';
													}
											}
										else										// если дата прошедшая
											{
												$count_days = $count_days. '<td>
																				<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																						onclick = "">																							
																						
																					</a>
																				</div>
																			</td>';
											}
									}
								if ($number_field['month'] > $current_month )		// если месяц будущий
									{
										if ($number_field['weekday'] < 6)
											{
												$count_days = $count_days. '<td>
																				<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																						onclick = "">																							
																						'.$house_field['rate_workday'].' руб.
																					</a>
																				</div>
																			</td>';
											}
										else
											{
												$count_days = $count_days. '<td>
																				<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																						onclick = "">																							
																						'.$house_field['rate_weekend'].' руб.
																					</a>
																				</div>
																			</td>';
											}											
									}
							
							}
						if ($number_field['year'] > $current_year )		// если год будущий
							{
								if ($number_field['weekday'] < 6)
									{
										$count_days = $count_days. '<td>
																		<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																				onclick = "">																							
																				'.$house_field['rate_workday'].' руб.
																			</a>
																		</div>
																	</td>';
									}
								else
									{
										$count_days = $count_days. '<td>
																		<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																				onclick = "">																							
																				'.$house_field['rate_weekend'].' руб.
																			</a>
																		</div>
																	</td>';
									}											
							}
														
					}
				else			// по окончанию выводимого месяца выводим набранное значение счетчика дней ...
					{
						echo '	<td class = "working_day" style = "height: 30px;" > 
									<div>
										<table cellspacing = "1px" cellpadding = "0" style = "background: #bbb; height: 10px;" >
											<tr style = "vertical-align: center;">
												'.$count_days.'
											</tr>
										</table>
									</div>
								</td>';
						$month = $number_field['month'];
						$count_days = '';
											//  выводим первую дату следующего месяца
						if ($number_field['year'] < $current_year)		// если год прошедший
							{
								$count_days = $count_days. '<td>
																<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																	<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																		'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																	</div>
																	<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																		style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																		onclick = "">																							
																		
																	</a>
																</div>
															</td>';
							}
							
						if ($number_field['year'] == $current_year )		// если год текущий
							{
								if ($number_field['month'] < $current_month )		// если месяц прошедший
									{
										$count_days = $count_days. '<td>
																		<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																				onclick = "">																							
																				
																			</a>
																		</div>
																	</td>';
									}
								
								if ($number_field['month'] == $current_month )		// если месяц текущий
									{
										if ($number_field['date'] >= $current_date )	// если дата не прошедшая
											{
												if ($number_field['weekday'] < 6)
													{
														$count_days = $count_days. '<td>
																						<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																							<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; ">
																								'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																							</div>
																							<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																								onclick = "">																							
																								'.$house_field['rate_workday'].' руб.
																							</a>
																						</div>
																					</td>';
													}
												else
													{
														$count_days = $count_days. '<td>
																						<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																							<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																								'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																							</div>
																							<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																								onclick = "">																							
																								'.$house_field['rate_weekend'].' руб.
																							</a>
																						</div>
																					</td>';
													}
											}
										else									// если дата прошедшая
											{
												$count_days = $count_days. '<td>
																				<div class = "past_booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #888;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																						onclick = "">																							
																						
																					</a>
																				</div>
																			</td>';
											}
									}
								if ($number_field['month'] > $current_month )		// если месяц будущий
									{
										if ($number_field['weekday'] < 6)
											{
												$count_days = $count_days. '<td>
																				<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																						onclick = "">																							
																						'.$house_field['rate_workday'].' руб.
																					</a>
																				</div>
																			</td>';
											}
										else
											{
												$count_days = $count_days. '<td>
																				<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																					<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																						'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																					</div>
																					<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																						onclick = "">																							
																						'.$house_field['rate_weekend'].' руб.
																					</a>
																				</div>
																			</td>';
											}											
									}
							
							}
						if ($number_field['year'] > $current_year )		// если год будущий
							{
								if ($number_field['weekday'] < 6)
									{
										$count_days = $count_days. '<td>
																		<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer;"
																				onclick = "">																							
																				'.$house_field['rate_workday'].' руб.
																			</a>
																		</div>
																	</td>';
									}
								else
									{
										$count_days = $count_days. '<td>
																		<div class = "booking" id = "date_'.$house_field['id'].'_'.$number_field['id'].'"  style = "width: 100px; opacity: 0.9;">
																			<div style = "position: absolute; top: 2px; width: 100%; font-size: 10px; text-align: center; color: #B22222;">
																				'.$number_field['date'].'.'.$number_field['month'].'.'.$number_field['year'].'
																			</div>
																			<a 	id = "rate_'.$house_field['id'].'_'.$number_field['id'].'" 
																				style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999; cursor: pointer; color: #CD6839;"
																				onclick = "">																							
																				'.$house_field['rate_weekend'].' руб.
																			</a>
																		</div>
																	</td>';
									}											
							}
							
					}
		
			}
			
														// ... плюс последний месяц в базе		
		echo '	<td class = "working_day" style = "height: 30px;" > 
					<div>
						<table cellspacing = "1px" cellpadding = "0" style = "background: #bbb; height: 10px;" >
							<tr style = "vertical-align: center;">
								'.$count_days.'
							</tr>
						</table>
					</div>
				</td>
		
		</tr>';
	}

echo '</table><div style = "position: fixed; top: 10px; right: 10px; z-index: 999;">'.$count_months.'</div>';

?>

</div>

<script>
	window.onscroll = function() 
	{
		var x_wind = window.pageXOffset;
		document.getElementById("house_column").style.left = x_wind + "px";
		document.getElementById("month_row").style.left = 160 - x_wind + "px";
		document.getElementById("data_scroll").value = x_wind;
		
		for (i=0; i<all_current_months.length; i++)
			{
				var obj = document.getElementById(all_current_months[i]);
				var rect = obj.getBoundingClientRect();
				
				if (x_wind >= rect.left+window.pageXOffset)										// выводим текущий месяц с текущим годом
					{
						var current_month_year = all_current_months[i].split("_");
						document.getElementById("display_current_month").value = current_month_year[2];
						document.getElementById("display_current_year").value = current_month_year[3];
					}
					
				if (i<all_current_months.length-1)
					{
						var obj2 = document.getElementById(all_current_months[i+1]);
						var rect2 = obj2.getBoundingClientRect();
					}
				else
					{
						var obj2 = obj;
						var rect2 = rect;
					}
					
				var browser_width = document.body.clientWidth;
				if (x_wind+browser_width >= rect.left+window.pageXOffset)						// выводим следующий месяц с текущим или следующим годом
					{
						var current_month_year = all_current_months[i].split("_");
						document.getElementById("display_next_month").value = current_month_year[2];
						document.getElementById("display_next_year").value = current_month_year[3];
					}
			}
	}
</script>