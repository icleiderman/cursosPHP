<?php
	
//includes
include("conexion.php");  
session_start();

//init var
$page ="login.php";
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
	$user = $_POST['user'];
	$pwd = $_POST['pwd']; 

	//conexion con manejador de base de datos
	$con = mysql_connect($MY_HOST, $MY_DB_USER, $MY_DB_PW) or die("Ocurrio un problema con el manejador de base de datos");

	//conexion con base de datos
	mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos $MY_DB_NAME");

	// sql consulta
	$sel = mysql_query("SELECT user FROM usuarios WHERE user = '$user' and pwd = '$pwd'", $con)or die("Problemas al consultar los $sqlTabla <br>Error:". mysql_error());
  $count = mysql_num_rows($sel);
      
      if($count == 1) {
        $_SESSION['login_user'] = $user;         
        $page ="main.php";
      }else {
         $error = "Usuario invalido, favor de intentar nuevamente";
      }
   }
?>
<form action='<?=$page?>' method='post' name='frm'>
		<input type="hidden" name="conexion" id="conexion" value="<?=$_POST['conexion']?>">
		<input type="hidden" name="error" id="error" value="<?=$error?>">
</form>
<!-- js redirect-->
<script type="text/javascript">
    document.frm.submit();
</script>
