	<?php


	$MY_HOST = "localhost";
	$MY_DB_USER = "root";
	$MY_DB_PW = "cesco2016";
	$MY_DB_NAME = "php_curso";

	function getConexion($value){
		if($value == "CESCO"){
			$MY_DB_PW = "cesco2016";
		}else {

			$MY_DB_PW = "12345678";
		}
	}


 ?>