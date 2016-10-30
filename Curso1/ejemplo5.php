<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
<h1>Ejemplo 5</h1>
<h2>Variables globales</h2>

	<ul>
	  <li>$GLOBALS</li>
	  <li>$_SERVER</li>
	  <li>$_POST</li>
	  <li>$_FILES</li>
	  <li>$_COOKIE</li>
	  <li>$_SESSION</li>
	  <li>$_REQUEST</li>
	  <li>$_ENV</li>
	</ul>
		
		<h2>$_SERVER</h2>
			<?php 
			foreach ($_SERVER as $key => $value) {
				echo '<span class="left">' . $globalkey . '[<span class="key">\'' . $key . '\'</span>]</span> = <span class="right">' . $value . '</span><br />';
			}
			?>
			
		<h2>$_POST</h2>
			<?php 
			foreach ($_POST as $key => $value) {
				echo '<span class="left">' . $globalkey . '[<span class="key">\'' . $key . '\'</span>]</span> = <span class="right">' . $value . '</span><br />';
			}
			?>
		<h2>$_COOKIE</h2>
			<?php 
			foreach ($_COOKIE as $key => $value) {
				echo '<span class="left">' . $globalkey . '[<span class="key">\'' . $key . '\'</span>]</span> = <span class="right">' . $value . '</span><br />';
			}
			?>
	</body>
</html>