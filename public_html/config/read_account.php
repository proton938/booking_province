 
<?php

if (isset($_REQUEST['tel_or_mail'])) {$tel_or_mail = $_REQUEST['tel_or_mail'];}
if (isset($_REQUEST['my_password'])) {$my_password = $_REQUEST['my_password'];}

require_once '../../base/connection_base.php';

$user_bufer = $db->query('SELECT * FROM user');     // обращаемся к таблице пользователей
$read_user = $user_bufer->fetchAll();

foreach ($read_user as $user_field)
	{
		if ($user_field['telephone'] == $tel_or_mail or $user_field['email'] == $tel_or_mail)			// есть ли уже этот пользователь в списке ...
			{
				echo '	<div style = "width: 150px; padding: 0px 0px 5px 0px; z-index: 3; background: #CAA79C; border-radius: 3px; padding: 10px 0px 10px 0px; ">
							<input type = "hidden" id = "id_accaunt" value = "'.$user_field['id'].'"  />
							<a style = "color: #fff; font-size: 15px; font-family: pragmatica;" >
							'.$user_field['surname'].'<br>
							'.$user_field['name'].'<br>
							'.$user_field['patronymic'].'
							</a><br><br>
							<a style = "color: #fff; font-size: 15px; font-family: pragmatica; cursor: pointer; border-bottom: solid 1px #fff; border-radius: 2px; padding: 1px 5px 1px 5px; ">мои заявки</a>
							<div style = "border: 10px solid transparent; width: 0px; margin-top: 2px; border-top: 10px solid #fff;"></div>
						</div>
						<script>
							document.getElementById("input_account").style.display = "none";
							document.getElementById("output_account").style.display = "block";
							document.getElementById("reg_button").style.display = "none";
							document.getElementById("reg_button_noactive").style.display = "block";
						</script>'; 
			}
	}

?>

