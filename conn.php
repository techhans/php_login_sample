<?php
	$db_username = 'test';
	$db_password = 'test';
	$conn = new PDO( 'mysql:host=localhost;dbname=test_db', $db_username, $db_password );



	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}else{
		echo "
		<script>alert('database connected!')</script>
		";

	}
 

?>
