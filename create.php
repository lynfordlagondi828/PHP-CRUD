<?php
	include 'include/DBHandler.php';
	$Message = "";

	if (isset($_POST['submit'])) {
		
		$lastname = trim($_POST['lastname']);
		$firstname = trim($_POST['firstname']);
		$middlename = trim($_POST['middlename']);
		$birthdate = trim($_POST['birthdate']);
		$address = trim($_POST['address']);
		$contact_number = trim($_POST['contact_number']);

		$result = CreatePlayer($lastname,$firstname,$middlename,$birthdate,$address,$contact_number);
	
		if ($result != TRUE) {
			$Message = "Player record created";
			header('location:index.php');
			exit();
		}else{
			$Message = "Unable to create player record";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Player</title>
</head>
<h2 align="center">PHP Simple Create Tutorial</h2>
<h4 align="center">Author:Mr.LynLag's</h4>
<body>
<div align="center">
	<form method="post">
	<tr>
		<td>Lastname:</td>
		<td><input type="text" name="lastname" required><br><br></td>

		<td>Firstname:</td>
		<td><input type="text" name="firstname" required><br><br></td>

		<td>Middlename:</td>
		<td><input type="text" name="middlename" required><br><br></td>

		<td>Birthdate:</td>
		<td><input type="date" name="birthdate" required><br><br></td>

		<td>Address:</td>
		<td><input type="text" name="address" required><br><br></td>

		<td>Contact No:</td>
		<td><input type="number" name="contact_number" required><br><br></td>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<td><button name="submit">Create</button><br></td>
	</tr>
		<?php echo $Message; ?>
	</form>
</body>
</div>
</html>