<html>
   
   <head>
      <title>Login</title>      
   </head>   
   <body>
	<form action = "verificar.php" method = "post">
		<center>
			<h2>Bienvenido a PHP básico</h2>
			<br>
			<h3><?=$_POST['error'];?></h3>
			<table border="1">
				<tr>
					<td><label>Usuario:</label></td>
					<td><input type = "text" name = "user" id="user" value=""></td>
				</tr>
				<tr>
					<td><label>Contraseña:</label></td>
					<td><input type = "password" name = "pwd" id="pwd" value=""></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type = "submit" value = "Enviar"/></td>
				</tr>
			</table>
		</center>
	</form>
   </body>
</html>