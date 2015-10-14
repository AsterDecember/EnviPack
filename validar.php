
<?php
	require("conexion.php");
	session_start();
	$username=$_POST['usuario'];
	$pass=$_POST['pass'];
	$sql=mysql_query("SELECT * FROM usuario WHERE mail='$username'");
	if($f=mysql_fetch_array($sql)){
		if($pass==$f['pass']){
			$_SESSION['nombre'] = $f['mail']; 
			$_SESSION['apellido'] = $f['apellido']; 
			$_SESSION['correo'] = $f['correo'];
			$nom=$_SESSION['nombre'];
			echo '<script>alert("Bienvenido   '.$nom.'")</script> ';
			echo "<script>location.href='perfil.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
			echo "<script>location.href='login.php'</script>";
		}
	}else{
		echo '<script>alert("Este ususario no existe por favor registrese para iniciar sesión")</script> ';
		echo "<script>location.href='login.php'</script>";	
	}
?>