<?php 
	include 'include/DBHandler.php';
	$Message = "";

	if (!isset($_GET['id'])) {
		
		$id = trim($_GET['id']);
	}

	$id = intval($_GET['id']);

	if (isset($_POST['submit'])) {

		$lastname = trim($_POST['lastname']);
		$firstname = trim($_POST['firstname']);
		$middlename = trim($_POST['middlename']);
		$birthdate = trim($_POST['birthdate']);
		$address = trim($_POST['address']);
		$contact_number = trim($_POST['contact_number']);

		if (!empty($lastname) AND !empty($firstname) AND !empty($middlename) AND !empty($birthdate)
			AND !empty($address) AND !empty($contact_number)) {
			UpdatePlayers($id,$lastname,$firstname,$middlename,$birthdate,$address,$contact_number);
			$Message = "Record updated";
			header('location:index.php');
			exit();
		}else{
			$Message = "Update failed";
		}
	}
	else{

		$get = GetSinglePlayer($id);
		if ($get) {

			$lastname = $get['lastname'];
			$firstname = $get['firstname'];
			$middlename = $get['middlename'];
			$birthdate = $get['birthdate'];
			$address = $get['address'];
			$contact_number = $get['contact_number'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Player</title>
</head>

<h2 align="center">PHP Simple Create Tutorial</h2>
<h4 align="center">Author:Mr.LynLag's</h4>
<body>
	<form method="post">
		<input type="text" name="lastname" value="<?php echo htmlentities($lastname); ?>">
		<input type="text" name="firstname" value="<?php echo htmlentities($firstname); ?>">
		<input type="text" name="middlename" value="<?php echo htmlentities($middlename); ?>">
		<input type="date" name="birthdate" value="<?php echo htmlentities($birthdate); ?>">
		<input type="text" name="address" value="<?php echo htmlentities($address); ?>">
		<input type="text" name="contact_number" value="<?php echo htmlentities($contact_number); ?>">
		<button name="submit">Change</button>
		<?php echo $Message; ?>
	</form>
</body>
</html>