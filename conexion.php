<?php
	$server="localhost";
	$username="root";
	$password="";
	$db='quin_arg';
	$con=mysql_connect($server,$username,$password)or die ("No se ha podido acceder a la base de datos");
	$sdb=mysql_select_db($db,$con)or die("La base de datos no existe");

?>