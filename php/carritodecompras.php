<?php
	session_start();
	include '../conexion.php';
	if (isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			for($i=0;$i<count($arreglo);$i++){
				if($arreglo[$i]['id']==$_GET['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro==true){
				$arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
				$_SESSION['carrito']=$arreglo;
			}else{
				$nombre="";
				$precio=0;
				$imagen="";
				$re=mysql_query("select * from productos where id=".$_GET['id']);
				while ($f=mysql_fetch_array($re)){
					$nombre=$f['nombre'];
					$precio=$f['precio'];
					$imagen=$f['imagen'];
				}
				$newItem=array('id'=>$_GET['id'],
								  'nombre'=>$nombre,
								  'precio'=>$precio,
								  'imagen'=>$imagen,
								  'cantidad'=>1);
				array_push($arreglo, $newItem);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}
			$arreglo[]=array('id'=>$_GET['id'],
							  'nombre'=>$nombre,
							  'precio'=>$precio,
							  'imagen'=>$imagen,
							  'cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Quin Clothes</title>
	<meta charset="utf-8">
	<!-- FAV ICON -->
	<link rel="icon" type="image/gif" href="../img/icon-180x180.png"/>
	<!-- DESCRIPCIÓN DE1 CONTENIDO -->
	<meta name="description" content="Dress to Reign. Indumentaria Argentina de diseño.">
	<meta name="keywords" content="Moda, Diseño, Disenio, Drag queen, remeras">
	<meta name="author" content="Nicolas Webmaster: Daniela">
	<!-- HOJAS DE ESTILOS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!-- FUENTE DE GOOGLE -->

	<!-- VIEWPORT-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
</head>
<body>
		<div class="container-fluid">
		<div class="row sesion">
			<div class="col-xs-12 col-sm-12 col-md-12  ">
				<!--<div class="nav navbar-nav navbar-right">-->
				<div class="pull-right">
					<ul class="nav navbar-nav">
						<li><a href="#">Iniciar sesión</a></li>
						<li><a href="#">Crear cuenta</a></li>
						<li>
							<form>
								<div class="input-group input-group-sm">
							      <input type="text" class="form-control" placeholder="Buscar producto">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search busqueda"></span></button>
							      </span>
					    		</div><!-- /input-group -->
					    	</form>
					    </li>
			    	</ul>
			    </div><!-- fin nav-->
			</div><!-- fin col12-->
		</div><!-- fin row.fluid-->
		<header class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<img src="../img/logo1.png" title="Qüin Clothes" alt="logo">
			</div><!-- fin col 6-->
			<div class="col-xs-6 col-sm-6 col-md-6 carrito">

					<p>Contacto: <i>quinclothes@gmail.com</i></p>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 offset-md-9">
							<div class="input-group input-group-md ">
								<input type="text" class="form-control hover" value="0 x $0" disabled="disabled">
									<span class="input-group-btn">
										<a href="#"><img src="../img/cart-icon.png"></a>
									</span>
							</div><!-- fin input group-->
						</div>				
			</div><!-- fin col 6-->	
		</header><!-- fin row-->
				<nav class="row sticky" >
			<div class="col-xs-12 col-sm-12 col-md-12 nav-personal">
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
			    <a class="navbar-brand " href="#" alt="Home"title="Logo Quin Arg Indumentaria"><img src="../img/sticky-logo.png" class="img-responsive" ></a>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Inicio</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Drag Queen</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Qüin</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Divas</a></li>
			          </ul>
			        </li>
			        <li><a href="#">Tabla de talles</a></li>
			        <li><a href="#">Contacto</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			</div><!-- fin columna-->
		</nav><!-- fin nav-->
		<div class="row carritodecompras">	
			<?php
				$total=0;
				if(isset($_SESSION['carrito'])){
					$datos=$_SESSION['carrito'];
					$total=0;
					for($i=0;$i<count($datos);$i++){
			?>
					<div class="compra">

						<img src="../img/Muestras/<?php echo $datos[$i]['imagen'];?>" width="350" height="350"><br>
						<span><?php echo $datos[$i]['nombre']?></span><br>
						<span>Precio unitario: <?php echo $datos[$i]['precio']?></span><br>
						<span>Cantidad 
							<input type="text" value="<?php echo $datos[$i]['cantidad'];?>"
							data-precio="<?php echo $datos[$i]['precio'];?>"
							data-id="<?php echo $datos[$i]['id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal: <?php $sub = $datos[$i]['precio']*$datos[$i]['cantidad']; echo $sub ?> </span>

					</div>
				<?php
					$total=$sub+$total;
					}
				}else{
					echo '<h2>El carrito de compras está vacío</h2>';
				}
				echo '<h2 id="total">Total: '.$total.'</h2>';
				if($total!=0){
					echo'<a href="compras/compras.php">Finalizar compra</a>';
				}
				
			?>
			
			<a href="../index.php">Seguir comprando</a>
			







		</div><!-- fin class row carrito-->
	</div><!-- fin .container-fluid-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
<!-- Script para input cantidad -->
	<script type="text/javascript" src="../js/scripts.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</body>
</html>