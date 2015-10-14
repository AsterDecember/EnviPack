<?php
error_reporting(0);
$link = mysql_connect('localhost', 'gycsocom_hacking', 'Hacking2015')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('gycsocom_hacking') or die('No se pudo seleccionar la base de datos');
?>