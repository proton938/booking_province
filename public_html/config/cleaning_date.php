<?php

if (isset($_REQUEST['id_primary'])) { $id_primary = $_REQUEST['id_primary'];}  									// считываем первичный ключ
if (isset($_REQUEST['number_guest_room'])) { $number_guest_room = $_REQUEST['number_guest_room'];}  			// считываем номер поля number_

echo $id_primary.'<br>';
echo $number_guest_room;

require_once '../../base/connection_base.php';

$db->query('UPDATE numbers SET '.$number_guest_room.' = "" WHERE id = "'.$id_primary.'"');				// очищаем забронированное поле	

$user_number = preg_split('/_/', $number_guest_room);
$user_number = $user_number[1];
$db->query('UPDATE numbers SET user_'.$user_number.' = "" WHERE id = "'.$id_primary.'"');				// очищаем забронированное поле		