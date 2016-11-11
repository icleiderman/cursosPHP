<?php
	
//includes
include("conexion.php");

session_start();
$user_check = $_SESSION['login_user']; 

//conexion con manejador de base de datos
$con = mysql_connect($MY_HOST, $MY_DB_USER, $MY_DB_PW) or die("Ocurrio un problema con el manejador de base de datos");

//conexion con base de datos
mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos $MY_DB_NAME");

// sql consulta
$sel = mysql_query("SELECT user FROM usuarios WHERE user = '$user_check'", $con)or die("Problemas al consultar los $sqlTabla <br>Error:". mysql_error());
$count = mysql_num_rows($sel);

if($count < 1) {
    header("location:login.php");
}
   
?>