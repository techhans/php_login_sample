<?php
	session_start();
	require_once 'conn.php';

	if(ISSET($_POST['edit'])){
		if($_POST['username'] != "" || $_POST['firstname'] != "" || $_POST['lastname'] != "" || $_POST['password'] != ""){
			try{
				$username = $_POST['username'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				// md5 encrypted
				// $password = md5($_POST['password']);
				$password = $_POST['password'];
				$reg_date = date("YmdHis");				

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//				$sql = "INSERT INTO `member` VALUES ('','$firstname', '$lastname', '$username', '$password', '$reg_date')";
				$sql = "UPDATE member SET firstname = '$firstname',lastname = '$lastname',password = '$password',reg_date = '$reg_date' WHERE username = '$username'" ;

				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User($username) successfully updated ($reg_date).","alert"=>"info");
			$conn = null;

			header('location:home.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'edit.php'</script>
			";
		}
	}
?>