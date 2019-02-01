

<?php
if (isset($_REQUEST['login'])) { $login = $_REQUEST['login']; }

if ($login == 'admin')
	{
		echo 'Выводим панель старшего админа';
	}
	
if ($login == 'operator_1')
	{
		require_once 'operator_1.php';
	}
	
if ($login == 'operator_2')
	{
		echo 'Выводим панель второго оператора';
	}
	
if ($login == 'operator_3')
	{
		echo 'Выводим панель третьего оператора';
	}

?>