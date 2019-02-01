<!-- <div style = "position: absolute; width: 100%; height: 100%; z-index: 0;" onclick = "close_modal()"></div> -->

<meta charset = "utf-8">
<link href = "css/styles.css" rel = "stylesheet"  type = "text/css" media = "all">



<br><br><br><br>


<div id = "load_insert_current_number" style = "position: absolute; top: 0px; left: 0px; padding: 10px; background: red; display: none;">    <!-- пишем в базу выбранные номера в реальном времени -->
</div>




	<div id = "house_info" style = "position: relative; width: 1200px; display: inline-block; vertical-align: top; display: block;">
<!--	<div style = "position: absolute; width: 100%; height: 100%; z-index: 0;" onclick = "close_modal()"></div> -->

	<table style = "position: relative; z-index: 10;">
		<tr>
			<td>
				<div id = "load_foto" style = "width: 320px; height: 750px; border: solid 1px #CAA79C; border-style: outset; background: #CAA79C;">
				</div>
			</td>
			<td>
	

	<div style = "position: relative; width: 610px; height: 750px; border: solid 1px #CAA79C; border-style: outset; background: #CAA79C; overflow: hidden;"> 

	<strong><a style = "position: absolute; left: 570px; top: 10px; " class = "close" onclick = "close_modal()">X</a></strong>

	<table id = "mobile_table" style = "transition: 0.7s;"><tr>
	
	<?php

	if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house']; }  	// считываем номер дома 
	if (isset($_REQUEST['my_history'])) { $name_my_history = $_REQUEST['my_history']; }  	// считываем имя файла оперативной истории
	if (isset($_REQUEST['select_month'])) { $select_month = $_REQUEST['select_month']; }  	// считываем выбранный месяц
	if (isset($_REQUEST['select_year'])) { $select_year = $_REQUEST['select_year']; }  		// считываем выбранный год
	if (isset($_REQUEST['id_accaunt'])) { $id_accaunt = $_REQUEST['id_accaunt'];}  			// считываем id аккаунта
	
	
	if (isset($_REQUEST['name_tarif']))                                  // считываем выбранный тариф
		{ 
			$name_tarif = $_REQUEST['name_tarif']; 
			if ($name_tarif != '')
				{
					echo '<script>
								document.getElementById("select_tarif").value = "'.$name_tarif.'";
								var current_tarif = document.getElementById("'.$name_tarif.'").value;
								document.getElementById("name_tarif").value = current_tarif;
							</script>';
				}
			else
				{
					echo '<script>
							document.getElementById("select_tarif").value = "RACK";
							document.getElementById("name_tarif").value = "Основной";
						</script>';
					$name_tarif = 'RACK';
				}
		}  
		
	if (isset($_REQUEST['current_number'])) { $current_number = $_REQUEST['current_number'];}  		// считываем выбранный номер в доме	
	
	?>
	
	<script>
		function display_invert()
			{
				document.getElementById('attention').style.display = 'none';
				document.getElementById('house_info').style.display = 'block';
			}
		
		window.onblur = function()	{ 													// оптимизация нагрузки на трафик - если окно бразера неактивно - прерываем цикл контроля
										document.getElementById("my_history").value = "";
									}
									
		window.onfocus = function()	{ 
										document.getElementById("my_history").value = "<?echo $name_my_history;?>";
										write_current_time();
									}
		
	</script>
	
	<?php
	
	
	// процедура вывода суммы к оплате из файла оперативной истории
	
	$file = '../../history/'.$name_my_history.'.txt';				// открываем файл оперативной истории для чтения	
	$contents = file_get_contents($file); 							// считываем содержимое
	$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"
	
	if ($contents[2] != '')											// условие для разблокировки клавиши забронировать
		{
			echo '<script>
						document.getElementById("start_booking").style.display = "block";
						document.getElementById("start_booking_noactive").style.display = "none";
					</script>';
		}
	
	for ($i=0; $i<=count($contents); $i++)
		{
			$booking_date = preg_split('/,/', $contents[$i]);
			$sum = $sum + $booking_date[6];
		}
	echo   '<script>
				document.getElementById("sum").value = "'.$sum.'";
			</script>';
			
	

	$date_today = date("H:i:s_d.m.Y");	

	$month = preg_split('/\./', $date_today);
	
	$current_date = preg_split('/_/', $month[0]);
	$current_date = $current_date[1];
	
	$year = $month[2];
	$month = $month[1]; 
	$current_month = $month;
	 ?>
	 
	 
	 
	<div style = "position: absolute; left: 400px; top: 20px; display: none; z-index: 999;">
		<a style = "position: absolute; left: -95px; font-weight: bold; color: #fff; letter-spacing: 2px; font-size: 20px; " >Тариф:</a>
		<div style = " top: 0px; display: table-cell;" class = "get_tarif" > 
		<center>
			<input type = "hidden" style = "width: 30px;" value = "RACK" id = "select_tarif" />
			<input type = "text" value = "" id = "name_tarif" style =  "width: 120px; text-align: center;" />
			
			<script>
				function basic()
					{
						document.getElementById("name_tarif").value = "Основной";
						document.getElementById("select_tarif").value = "RACK";
						reset_select_date();
						load_calendar_<?echo $number_house;?>();
					}
				function gilmon()
					{
						document.getElementById("name_tarif").value = "Gilmon";
						document.getElementById("select_tarif").value = "GM50";
						reset_select_date();
						load_calendar_<?echo $number_house;?>();
					}
				function mother_child()
					{
						document.getElementById("name_tarif").value = "Матери с детьми";
						document.getElementById("select_tarif").value = "MD";
						reset_select_date();
						load_calendar_<?echo $number_house;?>();
					}
			</script>
			
			<div id = "all_tarif" class = "all_tarif" >
				<input id = "RACK" type = "button" value = "Основной" onclick =  "basic()"  /><br>
				<input id = "GM50" type = "button" value = "Gilmon" onclick =  "gilmon()" /><br>
				<input id = "MD" type = "button" value = "Матери с детьми" onclick =  "mother_child()" />
				<br><br>
			</div>
		</center>
		</div>
	</div>
	
	
	<!-- возвращаем значение селектора переменной select_month и select_year-->
	<script>
		document.getElementById("select_month").value = "<? echo $select_month;?>"; 
		var name_month = document.getElementById("<?echo $select_month;?>").value;
		document.getElementById("name_month").value = name_month;
		document.getElementById("select_year").value = "<?echo $select_year;?>";
	</script>
	

	<div style = "position: absolute; display: table; left: 300px; top: 20px; z-index: 990;">
	
		<div style = "display: table-row; vertical-align: center;">
			<div style = "display: table-cell;">
				<script>
					function back_year()
						{
							var read_select_year = document.getElementById('select_year').value;
							if (read_select_year > "<?echo $year?>")
								{
									read_select_year--;
								}
							document.getElementById('select_year').value = read_select_year;
							load_calendar_<?echo $number_house;?>();
						}
				</script>
				<input type = "button" onclick = "back_year()" value = "<" class = "back_next" />
			</div>
			<div style = "display: table-cell;">
				<input id = "select_year" type = "text" style = "width: 100px; text-align: center; border: solid 1px #CAA79C; border-style: inset;" value = "" />
			</div>
			<div style = "display: table-cell;">
				<script>
					function next_year()
						{
							var read_select_year = document.getElementById('select_year').value;
							if (read_select_year < "2029")
								{
									read_select_year++;
								}
							document.getElementById('select_year').value = read_select_year;
							load_calendar_<?echo $number_house;?>();
						}
				</script>
				<input type = "button" onclick = "next_year()" value = ">" class = "back_next" >
				
			</div>
			
		</div>
	
	
		<div style = "display: table-row; vertical-align: center;">
			<div style = "display: table-cell;">
				<script>
					function back_month()
						{
							var read_select_year = document.getElementById('select_year').value;
							var read_select_month = document.getElementById('select_month').value;
							
							if (read_select_year <= <?echo $year;?>)
								{
									if (read_select_month > <?echo $month;?>)
										{
											read_select_month = read_select_month-1;
											if (read_select_month < 1)
												{
													read_select_month = "12";
													setTimeout("back_year()", 100);
												}
											if (read_select_month < 10)
												{
													read_select_month = "0" + String(read_select_month);
												}							
											document.getElementById('select_month').value = read_select_month;
											load_calendar_<?echo $number_house;?>();
										}
								}
							else
								{
									read_select_month = read_select_month-1;
									if (read_select_month < 1)
										{
											read_select_month = "12";
											setTimeout("back_year()", 100);
										}
									if (read_select_month < 10)
										{
											read_select_month = "0" + String(read_select_month);
										}							
									document.getElementById('select_month').value = read_select_month;
									load_calendar_<?echo $number_house;?>();
								}
						}
				</script>
				<input type = "button" onclick = "back_month()" value = "<" class = "back_next" >
			</div>
			
			<div style = "display: table-cell; width: 100px;" class = "get_month" > 
				<input type = "hidden" style = "width: 30px;" value = "" id = "select_month" />
				<input type = "text" value = "" id = "name_month" style =  "width: 100px; text-align: center; border: solid 1px #CAA79C; border-style: inset;" />
				<div style = "position: absolute; left: 0px; top: 20px;">
					<div class = "all_month" >
						<input id = "01" type = "button" value = "Январь" onclick =  "document.getElementById('select_month').value = '01'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "02" type = "button" value = "Февраль" onclick =  "document.getElementById('select_month').value = '02'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "03" type = "button" value = "Март" onclick =  "document.getElementById('select_month').value = '03'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "04" type = "button" value = "Апрель" onclick =  "document.getElementById('select_month').value = '04'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "05" type = "button" value = "Май" onclick =  "document.getElementById('select_month').value = '05'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "06" type = "button" value = "Июнь" onclick =  "document.getElementById('select_month').value = '06'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "07" type = "button" value = "Июль" onclick =  "document.getElementById('select_month').value = '07'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "08" type = "button" value = "Август" onclick =  "document.getElementById('select_month').value = '08'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "09" type = "button" value = "Сентябрь" onclick = "document.getElementById('select_month').value = '09'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "10" type = "button" value = "Октябрь" onclick = "document.getElementById('select_month').value = '10'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "11" type = "button" value = "Ноябрь" onclick = "document.getElementById('select_month').value = '11'; load_calendar_<?echo $number_house;?>()" /><br>
						<input id = "12" type = "button" value = "Декабрь" onclick = "document.getElementById('select_month').value = '12'; load_calendar_<?echo $number_house;?>()" /><br><br><br>
					</div>
				</div>
			</div>
			
			<div style = "display: table-cell;">
				<script>
					function next_month()
						{
							var read_select_month = document.getElementById('select_month').value;
							read_select_month = read_select_month-1+2;
							if (read_select_month > 12)
								{
									read_select_month = "01";
									setTimeout("next_year()", 100);
								}
							if (read_select_month < 10)
								{
									if (read_select_month != "01")
										{
											read_select_month = "0" + String(read_select_month);
										}
								}							
							document.getElementById('select_month').value = read_select_month;
							load_calendar_<?echo $number_house;?>();
						}
				</script>
				<input type = "button" onclick = "next_month()" value = ">" class = "back_next">
			</div>
			
		</div>
		
	</div> 
	
	
	

	<?

	echo '
			<br><strong><a id = "number_house" style = "font-size: 35px; font-family: pragmatica; color: #fff; padding-left: 30px; padding-right: 30px; cursor: pointer;">Дом №'.$number_house.'</a></strong><br><br>
			<script>
				var external_foto = "<center><img src = \'images/foto/house_'.$number_house.'_foto1.jpg\' style = \'margin-top: 10px; border: solid 1px #CAA79C; border-style: inset; width: 300px; \'>";
				var house_description = "<p style = \' background: #fff; font-family: pragmatica;\'>Описание дома</p></center>"
				document.getElementById("load_foto").innerHTML = external_foto + house_description;
			</script>
			
		<div style = "position: relative; margin-left: 5px;">
			';								
			
			
			// выводим фотографию дома с описанием

	require_once '../../base/connection_base.php';    

	$house_bufer =  $db->query('SELECT * FROM house');
	$read_house = $house_bufer->fetchAll();

	$count_number = 0;									

		// счетчик количества номеров в доме

	foreach ($read_house as $house_field)					// определяем число номеров в доме - выводим кнопки переключения
		{
			if ($house_field[$number_house] != '')
				{
					$count_number++;
					
					if ($count_number == 1)					// если в доме только один номер
						{
							echo '
								<script>
									function move_mobile_table_1()
										{
											document.getElementById("mobile_table").style.marginLeft = 0 + "px"; 
											for (i=1; i<=4; i++)
												{
													var goto_number_n = document.getElementById("goto_number_" + i);
													if (goto_number_n)
														{
															document.getElementById("goto_number_" + i).className = "number_select";
														}
												}
										}
								</script>
								
								<input id = "goto_number_1" type = "button" value = "№ 1" onclick = "document.getElementById(\'current_number\').value = \'/1\'; move_mobile_table_1(); this.className = \'current_number\'" class = "current_number" >';
						}
					else									// если в доме несколько номеров
						{
							echo '	
								<script>
									document.getElementById("current_number").style.display = "block";
									function move_mobile_table_'.$count_number.'()
										{
											document.getElementById("mobile_table").style.marginLeft = -('.$count_number.'-1)*608 + "px"; 
											for (i=1; i<=4; i++)
												{
													var goto_number_n = document.getElementById("goto_number_" + i);
													if (goto_number_n)
														{
															document.getElementById("goto_number_" + i).className = "number_select";
														}
												}
										}
								</script>
								
								<input id = "goto_number_'.$count_number.'" type = "button" value = "№ '.$count_number.'" onclick = "document.getElementById(\'current_number\').value = \'/'.$count_number.'\'; move_mobile_table_'.$count_number.'(); this.className = \'current_number\'" class = "number_select" />';
						}				
				}
		}
	echo '	<script>
				document.getElementById("current_number").value = "'.$current_number.'";
				current_number = "'.$current_number.'";
				current_number = current_number.split("/");
				current_number = current_number[1];
				document.getElementById("mobile_table").style.marginLeft = -(current_number-1)*608 + "px";
				for (i=1; i<=4; i++)
					{
						var goto_number_n = document.getElementById("goto_number_" + i);
						if (goto_number_n)
							{
								document.getElementById("goto_number_" + i).className = "number_select";
							}
					}
				document.getElementById("goto_number_" + current_number).className = "current_number";
			</script>
			<input id = "current_number" type = "text" value = "/1" style = "position: absolute; top: -50px; left: 180px; font-size: 30px; font-family: pragmatica; font-weight: bold; color: #fff; background: none; border: none; display: none;" />
			</div>';
	
	
	$count_number = 0;											// счетчик количества номеров в доме

	foreach ($read_house as $house_field)
		{
			$guest_room = $house_field[$number_house];				// определяем номер по порядку прайса

			if ($house_field[$number_house] != '')
				{				
					$count_number++;
					
					if (isset($_REQUEST['count_place_'.$count_number])) { $count_place = $_REQUEST['count_place_'.$count_number];}     // считываем количество мест в данном номере
					
					
					echo '<td style = "width: 600px; border: solid 1px #CAA79C; border-style: inset;">
							<div style = "width: 600px; float: left; background: rgba(113, 76, 70, 1);">
							<div style = "padding: 10px 0px 10px 20px;">
							<strong>
							<a style = "color: #fff; padding-left: 10px; padding-right: 10px; font-size: 20px; font-family: pragmatica;" >
								Номер: '.$count_number.'
							</a> 
							<a id = "write_count_place" style = "color: #fff; padding-left: 10px; padding-right: 10px; font-size: 20px; font-family: pragmatica;" >
								Мест: '.$count_place.'
							</a> 
							</strong> 
							<input id = "booking_date_'.$count_number.'" type = "text" class = "noredakt_text" readonly=true>
							</div>';
					
					
					
					
					// определяем сдвиг календарной сетки  до первого дня месяца		

					$bufer = $db->query('SELECT * FROM numbers');
					$readbufer = $bufer->fetchAll();
					
					foreach ($readbufer as $field)	
						{
							if ($field['year'] == $select_year && $field['month'] == $select_month && $field['date'] == '1')
								{
									$frst_day= $field['weekday'];  // определяем день недели первого числа
								}          
						} 
							
	
							
						
					

					// таблица месяца (зеленая)

					echo '<table cellspacing = "3px" style = "background: #E1B593; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;"><tr style = "vertical-align: center;">';
					
					
					$weekdays= array(	1 => "Вскр", 
										2 => "Пн", 
										3 => "Втр",
										4 => "Ср",
										5 => "Чтв",
										6 => "Пт",
										7 => "Сбт");
					
					
					for ($i=1; $i<=5; $i++)
						{
							echo '<td class = "working_day"><center>'.$weekdays[$i].'</center></td>';
						}
					for ($i=6; $i<=7; $i++)
						{
							echo '<td class = "weekend_day"><center>'.$weekdays[$i].'</center></td>';
						}
					echo '</tr><tr style = "vertical-align: top;">';
					

					if ($frst_day > 1)								// если первое число месяца не первый день недели ...
						{
							for ($i = 1; $i <= $frst_day-1; $i++)
								{
									echo '<td></td>';				// выводим пустые поля до первого понедельника
								}
						}

						
						
						
					$bufer = $db->query('SELECT * FROM numbers');		// выводим информацию о номерах
					$readbufer = $bufer->fetchAll();
					

					foreach ($readbufer as $field)	
						{ 
							if ($field['year'] == $select_year)								//  считываем выбранный год
								{
									if ($field['month'] == $select_month)  					//  считываем выбранный месяц
										{						
											$weekday = $field['weekday'];  
											
																		
											
											// процедура определения цены на данную дату 
										
											$rate_bufer =  $db->query('SELECT * FROM rate WHERE id = "'.$house_field['house_'.$number_house].'"');			// обращаемся к таблице цен
											$read_rate = $rate_bufer->fetchAll();
											
											foreach ($read_rate as $rate_field)
												{
													if ($field['weekday'] < 6)
														{
															$place_rate = $rate_field['rate_workday'];
															
															
															
															// зимняя скидка на комфорт 4 места 1 комната
												
															$class_komfort = $rate_field['class'];   				// считываем класс комфортности
															$class_komfort = preg_split('/_/', $class_komfort);
															$class_komfort = $class_komfort[1];                     // выводим код класса комфортности
														
															
															if ($class_komfort == '4x1r')
																{
																	if ($field['year'] == 2019 && $field['month'] <= '02')
																		{
																			$place_rate = $place_rate - 200*$rate_field['count_place'];
																		}
																	if ($field['year'] == 2018)
																		{
																			$place_rate = $place_rate - 200*$rate_field['count_place'];
																		}
																}
																
																
																
															
															// пересчитываем цены по выбранному тарифу
															if ($field['year'] == 2018 && $field['month'] < 12)
																{
																	if ($name_tarif == 'GM50')
																		{
																			$place_rate = $place_rate*0.5;
																		}
																	if ($name_tarif == 'MD')
																		{
																			$place_rate = 1200*$rate_field['count_place'];
																		}
																}
															if ($field['year'] == 2018 && $field['month'] == 12 && $field['date'] < 10)
																{
																	if ($name_tarif == 'GM50')
																		{
																			$place_rate = $place_rate*0.5;
																		}
																}
															if ($field['year'] == 2018 && $field['month'] == 12 && $field['date'] < 31)
																{
																	if ($name_tarif == 'MD')
																		{
																			$place_rate = 1200*$rate_field['count_place'];
																		}
																}
																
															
															
															
															// процедура определения цены на новогодние дни
															if ($field['year'] == 2018 && $field['month'] == 12 && $field['date'] == 31)
																{
																	$place_rate = 2500*$rate_field['count_place'];
																	echo '	<script>
																				document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
																			</script>';
																}
															if ($field['year'] == 2019 && $field['month'] == '01' && $field['date'] == 1)
																{
																	$place_rate = 2500*$rate_field['count_place'];
																	echo '	<script>
																				document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
																			</script>';
																}

																
															if ($field['year'] == 2019 && $field['month'] == '01' && $field['date'] > 1)
																{
																	if ($field['date'] < 9)
																		{
																			$place_rate = 2000*$rate_field['count_place'];
																			echo '	<script>
																						document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
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
																	if ($field['year'] == 2019 && $field['month'] <= '02')
																		{
																			$place_rate = $place_rate - 200*$rate_field['count_place'];
																		}
																	if ($field['year'] == 2018)
																		{
																			$place_rate = $place_rate - 200*$rate_field['count_place'];
																		}
																}
																
																
																
															// пересчитываем цены по выбранному тарифу
															if ($field['year'] == 2018 && $field['month'] < 12)
																{
																	if ($name_tarif == 'GM50')
																		{
																			$place_rate = $place_rate*0.7;
																		}
																	if ($name_tarif == 'MD')
																		{
																			$place_rate = 1200*$rate_field['count_place'];
																		}
																}
															if ($field['year'] == 2018 && $field['month'] == 12 && $field['date'] < 10)
																{
																	if ($name_tarif == 'GM50')
																		{
																			$place_rate = $place_rate*0.7;
																		}
																}
															if ($field['year'] == 2018 && $field['month'] == 12 && $field['date'] < 31)
																{
																	if ($name_tarif == 'MD')
																		{
																			$place_rate = 1200*$rate_field['count_place'];
																		}
																}
															
															
															
															// процедура определения цены на новогодние дни
															if ($nfield['year'] == 2018 && $field['month'] == 12 && $field['date'] == 31)
																{
																	$place_rate = 2500*$rate_field['count_place'];
																	echo '	<script>
																				document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
																			</script>';
																}
															if ($field['year'] == 2019 && $field['month'] == '01' && $field['date'] == 1)
																{
																	$place_rate = 2500*$rate_field['count_place'];
																	echo '	<script>
																				document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
																			</script>';
																}
																
																
															if ($field['year'] == 2019 && $field['month'] == '01' && $field['date'] > 1)
																{
																	if ($field['date'] < 9)
																		{
																			$place_rate = 2000*$rate_field['count_place'];
																			echo '	<script>
																						document.getElementById("rate_'.$count_number.'_'.$field['id'].'").style.color = "red";
																					</script>';
																		}
																}
																
														}
																									
													
												}
												
												
																				
												
												
											if ($select_month == $current_month)	
												{
													if ($field['date'] >= $current_date)
														{											
															if ($field['number_'.$guest_room] == '')		// если значение поля пустое - закрашиваем поле в белый цвет
																{
																	echo '
																			<script>
																				function booking_date_'.$count_number.'_'.$field['id'].'()
																					{
																						$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																						document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																						document.getElementById("start_booking").style.display = "block";
																						document.getElementById("start_booking_noactive").style.display = "none";
																					}
																			</script>
																			<td class = "booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																				<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: height: 100%; 100%; display: none; z-index: 10;">
																				<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																						id = "click_booking_'.$count_number.'_'.$field['id'].'"
																						onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																						>
																				</div>
																				<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																					<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																					<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																					<br>
																					<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																							'.$place_rate.' руб.
																					</a>
																				</div>	
																			</td>										
																			';
																}
																
															if ($field['number_'.$guest_room] == '0')					// если значение поля 0 - закрашиваем поле в оранжевый цвет (бронь ждем оплаты)
																{
																	echo '<script>
																				function booking_date_'.$count_number.'_'.$field['id'].'()
																					{																		
																						$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																						document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																						document.getElementById("start_booking").style.display = "block";
																						document.getElementById("start_booking_noactive").style.display = "none";
																					}
																			</script>
																			
																			<td class = "booking_tentative" id = "date_'.$count_number.'_'.$field['id'].'" >
																				<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: block; z-index: 10;">
																				<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																						id = "click_booking_'.$count_number.'_'.$field['id'].'"
																						onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																						>
																				</div>
																				<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																					<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																					<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																					<br>
																					<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																							Ждем оплаты
																					</a>
																				</div>	
																			</td>									
																			';
																}
															if ($field['number_'.$guest_room] == '1')					// если значение поля 1 - закрашиваем поле в бордовый цвет (оплаченная бронь)
																{
																	if ($field['user_'.$guest_room] == $id_accaunt)
																		{											
																			echo '	<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "booking_select" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Оплачено
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																	else
																		{
																			echo '	<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "paid_booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Оплачено
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																}
														}
													else
														{
															if ($select_year <= $year)
																{
																	echo '<td class = "past_booking">																		
																				<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																					<a style = "position: absolute; left: 5px; top: 3px; color: #fff;">'.$field['date'].'</a>
																				</div>	
																			</td>';
																}
															else
																{
																	if ($field['number_'.$guest_room] == '')		// если значение поля пустое - закрашиваем поле в белый цвет
																		{
																			echo '
																					<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					<td class = "booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: height: 100%; 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									'.$place_rate.' руб.
																							</a>
																						</div>	
																					</td>										
																					';
																		}
																		
																	if ($field['number_'.$guest_room] == '0')					// если значение поля 0 - закрашиваем поле в оранжевый цвет (бронь ждем оплаты)
																		{
																			echo '<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "booking_tentative" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: block; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Ждем оплаты
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																	if ($field['number_'.$guest_room] == '1')					// если значение поля 1 - закрашиваем поле в бордовый цвет (оплаченная бронь)
																		{
																			if ($field['user_'.$guest_room] == $id_accaunt)
																				{
																					echo '	<script>
																								function booking_date_'.$count_number.'_'.$field['id'].'()
																									{																		
																										$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																										document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																										document.getElementById("start_booking").style.display = "block";
																										document.getElementById("start_booking_noactive").style.display = "none";
																									}
																							</script>
																							
																							<td class = "booking_select" id = "date_'.$count_number.'_'.$field['id'].'" >
																								<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																								<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																										id = "click_booking_'.$count_number.'_'.$field['id'].'"
																										onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																										>
																								</div>
																								<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																									<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																									<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																									<br>
																									<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																										style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																											Оплачено
																									</a>
																								</div>	
																							</td>									
																							';
																				}
																			else
																				{
																					echo '	<script>
																								function booking_date_'.$count_number.'_'.$field['id'].'()
																									{																		
																										$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																										document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																										document.getElementById("start_booking").style.display = "block";
																										document.getElementById("start_booking_noactive").style.display = "none";
																									}
																							</script>
																							
																							<td class = "paid_booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																								<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																								<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																										id = "click_booking_'.$count_number.'_'.$field['id'].'"
																										onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																										>
																								</div>
																								<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																									<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																									<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																									<br>
																									<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																										style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																											Оплачено
																									</a>
																								</div>	
																							</td>									
																							';
																				}
																		}
																				
																}
														}
												}
											else
												{
													if ($select_year <= $year)
														{
															
															if ($select_month > $current_month)
																{
																	if ($field['number_'.$guest_room] == '')		// если значение поля пустое - закрашиваем поле в белый цвет
																		{
																			echo '
																					<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					<td class = "booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: height: 100%; 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									'.$place_rate.' руб.
																							</a>
																						</div>	
																					</td>										
																					';
																		}
																		
																	if ($field['number_'.$guest_room] == '0')					// если значение поля 0 - закрашиваем поле в оранжевый цвет (бронь ждем оплаты)
																		{
																			echo '<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "booking_tentative" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: block; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Ждем оплаты
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																	
																		
																	if ($field['number_'.$guest_room] == '1')					// если значение поля 1 - закрашиваем поле в бордовый цвет (оплаченная бронь)
																		{
																			if ($field['user_'.$guest_room] == $id_accaunt)
																				{
																					echo '	<script>
																								function booking_date_'.$count_number.'_'.$field['id'].'()
																									{																		
																										$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																										document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																										document.getElementById("start_booking").style.display = "block";
																										document.getElementById("start_booking_noactive").style.display = "none";
																									}
																							</script>
																							
																							<td class = "booking_select" id = "date_'.$count_number.'_'.$field['id'].'" >
																								<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																								<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																										id = "click_booking_'.$count_number.'_'.$field['id'].'"
																										onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																										>
																								</div>
																								<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																									<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																									<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																									<br>
																									<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																										style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																											Оплачено
																									</a>
																								</div>	
																							</td>									
																							';
																				}
																			else
																				{
																					echo '	<script>
																								function booking_date_'.$count_number.'_'.$field['id'].'()
																									{																		
																										$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																										document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																										document.getElementById("start_booking").style.display = "block";
																										document.getElementById("start_booking_noactive").style.display = "none";
																									}
																							</script>
																							
																							<td class = "paid_booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																								<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																								<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																										id = "click_booking_'.$count_number.'_'.$field['id'].'"
																										onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																										>
																								</div>
																								<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																									<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																									<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																									<br>
																									<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																										style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																											Оплачено
																									</a>
																								</div>	
																							</td>									
																							';
																				}
																		}
																						
																}
														}
													else
														{
															if ($field['number_'.$guest_room] == '')		// если значение поля пустое - закрашиваем поле в белый цвет
																{
																	echo '
																			<script>
																				function booking_date_'.$count_number.'_'.$field['id'].'()
																					{																		
																						$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																						document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																						document.getElementById("start_booking").style.display = "block";
																						document.getElementById("start_booking_noactive").style.display = "none";
																					}
																			</script>
																			<td class = "booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																				<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: height: 100%; 100%; display: none; z-index: 10;">
																				<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																						id = "click_booking_'.$count_number.'_'.$field['id'].'"
																						onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																						>
																				</div>
																				<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																					<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																					<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																					<br>
																					<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																							'.$place_rate.' руб.
																					</a>
																				</div>	
																			</td>										
																			';
																}
																
															if ($field['number_'.$guest_room] == '0')					// если значение поля 0 - закрашиваем поле в оранжевый цвет (бронь ждем оплаты)
																{
																	echo '<script>
																				function booking_date_'.$count_number.'_'.$field['id'].'()
																					{																		
																						$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																						document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "block";
																						document.getElementById("start_booking").style.display = "block";
																						document.getElementById("start_booking_noactive").style.display = "none";
																					}
																			</script>
																			
																			<td class = "booking_tentative" id = "date_'.$count_number.'_'.$field['id'].'" >
																				<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: block; z-index: 10;">
																				<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: block; z-index: 15;"
																						id = "click_booking_'.$count_number.'_'.$field['id'].'"
																						onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																						>
																				</div>
																				<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																					<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																					<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																					<br>
																					<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																						style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																							Ждем оплаты
																					</a>
																				</div>	
																			</td>									
																			';
																}
															if ($field['number_'.$guest_room] == '1')					// если значение поля 1 - закрашиваем поле в бордовый цвет (оплаченная бронь)
																{
																	if ($field['user_'.$guest_room] == $id_accaunt)
																		{
																			echo '	<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "booking_select" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Оплачено
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																	else
																		{
																			echo '	<script>
																						function booking_date_'.$count_number.'_'.$field['id'].'()
																							{																		
																								$("#load_insert_current_number").load("../config/insert_current_number.php", "number_house='.$number_house.'&number='.$count_number.'&date='.$field['date'].'&weekday='.$weekday.'&id_primary='.$field['id'].'&my_history='.$name_my_history.'&select_tarif='.$name_tarif.'");
																								document.getElementById("expectation_'.$count_number.'_'.$field['id'].'").style.display = "none";
																								document.getElementById("start_booking").style.display = "block";
																								document.getElementById("start_booking_noactive").style.display = "none";
																							}
																					</script>
																					
																					<td class = "paid_booking" id = "date_'.$count_number.'_'.$field['id'].'" >
																						<img id = "expectation_'.$count_number.'_'.$field['id'].'" src = "images/fon/expectation.gif" style = "position: absolute; width: 100%; height: 100%; display: none; z-index: 10;">
																						<div 	style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; display: none; z-index: 15;"
																								id = "click_booking_'.$count_number.'_'.$field['id'].'"
																								onclick = "this.style.display = \'none\'; booking_date_'.$count_number.'_'.$field['id'].'();"
																								>
																						</div>
																						<div style = "position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">	
																							<a style = "position: absolute; left: 5px; top: 3px;">'.$field['date'].'</a>
																							<input id = "id_'.$field['id'].'" type = "hidden" style = "float: right; width: 20px; height: 10px;" value = "'.$field['id'].'"/>
																							<br>
																							<a 	id = "rate_'.$count_number.'_'.$field['id'].'" 
																								style = "position: absolute; bottom: 3px; width: 100%; text-align: center; font-size: 12px; color: #999;">
																									Оплачено
																							</a>
																						</div>	
																					</td>									
																					';
																		}
																}
																		
														}
												}
														
														
												
												
												
												
												
											if ($field['weekday'] == 7)									// если последнее число месяца не последний день недели ...
												{
													echo '</tr><tr style = "vertical-align: top;">';
												}
										}
								}
						}
						
						
						
						
						
						
					if ($weekday != 7)
						{
							for ($i = 1; $i <= 7-$weekday; $i++)
								{
									echo '<td></td>';
								}
						}
						
					echo '</tr><tr  style = "vertical-align: center;">';
						
					for ($i=1; $i<=5; $i++)
						{
							echo '<td class = "working_day"><center>'.$weekdays[$i].'</center></td>';
						}
					for ($i=6; $i<=7; $i++)
						{
							echo '<td class = "weekend_day"><center>'.$weekdays[$i].'</center></td>';
						}
						
					echo '</tr></table></div></td>';
				}
		}
	
	?>

	
	</tr></table> 
	
	
	<strong>


			<div style = "display: inline-block; vertical-align: top; padding: 20px;">		
					<div style = "width: 20px; height: 20px; background: #fff; float: left;"></div>
					<div style = " color: #fff; float: left; font-size: 13px;"><span style = "opacity: 0;">-</span> - свободно</div>
					
					<div style = "width: 30px; height: 20px; background: none; float: left;"></div>
					
					<div style = "width: 20px; height: 20px; background: rgba(173, 255, 47, 1); float: left;"></div>
					<div style = " color: #fff; float: left; font-size: 13px;"><span style = "opacity: 0;">-</span> - Ваш выбор </div>
					
					<div style = "width: 30px; height: 20px; background: none; float: left;"></div>
					
					<div style = "width: 20px; height: 20px; background: rgba(255, 165, 0, 1); float: left;"></div>
					<div style = " color: #fff; float: left; font-size: 13px;"><span style = "opacity: 0;">-</span> - забронировано </div>
					
					<div style = "width: 30px; height: 20px; background: none; float: left;"></div>
					
					<div style = "width: 20px; height: 20px; background: rgba(150, 0, 0, 1); float: left;"></div>
					<div style = " color: #fff; float: left; font-size: 13px;"><span style = "opacity: 0;">-</span> - оплачено </div>
			</div>
			
			<br>
				
				<a style = "color: #fff; padding-left: 10px; padding-right: 10px; font-size: 20px; font-family: pragmatica;" >
					Сумма к оплате:
				</a>
				<input id = "sum" type = "text" value = "0" class = "noredakt_text" style = "background: rgba(113, 76, 70, 1); padding-top: 5px; padding-bottom: 5px; text-align: right; border: solid 1px #CAA79C; border-style: inset;" readonly=true>
													
			<br><br>
				
				
			<script>
			
				var number_house = document.getElementById("number_house").innerHTML;		// считываем номер дома
				var sum_confirm = 0;
				
				number_house = "<input name = \'number_house\' type = \'text\' style = \'font-size: 30px; font-family: pragmatica; background: none; border: none; color: #fff; padding-right: 30px; float: left; font-weight: bold;\' value = \'" + number_house + " \' readonly=true ><br><br><br>";
				var sum_select_dates = "";
				
				function input_select_dates()
					{
						document.getElementById("input_select_dates").innerHTML = number_house + sum_select_dates;  // выводим номера, на которых есть бронируемые даты
						document.getElementById("sum_confirm").value = sum_confirm;
						document.getElementById("again_my_history").value = "<?echo $name_my_history;?>";
					}
				function confirm_book()
					{
						var sum = document.getElementById("sum").value;              							// считываем сумму к оплате
						sum = Number(sum);
						sum_confirm = Number(sum_confirm);
						sum_confirm = sum_confirm + sum;
						
						for (i = 1; i <= <?echo $count_number;?>; i++)                                          // прочесываем все номера
							{
								var select_dates = document.getElementById("booking_date_" + i).value;  		// считываем набор выбранных дат на каждый номер  
								if (select_dates != "")
									{
										sum_select_dates = sum_select_dates + "<div style = \'float: left;\'><strong><a style = \'color: #fff; padding-right: 20px; font-size: 20px; font-family: pragmatica;\' >Номер " + i + ":</a></strong><input type = \'text\' name = \'number_" + i + "\' value = \'" + select_dates + " \' readonly=true ></div><br><br>";
									}
							}
						$("#modal_window").load("load/user_confirm.html");
						setTimeout("input_select_dates()", 100);
						setTimeout("input_select_dates()", 500);
						setTimeout("input_select_dates()", 1000);						
					}
			</script>
					
				<a 	id = "start_booking"	
					class = "final_button" style = "float: right; display: none;" 
					onclick = "confirm_book()">Забронировать</a>
					
				<a 	id = "start_booking_noactive"	
					class = "final_button_noactive" style = "float: right; display: block;" 
					>Забронировать</a>
									
			
				<a 	class = "final_button"  style = "float: right;"
					onclick = "reset_select_date(); load_calendar_<?echo $number_house;?>(); ">Сбросить</a>

			
			</strong> </div>

			</td>
		</tr>
		
	</table>

	</div>
	






