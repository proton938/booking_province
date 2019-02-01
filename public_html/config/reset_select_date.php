<?php 

if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history']; }  			// считываем имя файла оперативной истории
if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house'];}  		// считываем номер дома 

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
	
$date_today = date("H:i:s_d.m.Y");

$f = fopen('../../history/'.$my_history.'.txt', 'w');
fwrite($f, $date_today.";\n");									// Пишем текущую дату и время в файл оперативной истории
fclose($f);

echo   '<script>
			document.getElementById("sum").value = "0";
		</script>';

?>