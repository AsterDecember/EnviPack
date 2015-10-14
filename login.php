<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => 'YOUR ID',
  'app_secret' => 'YOUR SECRET',
  'default_graph_version' => 'v2.4',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email,picture');
		$profile = $profile_request->getGraphNode()->asArray();
		$network = $ret['/me?fields=name']['first_name']['last_name']['email']['picture'];
		$name = $network['email'];
		echo "$name";
		
		$nomo=$profile[first_name];
	$apol=$profile[last_name];
	$malo=$profile[email];
	$ido=$profile[id];
	
	
	require('conexion.php');

	mysql_query("INSERT INTO usuario VALUES ('', '', '', '', '', '', '', '')");
	
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	
	

	
	
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://envipack.gycso.com/login.php', $permissions);
	//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
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
										<a href="index.php" class="btnHeader">Inicio</a>
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

		<center><?php echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>'; ?>
		<br>
		<br>
		<?php echo '<a href="' . $loginUrl . '"><img src="img/face.png" width="100px"></a>'; ?>
		<br>
		<br>
		<br>
		</center>
		

		<div class="container" id="main">

		<form method="POST" action="validar.php">
				
			<div class="panel panel-default">
				<div class="panel-body">
				    Ingresa tu informacion
				</div>
			</div>

			<form method="POST" action="validar.php">
				<div class="media">
					<div class="media-left">
						
				    		<img class="media-object" src="img/porfile.png" alt="...">
						
					</div>
					<div class="media-body">
				    	<div class="row">
				    			<br>
							<div class="col-lg-6">
						    
						    	<input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
						   
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-6">
						    
						    	<input type="password" class="form-control" placeholder="Contrasena" name="pass" required>
						      
							</div><!-- /.col-lg-6 -->
						</div><!-- /.row -->
						<div class="col-md-3 col-md-offset-11" role="group">
							
							<br>
							<input type="submit" value="Entrar" class="btn btn-default">
						</div>
				  	</div>
				</div>
				
			</form>

				  
				
				
			</form>
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