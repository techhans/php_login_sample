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
	<div class="col-md-16 well">
		<h3 class="text-primary">PHP - PDO Login and Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<?php
				$id = $_SESSION['user'];
				$userid = $_SESSION['userid'];				
				
				$sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();


		?>			
			<h3>Welcome! (<?php echo $userid ?>)</h3>
			<br />

			
			<center><h4> 로그인한 시각
			<?php
				$tmp = date("Y-m-d H:i:s");   //  2021-12-02 23:40:03
			?>
			<?php echo $tmp ?><br>
			</h4></center>
			<div class="container">


		</div>
	</div>


<div class="row">
	<?php  
	    	$stmt = $conn->prepare("SELECT * FROM member ORDER BY reg_date DESC");
	    	$stmt->execute();


       
		 if ($userid == 'admin'){
		?>  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
        <tr>  
            <th>아이디</th>  
            <th>성</th>
            <th>이름</th>			
            <th>생성일자</th>
            <th>수정</th>  
            <th>삭제</th>  
        </tr>  
        </thead>  
<?php
            if($stmt->rowCount() > 0){
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
?>					

			<tr>  
			<td><?php echo $username;  ?></td> 
			<td><?php echo $firstname; ?></td>
			<td><?php echo $lastname; ?></td>			
			<td><?php echo substr($reg_date,0,4)."-".substr($reg_date,4,2)."-".substr($reg_date,6,2)."-".substr($reg_date,8,2).":".substr($reg_date,10,2).":".substr($reg_date,12,2); ?></td>
			<td><a class="btn btn-primary" href="edit.php?username=<?php echo $username ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td> 
			<td><?php if($username=='admin'){?><?php }else{ ?><a class="btn btn-warning" href="delete_direct.php?username=<?php echo $username ?>" onclick="return confirm('<?php echo $username ?> 사용자를 삭제할까요?')">
			<span class="glyphicon glyphicon-remove"></span>Del</a><?php } ?></td>
			</tr> 
		
        <?php
			}
                }
            //  }
        ?>  
		<?php } ?>
        </table>  
</div>	
<div>
<b><a href = "logout.php">LOGOUT</a></b>
			</div>
</body>
</html>