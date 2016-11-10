<?php 
	include('conexion.php');
	$MY_DB_PW = getConexion($_POST['conexion']);
	
	//post params
	$sqlElementos =$_POST['sqlElementos'];
	$sqlTabla =$_POST['sqlTabla'];
	$sqlKey =$_POST['sqlKey'];
	$sqlKeyValue =$_POST['sqlKeyValue'];
	$accion =$_POST['accion'];

	// tratamiento de parametros
	$arrayElementos = explode(",", $sqlElementos); // convierte en array

	//conexion con manejador de base de datos
	$con = mysql_connect($MY_HOST, $MY_DB_USER, $MY_DB_PW) or die("Ocurrio un problema con el manejador de base de datos");
		
	//conexion con base de datos
	mysql_select_db($MY_DB_NAME, $con) or die ("Ocurrió un error al intentar conectarse con base de datos $MY_DB_NAME");

	if($accion != "Crear"){
		//Borra el registro
		//echo "DELETE from $sqlTabla where $sqlKey = '$sqlKeyValue' <br>";
		mysql_query("DELETE from $sqlTabla where $sqlKey = '$sqlKeyValue'", $con);
	}

	if($accion != "Borrar"){
		$strSQL= "INSERT INTO $sqlTabla ($sqlElementos) VALUES (";

		for($i=0; $i<count($arrayElementos); $i++){
			$elemento = $arrayElementos[$i];
			$strSQL .= "'".$_POST["$elemento"]."'".(($i+1)<count($arrayElementos)?",":"");
		}		
		$strSQL.=")";
		//echo $strSQL;
		mysql_query($strSQL, $con);
	}

 ?>

<form action='listado.php' method='post' name='redirectFRM'>
	<?php
		foreach ($_POST as $campo => $valor) {
			echo "<input type='hidden' name='".htmlentities($campo)."' value='".htmlentities($valor)."'>";
		}
	?>
</form>
<!-- js redirect-->
<script type="text/javascript">
    document.redirectFRM.submit();
</script>
