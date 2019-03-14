<?php
	include 'include/DBHandler.php';
	$result = GetAllPlayers();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Read Records</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="index_page">
	<h2 align="center">PHP Simple Create Update Delete Tutorial</h2>
	<h3 align="center">Author:Mr.LynLag's</h3>
	<h4><a href="#">Follow on facebook</a></h5>
</div><br>
<div class="border_line">
	
<div align="center">
<a href="create.php">Create new Player</a>
	<?php if(count($result)>0): ?>
		<table border="1">
			<tr>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Birthdate</th>
				<th>Address</th>
				<th>Contacts</th>
				<th>Actions</th>
			</tr>
			<?php foreach($result as $list): ?>
				<tr>
					<td><?php echo htmlentities($list['lastname']);?></td>
					<td><?php echo htmlentities($list['firstname']);?></td>
					<td><?php echo htmlentities($list['middlename']);?></td>
					<td><?php echo htmlentities($list['birthdate']);?></td>
					<td><?php echo htmlentities($list['address']);?></td>
					<td><?php echo htmlentities($list['contact_number']);?></td>
					<td>
						
						<a href="change.php?id=<?php echo htmlentities($list['id']); ?>">Change</a>
						<a href="delete.php?id=<?php echo htmlentities($list['id']);?>" onclick = "return confirm('are you sure?')">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	<?php else:?>
		<p>No Player found</p>
	<?php endif; ?>
</div>
</div>
<div align="left">
	<div class="copy"> 
		<h5>Copyright © Mr.Lynlag's 2016</h5>
	</div>
</div>
<div align="right"> 
	<div class="about">
		<h5><a href="#">About me</a></h5>
	</div>
</div>
</body>
</html>