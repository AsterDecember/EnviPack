<!DOCTYPE html>
<html lang="es">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
		<title>Document</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/index.css">
	</head>

	<body>
<!-- ******************************************Here starts the header**************************************** -->
		<header>
			<nav>
				
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
		</header>

		
<!-- **************************************This is the main part of the page******************************-->

		
	<div class="container" id="main">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
				    Ingresa informacion a buscar...
				</div>
			</div>

			<form action="index_met.php" method="POST">
			
			
			
			
			
			
			
			
			
			
				<div class="media">
					<div class="media-left">
						
				    		<img class="media-object" src="img/pin102.png" alt="...">
						
					</div>
					<div class="media-body">
				    	<div class="row">
							<div class="col-lg-6">
						    
						    
						    
						    
						    
						    
						    
						    	<SELECT NAME="origen" class="form-control" > 
						<?php
						 require("conexion.php");
				    			$estados=mysql_query("select * from estado ");
					
					
				          		while($row=mysql_fetch_array($estados)){
        					?>  
							<OPTION VALUE="<?php  echo $row['id_estado'];?>"><?php  echo $row['estado'];?></OPTION>
							<?php
								}
							?>
							</SELECT><br><br>
						    	
						    	
						    	
						   
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-6">
						    
						    	<SELECT NAME="destino" class="form-control" > 
						<?php
						
				    			$estados=mysql_query("select * from estado ");
					
					
				          		while($row=mysql_fetch_array($estados)){
        					?>  
							<OPTION VALUE="<?php  echo $row['id_estado'];?>"><?php  echo $row['estado'];?></OPTION>
							<?php
								}
							?>
							</SELECT><br><br>
						      
							</div><!-- /.col-lg-6 -->
						</div><!-- /.row -->
						<div class="btn-group" role="group">
							<input type="submit" class="btn btn-default" value="Buscar">
						</div>
				  	</div>
				</div>
				
			</form>

						    	
				
			<br>
			<br>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="table-responsive panel-heading"><h4 class="media-heading">Catalogo</h4></div>
			  <table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Emisor</th>
			        <th>Envio</th>
			        <th>Receptor</th>
			      </tr>
			    </thead>

<?php
	include "conexion.php";

	//Se llaman a las variables de index.php
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	
	//Se buscan sucursales en la estado de origen
	$con_origen = mysql_query("select id_sucursal FROM sucursal WHERE estado = '$origen'");
	$v_origen = mysql_fetch_array($con_origen);
	
	//Se buscan sucursales en el estado de destino
	$con_destino = mysql_query("select id_sucursal FROM sucursal WHERE estado = '$destino'");
	$v_destino = mysql_fetch_array($con_destino);
	
	//se asignan a variables los resultados, falta wl while
	$mov_origen = $v_origen[id_sucursal];
	$mov_destino = $v_destino[id_sucursal];
	
	//Se buscan movientos con la busqueda preestablecida
	$con_movimiento = mysql_query("select id_registro, fecha FROM movimiento, sucursal WHERE emi_id_sucursal = '$mov_origen' AND rec_id_sucursal = '$mov_destino'");
	$v_movimiento = mysql_fetch_array($con_movimiento);	

	$er = $v_movimiento[id_registro];
	
	
	
	//esta es la fecha de envio
	$fec_env = $v_movimiento[fecha];
	
	//De la busqueda de movimientos se valian quienes son los actores principales
	$mov_usu_ep = mysql_query("SELECT correo_usu FROM user_mov WHERE id_registro_mov='$er' and tipo='EP'");
	$mov_usu_rp = mysql_query("SELECT correo_usu FROM user_mov WHERE id_registro_mov='$er' and tipo='RP'");
	
	$v_mov_usu_ep = mysql_fetch_array($mov_usu_ep);
	$v_mov_usu_rp = mysql_fetch_array($mov_usu_rp);
	
	
	
	
	
	//dudk
	$v_mov_usu_ep = $v_mov_usu_ep[correo_usu];
	$v_mov_usu_rp = $v_mov_usu_rp[correo_usu];
	

	$usu_ep = mysql_query("SELECT mail, nombre, apellido, genero, ano, celular FROM usuario WHERE correo = '$v_mov_usu_ep'");
	$usu_rp = mysql_query("SELECT mail, nombre, apellido, genero, ano, celular FROM usuario WHERE correo = '$v_mov_usu_rp'");
	
	$v_usu_ep = mysql_fetch_array($usu_ep);
	$v_usu_rp = mysql_fetch_array($usu_rp);
	
	if (mysql_num_rows($usu_ep)>0){
	
	//Se saca la edad del que envia
	$anio = date('Y');	
	$edad = $v_usu_ep[ano];
	$anio = $anio - $edad;
	
	//Se saca la edad del que recibe
	$anio_rp = date('Y');	
	$edad_rp = $v_usu_rp[ano];
	$anio_rp = $anio_rp - $edad_rp;
	
	//Se adquiere los nombres de los estados
	$nom_est_env = mysql_query("select estado FROM estado WHERE id_estado = '$origen'");
	$nom_est_env = mysql_fetch_array($nom_est_env);
	$nomeste=$nom_est_env[estado];
	
	$nom_est_rec = mysql_query("select estado FROM estado WHERE id_estado = '$destino'");
	$nom_est_rec = mysql_fetch_array($nom_est_rec);
	$nomestr=$nom_est_rec[estado];
	
		
	
?>

			<!-- Start danger zone of media Porfile elements  -->
			    <tbody>
			      <tr>
			        <td class="col-md-4">
			        	<div class="media">
						  <div class="media-left">
						  
						      <img class="media-object" src="img/porfile.png" alt="...">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><?php echo "$v_usu_ep[mail]";?></h4>
						    <h4 class="media-heading"><?php echo "$v_usu_ep[apellido]";?></h4>
    						    <h4 class="media-heading"><?php echo "$v_usu_ep[nombre]";?></h4>
    						    <h4 class="media-heading"><?php echo "$v_usu_ep[celular]";?></h4>
    						    <h4 class="media-heading">Edad: <?php echo "$anio";?>&nbsp;años</h4>
						  </div>
						</div>
			        </td>
			        <td>
			        		     <h4 class="media-heading">Origen: <?php echo "$nomeste";?></h4>
						    <h4 class="media-heading">Destino: <?php echo "$nomestr";?></h4>
						     <h4 class="media-heading">Fecha: <?php echo "$fec_env";?></h4>
			        </td>
			        <td class="col-md-4">
			        	<div class="media">
						  <div class="media-left">
						  
						      <img class="media-object" src="img/porfile.png" alt="...">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><?php echo "$v_usu_rp[mail]";?></h4>
						    <h4 class="media-heading"><?php echo "$v_usu_rp[apellido]";?></h4>
    						    <h4 class="media-heading"><?php echo "$v_usu_rp[nombre]";?></h4>
    						    <h4 class="media-heading"><?php echo "$v_usu_rp[celular]";?></h4>
    						    <h4 class="media-heading">Edad: <?php echo "$anio_rp";?>&nbsp;años</h4>
						  </div>
						</div>
			        </td>
			      </tr>
			      
			     
			     

			
					</div> 
				</div>
			<?php
			}
			else {?>
			
			<!-- Start danger zone of media Porfile elements  -->
						    <tbody>
						      <tr>
						       
						        <td>
						        		     <h4 class="media-heading">No se han encontrado coincidencias</h4>
						        </td>
						        
						      </tr>
						      
						     
						     
			
			
					</div> 
				</div>
				
				<?php
			}?>

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