<?php 

	session_start();

	if(isset($_SESSION['username'])){
		echo "Bienvenido, que gusto verte";
		echo "<br><a href=destruir.php> Cerrar Sesion </a>";
	} else{
		echo "Para ver esta página, Regístrate e inicia sesión";
	}






 ?>