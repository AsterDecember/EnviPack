<?php
session_start();
if (!$_SESSION['nombre'])
{
  echo "<script>location.href='index.php'</script>";
}  else

?>
<!DOCTYPE html>
	<header>
		<?php session_start();?>
		
<html lang="es">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
		<title>Document</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/index.css">
	</head>
<script src="http://maps.google.com/maps/api/js?sensor=false&callback=iniciar">
</script>


	<body>
<!-- ******************************************Here starts the header**************************************** -->
		<header>
		<?php 
		if (!$_SESSION['nombre'])
		{
		?>	<nav>
				<div class="container-fluid" id="darkestLine"></div>
				<div class="jumbotron" id="jumbo">
					<div class="container">
						<div class="row">
							<div class=" col-sm-8 col-md-4">
								<img src="img/logo.png" alt="Logo" class="img-rounded img-responsive" id="imgPerfil">
							</div>
							<div class="col-xs-12 col-md-8" id="titulo">
								<h1>EnviPack</h1>
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="index.php" class="btnHeader">Inicio</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="login.php" class="btnHeader">Registrate</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="#PublicarViaje" class="btnHeader">Publicar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<?} else {?>
			
			
			
			<nav>
				<div class="container-fluid" id="darkestLine"></div>
				<div class="jumbotron" id="jumbo">
					<div class="container">
						<div class="row">
							<div class=" col-sm-8 col-md-4">
								<img src="img/logo.png" alt="Logo" class="img-rounded img-responsive" id="imgPerfil">
							</div>
							<div class="col-xs-12 col-md-8" id="titulo">
								<h1>EnviPack</h1>
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="index.php" class="btnHeader">Inicio</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="login.php" class="btnHeader">Publicar</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="cerrarsesion.php" class="btnHeader">Salir</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<?}?>
		</header>

		
<!-- **************************************This is the main part of the page******************************-->
		<table style="width:100%">
		<tr>
		<td><center><img src="img/foto.png">;</center></td>
<?php
	include "conexion.php";

	
	

	//Se adquire la id de face
	$id = $_SESSION['correo'];
	
	
	//Se busca toda la informacion del usuario con el id
	$id_fb = mysql_query("select * FROM usuario WHERE correo = $id");
	$id_fb = mysql_fetch_array($id_fb);
	
	//Los valoresadquiridos se le asignan a variables locales
	$nombre = $id_fb[mail];
	$apellido = $id_fb[apellido];
	$correo = $id_fb[nombre];
	$genero = $id_fb[genero];
	$celular = $id_fb[celular];
	
	
	//Se saca la edad
	$anio = date('Y');	
	$edad = $id_fb[ano];
	$anio = $anio - $edad;
	
	echo "<td><h3>";	
	echo "Nombre:&nbsp;&nbsp; $nombre <br>";
	echo "Apellido:&nbsp;&nbsp; $apellido<br>";
	echo "Correo:&nbsp;&nbsp;&nbsp;&nbsp; $correo<br>";
	echo "Genero:&nbsp;&nbsp;&nbsp; $genero<br>";
	echo "Celular:&nbsp;&nbsp;&nbsp; $celular<br>";
	echo "Edad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $anio A&ntilde;os<br>";
	echo "</h3></td></center></table>";
	

?>

<!-- **********************************************Here starts the footer*********************************************** -->

	<footer class="footer">
		<div class="container">

			<div class="row">

				<div class="col-xs-4 col-sm-6 col-md-6 col-lg-6 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
					<p id="pContacto">Contacto</p>
				</div>

			</div>

        	<div class="row">
        		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contacto">
	                <p>Calle: Principal, Numero: Mayor, Colonia: Excelsa, Numero: 55225522</p>
	                
	        	</div>
        	</div>
      	</div>
    </footer>

</body>
</html>