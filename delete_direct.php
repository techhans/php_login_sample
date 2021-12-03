<?php
	session_start();
	require_once 'conn.php';
    
    $reg_date = date("YmdHis");		

	if(ISSET($_GET['username'])){
		if($_GET['username'] != ""){
			try{
				$username = $_GET['username'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "DELETE FROM member WHERE username = '$username'" ;

                $conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User($username) successfully deleted ($reg_date).","alert"=>"info");
			$conn = null;

			header('location:home.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'delete.php'</script>
			";
		}
	}
?>