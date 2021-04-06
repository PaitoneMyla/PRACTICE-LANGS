<?php 

$username = $_POST['username'];
$password = $_POST['password'];


$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "chill n grub";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

$result = mysql_query("SELECT * FROM users WHERE username = '$username' and password = '$password'")
	or die("Failed to query database" .mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		echo "<li><a href = 'menu.php'>MenuPage</a></li>" .$row['username'];
	}
	else{
		echo"Failed to login";	
	}
 ?>