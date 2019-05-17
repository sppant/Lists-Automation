<?php
  $username = "root";
	$password = "";
	$hostname = "localhost";
	$dbname="listes";
	$dbhandle = mysqli_connect($hostname, $username, $password, $dbname) or die("Unable to connect to MySQL");
  $choice = $_GET['choice'];
	$sql = "SELECT DISTINCT spot_name FROM spot WHERE customer_name = '$choice';";
  $dbhandle->set_charset('utf8');
  $result = mysqli_query($dbhandle,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<option>" . $row{'spot_name'} . "</option>";
		}
	}


?>
