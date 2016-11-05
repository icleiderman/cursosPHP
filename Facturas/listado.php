<!DOCTYPE html>
<html>
<head>
	<title><?=$_POST['titulo']?> registrados</title>
	<script type="text/javascript">
			function modificar(sqlKeyValue) {
				console.log("inicio funcion");
				
				var formulario = document.forms['frmListado'];
				document.getElementById("sqlKeyValue").value = sqlKeyValue;
				
				console.log(formulario);
				formulario.submit();

				console.log("fin funcion");
			}
		</script>
	
</head>
<body>
<?php
	//includes
	include('conexion.php');
	
	//post params
	$sqlElementos =$_POST['sqlElementos'];
	$sqlTabla =$_POST['sqlTabla'];
	$sqlKey =$_POST['sqlKey'];
	
	//init vars
	$keyIndex = "";
	$sqlKeyValue = "";
	
	
	// tratamiento de parametros
	$sqlElementos = str_replace("|",",",$sqlElementos); //reemplaza
	$arrayElementos = explode(",", $sqlElementos);// convierte en array
	

	//conexion con manejador de base de datos
	$con = mysql_connect($host, $user, $pw) or die("Ocurrio un problema con el manejador de base de datos");
	
	//conexion con base de datos
	mysql_select_db($db, $con) or die ("Ocurrió un error al intentar conectarse con base de datos $db");
	
	// sql consulta
	$sel = mysql_query("select $sqlElementos from $sqlTabla", $con)or die("Problemas al consultar los $sqlTabla <br>Error:". mysql_error());


?>
	<h2>Administración de <?=$_POST['titulo']?></h2>
	
	<form action="registrar.php" method="post" id="frmListado" >
		<input type="hidden" name="titulo" id="titulo" value="<?=$_POST['titulo']?>">
		<input type="hidden" name="sqlElementos" id="sqlElementos" value="<?=$sqlElementos?>">
		<input type="hidden" name="sqlTabla" id="sqlTabla" value="<?=$sqlTabla?>">
		<input type="hidden" name="sqlKey" id="sqlKey" value="<?=$sqlKey?>">
		<input type="hidden" name="sqlKeyValue" id="sqlKeyValue" value="">
		<input type="button" onclick="modificar('')" value="Crear <?=$sqlKey?>">	
		<input type="button" onclick="document.location='index.php'" value="Cancelar">

		<table border = "1">
			<tr><!-- Encabezado-->
				<? for($i=0;$i<count($arrayElementos);$i++){ 
					if( strcmp( trim($sqlKey), trim($arrayElementos[$i]) ) == 0 ){
						$keyIndex = $i;
					}
				?>
					<th><?=$arrayElementos[$i]?></th>
				<?}?>
					<th>Acción</th>
			</tr>
			
			<?while ($fila = mysql_fetch_array($sel, MYSQL_NUM)){?>
				<tr><!-- Valores-->
					<? for($i=0;$i<count($fila);$i++){ 
						if($keyIndex == $i){
							$sqlKeyValue = $fila[$i];
						}
					?>
						<td><?=$fila[$i]?></td>
					<?}?>
					<td><input type="button" onclick="modificar('<?=$sqlKeyValue?>')" value="Modificar"></td>
				</tr>
			<?}?>		
		</table>
	</form>
</body>
</html>
