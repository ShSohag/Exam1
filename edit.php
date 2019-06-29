<?php
include 'Connection.php';

$conn = new Connection;
$getId = $_GET['id'];
$res = $conn->getAll("SELECT * FROM task WHERE id=$getId",null);

//update method
if(isset($_POST['submit'])){

	$shopping = $_POST['shopping'];
	$anniversery = $_POST['anniversery'];
	$birthday = $_POST['birthday'];
    $salary = $_POST['salary'];
    $relatives = $_POST['relatives'];

	$data = array(
		':shopping' => $shopping,
		':anniversery' => $anniversery,
		':birthday' => $birthday,
        ':salary' => $salary,
        ':relatives' => $relatives
	);

	$conn->update("UPDATE task SET shopping=:shopping,anniversery=:anniversery,birthday=:birthday,salary=:salary,relatives=:relatives WHERE id=$getId",$data);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

	<form action="" method="POST">
		<?php
			foreach($res as $r){
		?>
		<input type="text" name="shopping" value="<?php echo $r['shopping']; ?>">
		<input type="text" name="anniversery" value="<?php echo $r['anniversery']; ?>">
		<input type="text" name="birthday" value="<?php echo $r['birthday']; ?>">
        <input type="text" name="salary" value="<?php echo $r['salary']; ?>">
        <input type="text" name="relatives" value="<?php echo $r['relatives']; ?>">


		<input type="submit" name="submit" value="Update">
		<?php
			}
		?>
	</form>

</body>
</html>