<!DOCTYPE html>
<html>
<head>
	<title>Registro de <?=$_POST['titulo']?></title>
		<script type="text/javascript">
			function cancelar() {
				console.log("inicio funcion");
				
				var formulario = document.forms['frmRegistrar'];
				formulario.action = "listado.php";				
				console.log(formulario);
				formulario.submit();

				console.log("fin funcion");
			}
		</script>
</head>
<body>
<?php	
	include('conexion.php');
	getConexion($_POST['conexion']);
	
	//post params
	$sqlElementos =$_POST['sqlElementos'];
	$sqlTabla =$_POST['sqlTabla'];
	$sqlKey =$_POST['sqlKey'];
	$sqlKeyValue =$_POST['sqlKeyValue'];
	
	// tratamiento de parametros
	$arrayElementos = explode(",", $sqlElementos); // convierte en array

	if( strlen ($sqlKeyValue) >0 ){
		//conexion con manejador de base de datos
		$con = mysql_connect($MY_HOST, $MY_DB_USER, $MY_DB_PW) or die("Ocurrio un problema con el manejador de base de datos");
		
		//conexion con base de datos
		mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos $MY_DB_NAME");
		
		// sql consulta
		$sel = mysql_query("select $sqlElementos from $sqlTabla where $sqlKey='$sqlKeyValue'", $con)or die("Problemas al consultar los $sqlTabla <br>Error:". mysql_error());
		$fila = mysql_fetch_array($sel, MYSQL_NUM);
		
	}
	
?>

<h1>Registro de <?=$_POST['titulo']?>.</h1>

	<form action="insertar.php" id="frmRegistrar" method="POST">
		<input type="hidden" name="titulo" id="titulo" value="<?=$_POST['titulo']?>">
		<input type="hidden" name="sqlElementos" id="sqlElementos" value="<?=$sqlElementos?>">
		<input type="hidden" name="sqlTabla" id="sqlTabla" value="<?=$sqlTabla?>">
		<input type="hidden" name="sqlKey" id="sqlKey" value="<?=$sqlKey?>">
		<input type="hidden" name="sqlKeyValue" id="sqlKeyValue" value="<?=$sqlKeyValue?>">
		<input type="submit" value="Crear <?=$sqlKey?>">
		<input type="button" onclick="cancelar()" value="Cancelar">
		
		<table border ="1">			
		<? for($i=0;$i<count($arrayElementos);$i++){?>
			<tr>
				<td><?=$arrayElementos[$i]?>:</td>
				<td><input type="<?=( strcmp( "pwd", trim($arrayElementos[$i]) ) == 0 ?"password":"text")?>" name="<?=$arrayElementos[$i]?>" id="<?=$arrayElementos[$i]?>" value="<?=$fila[$i]?>" ></td>
			</tr>
		<?}?>
		</table>	

		
	</form>
</body>
</html>