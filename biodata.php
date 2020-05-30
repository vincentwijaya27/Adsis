<?php 
session_start();
include "connect.php";


if(isset($_POST['submit'])){
	
	if((empty($_POST["namadepan"]) || empty($_POST["namabelakang"])) || ((empty($_POST["email"]) || empty($_POST["deskrip"]))) || empty($_POST["ttl"])  ){
		header("location: biodata.php");
	}
	else{
		// $namadepan = $_POST["namadepan"];
		// $namabelakang = $_POST["namadepan"];
		// $email = $_POST["email"];
		// $deskrip = $_POST["deskrip"];
		// $tempattl = $_POST["ttl"];
		// $ID = mysqli_real_escape_string($con, $_POST["id"]);
		$Nama_depan = mysqli_real_escape_string($con, $_POST["namadepan"]);
		$Nama_belakang = mysqli_real_escape_string($con, $_POST["namabelakang"]);
		$Email_bio = mysqli_real_escape_string($con, $_POST["email"]);
		$Deskripsi_diri = mysqli_real_escape_string($con, $_POST["deskrip"]);
		$Tanggal_lahir = mysqli_real_escape_string($con, $_POST["ttl"]);
		$Email_Session = $_SESSION["email"];

		echo "Nama Lengkap: ";echo $Nama_depan; echo " ";
		echo $Nama_belakang; 
		echo "<br>";
		echo "Email: ";echo $Email_bio;
		echo "<br>";
		echo "Deskripsi: ";echo $Deskripsi_diri; 
		echo "<br>";
		echo "Tanggal Lahir: ";echo $Tanggal_lahir; 
		echo "<br>";

		$update = "UPDATE biodata SET Nama_depan = '".$Nama_depan."', Nama_belakang = '".$Nama_belakang."', Email_bio = '".$Email_bio."', Deskripsi_diri = '".$Deskripsi_diri."', Tanggal_lahir = '".$Tanggal_lahir."' WHERE Email_bio = '".$Email_Session."'";
		$result = mysqli_query($con, $update);
		if($result){
			?>
			<script type="text/javascript">
				alert("Bio berhasil di update");
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("gagal update");
			</script>
			<?php
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Biodata</title>
		<title>Biodata</title>

			<style type="text/css">
			div{
				background-color: orange;
				color: black;

			}
			#form{
				background-color: violet;

			}
			#footer{
				background-color: black;
				color: white;
			}
		</style>
</head>
<body>
<h3>BIODATA</h3>
<form action="biodata.php" method="POST">

	

	<div>

		<p>Nama Depan: <input type="text" name="namadepan"></input></p>
		<p>Nama Belakang: <input type="text" name="namabelakang"></input></p>
		<p>Email: <input type="text" name="email"></input></p>
		<p>Deskripsi Diri: <input type="text" name="deskrip"></input></p>
		<p>Tanggal Lahir: <input type="text" name="ttl"></input></p>

	</div>
<input type="submit" name="submit"></input>
</form>
</body>
<footer>
	<h5> Change Your Biodata Here</h5>
	<h5> Change Your Biodata Here</h5>
</footer>
</html>
