<?php

$file = fopen('../../requests/counter.txt', 'r');
$contents = fread($file, filesize('../../requests/counter.txt'));
fclose($file);

$contents++;

echo $contents;

//Создает XML-строку и XML-документ при помощи DOM 
$dom = new DomDocument('1.0', 'UTF-8');
		
//добавление корня - <row> 
$row = $dom->appendChild($dom->createElement('row'));


//добавление элемента <field> в <row> 
$field = $row->appendChild($dom->createElement('field')); 
//добавление аттрибута name для <field>
$field->setAttribute("name", "SITENUMBER");
// добавление элемента текстового узла <field> в <field> 
$field->appendChild($dom->createTextNode('3265436543654365'));

//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
						   // domDocument в значение true 
// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('../../requests/import/order_'.$contents.'.xml'); // сохранение файла 

$file = fopen('../../requests/counter.txt', 'w');
fwrite($file, $contents);
fclose($file);

/*

$homepage = file_get_contents('http://province74.ru/#ng_holiday-carousel/');

echo $homepage;

?>