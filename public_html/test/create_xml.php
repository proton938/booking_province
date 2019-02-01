<?php
 
//Создает XML-строку и XML-документ при помощи DOM 
$dom = new DomDocument('1.0');

 
 
//добавление корня - <table> 
$table = $dom->appendChild($dom->createElement('table')); 
 
//добавление элемента <field> в <table> 
$field = $table->appendChild($dom->createElement('field')); 
   
// добавление элемента текстового узла <field> в <field> 
$field->appendChild($dom->createTextNode('tretreretregfdsgtrewtre')); 

$field->setAttribute("atr1", "1");
				

 
//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
                           // domDocument в значение true 
// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('new.xml'); // сохранение файла 

?>