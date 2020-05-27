<?php 
session_start();
include "connect.php";

if($_POST){

	if(empty($_POST["email"]) || empty($_POST["password"])){
		header("location: index.php");
	}else{
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["pass"] = $_POST["password"];
		
		$email =  $_POST["email"];
		$pass = $_POST["password"];

		$sql = "SELECT Email, Password FROM login WHERE Email = '".$email."' && Password = '".$pass."'";
		 // WHERE Email = '".$email."' AND '".$pass."'
		$result = mysqli_query($con, $sql);

		while($data = mysqli_fetch_array($result)){
			if(($data["Email"] == $email) && ($data["Password"] == $pass)){
				header("location: biodata.php");
				echo "Selamat Datang";
				$_SESSION["id"] = $data["ID"];
				break;
			}
			else{
				echo "belum terdaftar";
				header("location: index.php");
			}
		
	
		
	
		
			
		// }
	}
	

	
}	
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<style type="text/css">
			h3{
				background-color: blue;
				color: white;
				height: 50px;
			}
			#form{
				background-color: grey;
				color:white;

			}
			#footer{
				background-color: black;
				color: white;
			}
		</style>
</head>
<body>	
<div id="header">
	<h3>Form Login</h3>
</div>
<div id="form">
	<form action="index.php" method="POST">
		<p>Email: </p>
		<input type="text" name="email" placeholder="Email" id="email"></input><br>
		<p>Password:</p>
		<input type="password" name="password" placeholder="Password" id="password"></input><br>
		<input type="submit" name="submit"></input>




	</form>
</div>
<footer id="footer">
	PLEASE LOGIN
</footer>

	




</body>
</html>