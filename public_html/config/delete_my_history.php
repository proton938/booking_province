<?php 

if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history']; }  			// считываем имя файла оперативной истории

$file = '../../history/'.$my_history.'.txt';												// открываем файл оперативной истории для чтения	
$contents = file_get_contents($file); 														// считываем содержимое
$contents = preg_split('/;/', $contents);													// разбиваем на массив по регулярному выражению ";"


require_once '../../base/connection_base.php';


for ($i = 1; $i <= count($contents)-2; $i++)
	{
		$booking = preg_split('/,/', $contents[$i]);
		
		$bufer_numbers = $db->query('SELECT * FROM numbers WHERE id = "'.$booking[0].'"');
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

unlink('../../history/alert.txt');	
unlink('../../history/'.$my_history.'.txt');

?>

	