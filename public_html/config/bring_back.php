<?php

if (isset($_REQUEST['user_number'])) { $user_number = $_REQUEST['user_number']; }                  	// номер пользователя в таблице
if (isset($_REQUEST['number_request'])) { $number_request = $_REQUEST['number_request']; }			// номер заявки
if (isset($_REQUEST['booking'])) { $booking = $_REQUEST['booking']; }								// содержимое заявки
	
	$booking = preg_split('/ number:/', $booking);
	
	require_once '../../base/connection_base.php';
	
	$number_bufer = $db->query('SELECT * FROM numbers');			  // обращаемся к таблице прайса номеров
	$read_number = $number_bufer->fetchAll();
	
	$switch = 0;
	
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
									if ($number_field['number_'.$hotel_number] != '')
										{
											$switch = 1; 	
										}
								}
						}
				}
		}
		
	if ($switch == 0)
		{
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
											if ($number_field['number_'.$hotel_number] == '')
												{
													// возвращаем бронирование - вводим 0 в соответствующее поле
													$db->query('UPDATE numbers SET number_'.$hotel_number.' = "0" WHERE id = "'.$number_field['id'].'"'); 
													$db->query('UPDATE numbers SET user_'.$hotel_number.' = "'.$user_number.'" WHERE id = "'.$number_field['id'].'"');
												}
										}
								}
						}
				}
		
						

			$history_bufer =  $db->query('SELECT * FROM history WHERE id = "'.$number_request.'"');			// обращаемся к таблице истории конкретного пользователя по id 
			$read_history = $history_bufer->fetchAll();

			$db->query('UPDATE history SET approval = "" WHERE id = "'.$number_request.'"'); 
			
			echo '<script>setTimeout("load_user_history_'.$user_number.'()", 100);</script>';
	
		}