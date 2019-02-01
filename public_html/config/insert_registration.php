<link href = "../css/styles.css" rel = "stylesheet"  type = "text/css" media = "all">
<?php
$surname = $_POST['surname'];                       				// считываем фамилию
$name = $_POST['name'];												// считываем имя
$patronymic = $_POST['patronymic'];									// считываем отчество
$telephone = $_POST['telephone'];									// считываем телефон

$autor_code = $_POST['autor_code'];									// считываем код авторизации телефона для проверки
$password = $_POST['new_password'];											// считываем пароль
$again_password = $_POST['again_new_password'];								// считываем подтверждение пароля
$email = $_POST['email'];											// считываем email

$verify_user = 0;

$file = '../../history/reg_'.$telephone.'.txt';						// открываем файл с кодом авторизации	
$contents = file_get_contents($file); 								// считываем содержимое

if ($contents == $autor_code) 
	{
		$password = $_POST['new_password'];											// считываем пароль
		$again_password = $_POST['again_new_password'];								// считываем подтверждение пароля
		
		if ($password == $again_password)
			{
				require_once '../../base/connection_base.php';

				$user_bufer = $db->query('SELECT * FROM user');     // обращаемся к таблице пользователей для выяснения - есть ли такой номер телефона
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
						$db->query('INSERT INTO user (	surname, 
														name, 
														patronymic, 
														telephone, 
														password, 
														email) 
																VALUES (
																		"'.$surname.'", 
																		"'.$name.'", 
																		"'.$patronymic.'", 
																		"'.$telephone.'", 
																		"'.$password.'", 
																		"'.$email.'")');
						$user_number = count($read_user) + 1;																// запоминаем идентификационный номер пользователя
					}
				if ($switch == 1)											// ... если есть обновляем данные - добавляем
					{
						$db->query('UPDATE user SET surname = "'.$surname.'" WHERE id = "'.$user_number.'"');
						$db->query('UPDATE user SET name = "'.$name.'" WHERE id = "'.$user_number.'"');
						$db->query('UPDATE user SET patronymic = "'.$patronymic.'" WHERE id = "'.$user_number.'"');
						$db->query('UPDATE user SET telephone = "'.$telephone.'" WHERE id = "'.$user_number.'"');
						$db->query('UPDATE user SET password = "'.$password.'" WHERE id = "'.$user_number.'"');
						$db->query('UPDATE user SET email = "'.$email.'" WHERE id = "'.$user_number.'"'); 
					}
				
				echo 
					'	<center>
							<a style = "font-size: 30px; font-family: pragmatica; color: rgba(255, 127, 80, 1);">
								ВЫ УСПЕШНО ЗАРЕГИСТРИРОВАНЫ!
							</a>
						</center>';
			}
		else
			{
				echo '	<center>
							<a style = "font-size: 30px; font-family: pragmatica; color: rgba(255, 127, 80, 1);">
								НЕ СОВПАДАЕТ ПАРОЛЬ!
							</a>
						</center>';
			}
	}
else
	{
		echo '	<center>
					<a style = "font-size: 30px; font-family: pragmatica; color: rgba(255, 127, 80, 1);">
						НЕ ВЕРНЫЙ КОД!
					</a>
				</center>';
	}

?>