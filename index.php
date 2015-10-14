<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Envipack</title>
		 <link rel="icon" type="image/png" href="img/logop.png"/>  

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
										<a href="#Inicio" class="btnHeader">Inicio</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="http://envipack.gycso.com/login.php" class="btnHeader">Login</a>
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
						    
						    
						    
						    
						    
						    
						    Origen:
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
						    Destino:
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

		</div>
	</div>



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