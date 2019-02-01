<?php

if (isset($_REQUEST['surname_value'])) { $surname_value = $_REQUEST['surname_value']; }
if (isset($_REQUEST['name_value'])) { $name_value = $_REQUEST['name_value']; }
if (isset($_REQUEST['patronymic_value'])) { $patronymic_value = $_REQUEST['patronymic_value']; }
if (isset($_REQUEST['tel_value'])) { $tel_value = $_REQUEST['tel_value']; }
if (isset($_REQUEST['email_value'])) { $email_value = $_REQUEST['email_value']; }

require_once '../../base/connection_base.php';

$user_bufer = $db->query('SELECT * FROM user');     // обращаемся к таблице пользователей для вывода фамилии и телефона в заголовке
$read_user = $user_bufer->fetchAll();

$n = 0;        // счетчик выведенных строк подсказок

foreach ($read_user as $user_field)
	{	
			
		if (stristr($user_field['telephone'], $tel_value, 0) != false or stristr(mb_strtolower($user_field['surname']), mb_strtolower($surname_value), 0) != false or stristr(mb_strtolower($user_field['name']), mb_strtolower($name_value), 0) != false or stristr(mb_strtolower($user_field['patronymic']), mb_strtolower($patronymic_value), 0) != false or stristr(mb_strtolower($user_field['email']), mb_strtolower($email_value), 0) != false)
			{
				$n++;
				echo '	<script>
							function load_user_'.$user_field['id'].'()
								{
									document.getElementById("id_user").value = "'.$user_field['id'].'";
									document.getElementById("surname").value = "'.$user_field['surname'].'";
									document.getElementById("name").value = "'.$user_field['name'].'";
									document.getElementById("patronymic").value = "'.$user_field['patronymic'].'";
									document.getElementById("telephone").value = "'.$user_field['telephone'].'";
									document.getElementById("email").value = "'.$user_field['email'].'";
									document.getElementById("passport_series").value = "'.$user_field['passport_series'].'";
									document.getElementById("passport_number").value = "'.$user_field['passport_number'].'";
									document.getElementById("passport_who_issue").value = "'.$user_field['passport_who_issue'].'";
									document.getElementById("date_issue").value = "'.$user_field['date_issue'].'";
									clearTimeout(cycle_search);
									$("#read_request").load("../config/read_requests.php", "user_number='.$user_field['id'].'");
									$("#search_resultat").load("../load/dummy.txt");
									setTimeout($(\'#search_resultat\').load(\'../load/dummy.txt\'), 100);
								}
						</script>';
				
				if ($n == 1)
					{
						echo '	<div 
									id = "goto_count_user_'.$n.'"
									style = "cursor: pointer; color: red; background: #eee;"
									onmouseover = "this.style.color = \'red\'; this.style.background = \'#eee\'; select_found = \''.$n.'\';"
									onmouseout = "this.style.color = \'#999\'; this.style.background = \'none\';"
									onclick = "load_user_'.$user_field['id'].'()">
									'.$user_field['surname'].' '.$user_field['name'].' '.$user_field['patronymic'].' '.$user_field['telephone'].'
								</div>';
					}
				else
					{
						echo '	<div 
									id = "goto_count_user_'.$n.'"
									style = "cursor: pointer; color: #999; background: none;"
									onmouseover = "get_count_children(); this.style.color = \'red\'; this.style.background = \'#eee\'; select_found = \''.$n.'\';"
									onmouseout = "this.style.color = \'#999\'; this.style.background = \'none\';"
									onclick = "load_user_'.$user_field['id'].'()">
									'.$user_field['surname'].' '.$user_field['name'].' '.$user_field['patronymic'].' '.$user_field['telephone'].'
								</div>';
					}
			}
	}
	
echo '<script>document.getElementById("count_children").value = "'.$n.'";</script>';
		
?>