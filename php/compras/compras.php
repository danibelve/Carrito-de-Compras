<?php 
session_start();
include "../../conexion.php";
	$arreglo=$_SESSION['carrito'];
	$numeroventa=0;
	$re=mysql_query("select * from compras order by numerodeventa DESC limit 1") or die(mysql_error());
	while($f=mysql_fetch_array($re)){
		$numeroventa=$f['numerodeventa'];
	}
	if($numeroventa==0){
		$numeroventa=1;
	}else{
		$numeroventa=$numeroventa+1;
	}
	for($i=0; $i<count($arreglo);$i++){
		mysql_query("insert into compras (numerodeventa,nombre,imagen,precio,cantidad,subtotal) values(
			".$numeroventa.",
			'".$arreglo[$i]['nombre']."',
			'".$arreglo[$i]['imagen']."',
			'".$arreglo[$i]['precio']."',
			'".$arreglo[$i]['cantidad']."',
			'".($arreglo[$i]['precio']*$arreglo[$i]['cantidad'])."'
			)")or die(mysql_error());
	}
	unset($_SESSION['carrito']);
	echo("GRACIAS");
?>
