<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}
	$id = $_SESSION['user'];
	$userid = $_SESSION['userid'];	
	$message = $_SESSION['message'];

	echo " | seission_id:".$id;
	echo " | session_userid:".$userid;	
	if(ISSET($_SESSION['message'])){
		foreach($message as $value){
			echo " | session_message:".$value." | ";
		}
	}
?>

<?php
    if($_GET['username']!=null){
        $username = $_GET['username'];
    }
    echo "username:".$username;
?>

<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - PDO Login and Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
        <h4 class="text-success">session :	<?php
				$id = $_SESSION['user'];
				$userid = $_SESSION['userid'];				
				
				$sql = $conn->prepare("SELECT * FROM `member` WHERE `username`='$username'");
				$sql->execute();
				$fetch = $sql->fetch();


		?>			
			Welcome! (<?php echo $userid ?>)
			<br /></h4> 

			<form action="edit_query.php" method="POST" autocomplete=off>	

                
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" value ="<?php echo $fetch['username']?>" readonly />
				</div>                    
					<label>Firstname</label>
					<input type="text" class="form-control" name="firstname" value ="<?php echo $fetch['firstname']?>"/>
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" class="form-control" name="lastname" value ="<?php echo $fetch['lastname']?>"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" value ="<?php echo $fetch['password']?>"/>
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="edit">edit</button>
				</div>
				<!--a href="index.php">Login</a-->
                <a href="home.php">Home</a>
			</form>
		</div>
	</div>
</body>
</html>