<!DOCTYPE html>
<html lang="es">
<head>
	<title>Quin Clothes</title>
	<meta charset="utf-8">
	<!-- FAV ICON -->
	<link rel="icon" type="image/gif" href="../img/icon-180x180.png"/>
	<!-- DESCRIPCIÓN DE CONTENIDO -->
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

					<<p>Contacto: <i>quinclothes@gmail.com</i></p>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-lg-5">
							<div class="input-group input-group-md ">
								<input type="text" class="form-control hover" value="0 x $0" disabled="disabled">
									<span class="input-group-btn">
										<a href="php/carritodecompras.php"><img src="../img/cart-icon.png"></a>
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
		<div class="row productos">	
		  
		<?php
			include '../conexion.php';
			$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());
			while ($f=mysql_fetch_array($re)){
			?>
		<div class="col-sm-6 col-md-4">
		  	<div class="thumbnail" id="Detalles">
		    	<img src="../img/muestras/<?php echo $f['imagen'];?>" alt="<?php echo $f['nombre'];?>-<?php echo $f['categoria'];?>" title="<?php echo $f['nombre'];?> - <?php echo $f['categoria'];?>">
		     		<div class="caption text-center">
		        		<h3><?php echo $f['nombre'];?></h3>
		        		<span class="categoria"><?php echo $f['categoria'];?></span><br>
		        		
		      		</div> <!-- fin class caption-->
		   </div><!-- fin class thumb-->
		 </div><!-- fin class col-->
		 <div class="col-sm-6 col-md-8 descripcion">
		 	<p>
				<h2><?php echo $f['nombre'];?></h2>
		        		<span class="categoria"><?php echo $f['categoria'];?></span><br>
				Material: Algodon 100% Peinado<br>
				<span class="precio">$<?php echo $f['precio'];?></span>			
			</p>
		 		<p><a href="<?php echo $f['url'];?>" class="btn btn-primary" role="button">¡Comprar YA!</a><a href="carritodecompras.php?id=<?php echo $f['id'];?>" class="btn btn-default" role="button">Añadir al carrito</a></p>
		 </div>
		   <?php
			}
		   ?>

		</div><!-- fin class row productos-->
	</div><!-- fin .container-fluid-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
</body>
</html>