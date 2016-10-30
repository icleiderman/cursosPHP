<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
<h1>Ejemplo 4</h1>
<h2>Comando: $_SERVER['HTTP_USER_AGENT'];</h2>

<p>Vamos a comprobar qué tipo de navegador está utilizando el usuario visitante</p>

	<h4><?echo $_SERVER['HTTP_USER_AGENT'];?></h4>
	
	<?php
	$navegadorWeb = "";
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE ||
	    strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
	    $navegadorWeb = 'Estas usando internet explorer';
	}else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){
		$navegadorWeb = 'Estas usando Chorme';
	}else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){
		$navegadorWeb = 'Estas usando FireFox';
	}else {
		$navegadorWeb = "Es otro navegador";
	}
	?>
	
	<h1><?=$navegadorWeb?></h1>
		
	</body>

</html>