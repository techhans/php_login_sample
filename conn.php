<?php
	$db_username = 'test';
	$db_password = 'test';
	$conn = new PDO( 'mysql:host=localhost;dbname=test_db', $db_username, $db_password );



	if(!$conn){
		die("Fatal Error: Connection Failed!");https://github.com/techhans/php_project_01/blob/main/conn.php
	}else{
		echo "
		<script>alert('database connected!')</script>
		";

	}


?>
