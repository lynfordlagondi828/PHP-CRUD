<?php
	
	include 'include/DBHandler.php';
	if(isset($_GET['id'])){
		$id = trim($_GET['id']);
		
		$get =  GetSinglePlayer($id);
		if($get){
			DeletePlayer($id);
			header('location:index.php');
			exit();
		}
	}
?>

