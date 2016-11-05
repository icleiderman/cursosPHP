<?php 


	include('conexion.php');

	$usuario = $_POST[usuario];
	$pwd = $_POST[pw];
	$status = $_POST[status];
echo "$usuario \n";
echo "$pwd \n";
echo "$empty($status)";
	if(isset($usuario) && !empty($usuario) &&
		isset($pwd) && !empty($pwd)
		){

	$con = mysql_connect($host, $user, $pw) or die("Ocurrio un problema al intentar conectarse");
	mysql_select_db($db, $con) or die ("Ocurrió un error al intentar conectarse con base de datos");

	$sel = mysql_query("select user, pw from usuarios where user = '$usuario'", $con);

	$fila = mysql_fetch_array($sel);

	if($fila['user'] == $usuario){
		echo "El usuario ya existe";
	} else{

	mysql_query("insert into usuarios (user, pw, status) values ('$usuario', '$pwd', '$status')", $con);
	echo "se ha registrado $usuario exitosamente como nuevo usuario";

	}

 	}else{
 		echo "Ocurrio un error al registrar al usuario";
 }


 ?>
