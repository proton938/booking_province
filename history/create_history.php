<?php

$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'history.db');

$db->query('CREATE TABLE new (id AUTOINCREMENT)');

?>