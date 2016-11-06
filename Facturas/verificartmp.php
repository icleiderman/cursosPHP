<?php

session_start();


	include('conexion.php');
	$MY_DB_PW = getConexion($_POST['conexion']);



		$con = mysql_connect($MY_HOST, $MY_DB_USER, $pw) or die("Ocurrio un problema con el servidor");

		mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos");

		$sel = mysql_query("select user, pw from usuarios where user = 'Jose'", $con);
		

		$session = mysql_fetch_array($sel);


				echo "Bienvenido ";











 ?>