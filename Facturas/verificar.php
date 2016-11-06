<?php

session_start();


	include('conexion.php');
	$MY_DB_PW = getConexion($_POST['conexion']);
	if(isset($_POST['user'])&& !empty($_POST['user'])&&
		isset($_POST['pw']) && !empty($_POST['pw'])
	){


		$con = mysql_connect($MY_HOST, $MY_DB_USER, $pw) or die("Ocurrio un problema con el servidor");
		mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos");

		$sel = mysql_query("select user, pw from usuarios where user = '$_POST[user]'", $con)
		or die('El usuario no existe' . mysql_error());

		$session = mysql_fetch_array($sel);

		if($_POST['pw'] == $session['pw']){
			$_SESSION['username'] = $_POST['user'];
			header('Location: listadousuarios.php');
				echo "Bienvenido";
		}else{
				echo "Ocurrio un error al iniciar sesión";
		}



	}else{
		echo "Debes llenar todos los campos";
	}





 ?>
