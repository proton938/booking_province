<?php 

if (isset($_REQUEST['user_number']))   								 										// если нажимаем клавишу в списке пользователей
	{ 
		$user_number = $_REQUEST['user_number']; 
		
		
		$my_history = $_REQUEST['my_history'];
		
		$file = '../../history/'.$my_history.'.txt';												// открываем файл оперативной истории для чтения	
		$contents = file_get_contents($file); 														// считываем содержимое
		$contents = preg_split('/;/', $contents);													// разбиваем на массив по регулярному выражению ";"

		require_once '../../base/connection_base.php';

		for ($i = 0; $i <= count($contents)-2; $i++)
			{
				$booking = preg_split('/,/', $contents[$i]);
				
				$bufer_numbers = $db->query('SELECT * FROM numbers WHERE id = "'.$booking[0].'"'); 	// обращаемся к таблице прайса номеров
				$read_numbers = $bufer_numbers->fetchAll(); 
				
				foreach ($read_numbers as $number_field)
					{
						$user = $number_field['user_'.$booking[2]];
					}
					
				if ($user == '')
					{		
						$db->query('UPDATE numbers SET number_'.$booking[2].' = ""  WHERE id = "'.$booking[0].'"');
					}
			}
			
		unlink('../../history/'.$my_history.'.txt');

		echo '<script>$("#browser").load("../config/user_history_for_admin.php", "user_number='.$user_number.'");</script>';  // Процедура вывода истории конкретного пользователя			

	}
else																// если нажимаем клавишу в списке домов
	{
		
		$my_history = $_REQUEST['my_history'];
		
		if (isset($_REQUEST['number_house'])) 				// считываем номер дома 
			{ 
				$number_house = $_REQUEST['number_house'];  		

				$file = '../../history/'.$my_history.'.txt';												// открываем файл оперативной истории для чтения	
				$contents = file_get_contents($file); 														// считываем содержимое
				$contents = preg_split('/;/', $contents);													// разбиваем на массив по регулярному выражению ";"
				
				require_once '../../base/connection_base.php';

				for ($i = 0; $i <= count($contents)-2; $i++)
					{
						$booking = preg_split('/,/', $contents[$i]);
						
						$bufer_numbers = $db->query('SELECT * FROM numbers WHERE id = "'.$booking[0].'"'); 	// обращаемся к таблице прайса номеров
						$read_numbers = $bufer_numbers->fetchAll(); 
						
						foreach ($read_numbers as $number_field)
							{
								$user = $number_field['user_'.$booking[2]];
							}
							
						if ($user == '')
							{		
								$db->query('UPDATE numbers SET number_'.$booking[2].' = ""  WHERE id = "'.$booking[0].'"');
							}
					}
					
				unlink('../../history/'.$my_history.'.txt');

				echo '<script>load_house_'.$number_house.'();</script>';
			}
			
	}


?>

	