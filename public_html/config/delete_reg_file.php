<?php

if ($_REQUEST['number']) {$number = $_REQUEST['number'];}
unlink('../../history/reg_'.$number.'.txt');

?>