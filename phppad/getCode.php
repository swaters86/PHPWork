<?php

	$code = $_POST["code"];


	$file = fopen("results.php","w+");

	fwrite($file, $code);

	fclose($file);

?>