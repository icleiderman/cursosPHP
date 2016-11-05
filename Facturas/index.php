<html>
	<head>
		<script type="text/javascript">
			function ir(titulo,sqlElementos,sqlTabla,sqlKey) {
				console.log("inicio funcion");
				
				var formulario = document.forms['frmPrincipal'];
				document.getElementById("titulo").value = titulo;
				document.getElementById("sqlElementos").value = sqlElementos;
				document.getElementById("sqlTabla").value = sqlTabla;
				document.getElementById("sqlKey").value = sqlKey;
				
				console.log(formulario);
				formulario.submit();

				console.log("fin funcion");
			}
		</script>
	</head>
	<body>
		<form action="listado.php" method="post" id="frmPrincipal" >
			<input type="hidden" name="conexion" id="conexion" value="CESCO">
			<input type="hidden" name="titulo" id="titulo" value="">
			<input type="hidden" name="sqlElementos" id="sqlElementos" value="">
			<input type="hidden" name="sqlTabla" id="sqlTabla" value="">
			<input type="hidden" name="sqlKey" id="sqlKey" value="">
		</form>
		<ol>
        	<li><a id="" href="#" onclick="ir('Usuarios','nombre|user|pwd','usuarios','user')">Usuarios</a>	</li>
        	<li><a id="" href="#" onclick="ir('Productos','clave|descripcion|cantidad|costo','productos','clave')">Productos</a>	</li>
		</ol>
      
	</body>
</html>