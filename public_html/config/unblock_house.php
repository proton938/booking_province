<?php

if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house'];}  	// считываем номер дома 

echo $number_house;

require_once '../../base/connection_base.php';  

$rate_bufer =  $db->query('SELECT * FROM rate');			// обращаемся к таблице цен
$read_rate = $rate_bufer->fetchAll();

foreach ($read_rate as $rate_field)
	{
		if ($rate_field['number_house'] == $number_house)
			{
				$db->query('UPDATE rate SET block = "" WHERE id = "'.$rate_field['id'].'"');  				// бронируем - вводим ноль в соответствующее поле
			}
	}

?>