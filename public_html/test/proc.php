<meta charset = "utf-8">



<form method = "GET" enctype = "multipart/form-data" action = "proc.php" target = "">

	
		<input type = "text" id = "name" name = "name"> 
		
		<input type = "submit" value = "Утвердить заявку" >


</form>

<?php

if (isset($_GET['name']))
	{ 
		echo $_GET['name'];
	}
	
 
//Создает XML-строку и XML-документ при помощи DOM 
$dom = new DomDocument('1.0'); 
 
//добавление корня - <books> 
$books = $dom->appendChild($dom->createElement('books')); 
 
//добавление элемента <book> в <books> 
$book = $books->appendChild($dom->createElement('book')); 
 
// добавление элемента <title> в <book> 
$title = $book->appendChild($dom->createElement('title')); 
 
// добавление элемента текстового узла <title> в <title> 
$title->appendChild( 
                $dom->createTextNode('tretreretregfdsgtrewtre')); 
				
//добавление корня - <merchant> 
$merchant = $book->appendChild($dom->createElement('merchant')); 
// добавление элемента <title> в <book> 
$title = $merchant->appendChild($dom->createElement('title'));

$title->appendChild( 
                $dom->createTextNode('tretreretregfdsgtrewtre')); 
 
//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
                           // domDocument в значение true 
// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('test1.xml'); // сохранение файла 
?>