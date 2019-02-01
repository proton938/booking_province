
<?php

if (isset($_REQUEST['login'])) { $login = $_REQUEST['login']; }
if (isset($_REQUEST['password'])) { $password = $_REQUEST['password']; }


require_once '../../base/connection_base.php';

$admin_bufer =  $db->query('SELECT * FROM admin');
$read_admin = $admin_bufer->fetchAll();

$verify = 0;

foreach($read_admin as $admin_field)
	{
		if ($admin_field['name_admin'] == $login && $admin_field['password'] == $password)
			{
				$verify = 1;
			}
	}
	
if ($verify == 1)
	{
		echo '	<script>
					$("#initial_load").load("../config/read_base_for_admin.php", "login='.$login.'");
					function load_ches()
						{
							$("#initial_load").load("../config/chess.php", "login='.$login.'&password='.$password.'");
						}
				</script>
				';
	}
else
	{
		echo '<center><a style = "color: red; font-size: 20px; font-family: pragmatica;">Не верный логин или пароль !</a></center>';
	}

?>