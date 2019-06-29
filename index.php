<?php
session_start();
if(!isset($_SESSION['logged_id']))
{
	header("location:login.php");
    
    
    }
    

    


include 'Connection.php';

$conn = new Connection;

//search
if(isset($_POST['src'])){
	$query = $_POST['search'];
	$result = $conn->getAll("SELECT * FROM task WHERE name LIKE '%$query%'",null);
}else{
	$result = $conn->getAll("SELECT * FROM task",null);
}


if(isset($_POST['submit'])){
	$shopping = $_POST['shopping'];
	$anniversery = $_POST['anniversery'];
	$birthday = $_POST['birthday'];
    $salary = $_POST['salary'];
    $relatives = $_POST['relatives'];



	$conn->insertWife($shopping,$anniversery,$birthday,$salary,$relatives);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>form collection</title>
</head>
<body>

	<a href="logout.php">logout</a><br>
	
	Logged as : <?php
    echo $_SESSION['username'];
    ?>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="text" name="shopping" placeholder="shopping"><br>
		<input type="text" name="anniversery" placeholder="anniversery date"><br>
		<input type="text" name="birthday" placeholder="birthday"><br>
		<input type="text" name="salary" placeholder="salary"><br>
		<input type="text" name="relatives" placeholder="relatives"><br>
		<label for='y'>Remembered</label>
		<input type="radio" id='y' name="relatives" value="Remembered">
		<label for='n'>Forgotten</label>
		<input type="radio" id="n" name="relatives" value="Forgotten"><br>
		
		<input type="submit" name="submit" value="Insert">
	</form>

	<hr>
	<form action="" method="POST">
		<input type="text" name="search">
		<input type="submit" name="src" value="search">
	</form>
	<hr>

	<table border="1">
		<?php 
		foreach ($result as $res){
		?>
		<tr>
			<td><?php echo $res['id'] ?></td>
			<td><?php echo $res['shopping'] ?></td>
			<td><?php echo $res['anniversery'] ?></td>
			<td><?php echo $res['birthday'] ?></td>
			<td><?php echo $res['salary'] ?></td>
			<td><?php echo $res['relatives'] ?></td>
			
			<td><a href="edit.php?id=<?php echo $res['id']; ?>">edit</a></td>
			<td><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $res['id']; ?>">delete</a></td>
		</tr>

		<?php
		}
		?>
	</table>

</body>
</html>