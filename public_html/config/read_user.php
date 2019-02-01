<?php

require_once '../../base/connection_base.php';

$user_bufer =  $db->query('SELECT * FROM user ORDER BY surname');										// обращаемся к таблице пользователей
$read_user = $user_bufer->fetchAll();


foreach($read_user as $user_field)
	{
		$history_bufer =  $db->query('SELECT * FROM history WHERE user_id = "'.$user_field['id'].'"');			// обращаемся к таблице истории заявок
		$read_history = $history_bufer->fetchAll();
		
		foreach($read_history as $history_field)										// считываем таблицу для отображения последнего события
			{
				$time = $history_field['time'];
				$booking = $history_field['booking'];
			}
		echo '	<script>
					function load_user_history_'.$user_field['id'].'()
						{
							var isset_number_house = document.getElementById("number_house");
							if (isset_number_house) 
								{
									var number_house = document.getElementById("number_house").innerHTML;                   // процедура считывания номера дома
									number_house = number_house.split("№");
									number_house = number_house[1];
									
									var my_history = document.getElementById("my_history").value;											// читаем имя файла оперативной истории
									if (my_history != "")																					// если имя истории существует (в монитор был загружен дом) ...
										{
											$("#browser").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house="+number_house+"&user_number='.$user_field['id'].'");
											document.getElementById("my_history").value = "";
										}
									else
										{
											$("#browser").load("../config/delete_my_history_for_admin.php", "&user_number='.$user_field['id'].'");
											document.getElementById("my_history").value = "";
										}
								}
							else
								{
									$("#browser").load("../config/delete_my_history_for_admin.php", "&user_number='.$user_field['id'].'");
									document.getElementById("my_history").value = "";
								}
						}
				</script>
				<div	onclick = "load_user_history_'.$user_field['id'].'(); remove_style(); load_read_user();"
						class = "user_prise_button">
						'.$user_field['surname'].' '.$user_field['telephone'].'<br></div>';
	}

?>