<?php
include 'Connection.php';

$conn = new Connection;


if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$data = array(
		':username' => $username,
		':password' => $password,
		':status' => 1
	);
	$conn->update("INSERT INTO user (username,password,status) VALUES (:username,:password,:status)",$data);

	echo "Registered Successfully";	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>

	<form action="" method="POST">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" name="submit" value="register">
	</form>

</body>
</html>