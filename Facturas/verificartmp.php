<?php

session_start();


	include('conexion.php');



		$con = mysql_connect($host, $user, $pw) or die("Ocurrio un problema con el servidor");

		mysql_select_db($db, $con) or die ("Ocurrió un error al intentar conectarse con base de datos");

		$sel = mysql_query("select user, pw from usuarios where user = 'Jose'", $con);
		

		$session = mysql_fetch_array($sel);


				echo "Bienvenido ";











 ?>