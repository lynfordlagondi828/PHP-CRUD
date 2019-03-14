<?php

	/**
	*Created at 2/25/16
	*Database Crud
	*Author Mr.LynLag's
	*/

	//Database Connection
	function DbConnection(){
		try{
			return new PDO('mysql:host=localhost;dbname=spyder','root','');
		}catch(PDOException $ex){
			echo "Could not Connect Database: " . $ex->getMessage();
		}
	}

	//Creating Record
	function CreatePlayer($lastname,$firstname,$middlename,$birthdate,$address,$contact_number){

		$database = DbConnection();
		$sql = "insert into player(lastname,firstname,middlename,birthdate,address,contact_number,created_at)Values(?,?,?,?,?,?,NOW())";
		$stmt = $database->prepare($sql);
		$stmt->execute(array($lastname,$firstname,$middlename,$birthdate,$address,$contact_number));
		$database = null;	
	}

	//GetSinglePlayer
	function GetSinglePlayer($id){

		$database = DbConnection();
		$sql = "select * from player where id = ?";
		$stmt = $database->prepare($sql);
		$stmt->execute(array($id));
		$row = $stmt->fetch();
		$database = null;
		return $row;
	}

	//Get All Players()
	function GetAllPlayers(){

		$database = DbConnection();
		$sql = "select * from player";
		$stmt = $database->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll();
		$database =null;
		return $row;
	}

	//Update Players
	function UpdatePlayers($id,$lastname,$firstname,$middlename,$birthdate,$address,$contact_number){

		$database = DbConnection();
		$sql = "update player set lastname = ?, firstname = ?, middlename = ?, birthdate = ?, 
		address = ?, contact_number = ? where id = ?";
		$stmt = $database->prepare($sql);
		$stmt->execute(array($lastname,$firstname,$middlename,$birthdate,$address,$contact_number,$id));
		$database = null;
	}

	//Delete Player
	function DeletePlayer($id){

		$database = DbConnection();
		$sql = "delete from player where id = ?";
		$stmt = $database->prepare($sql);
		$stmt->execute(array($id));
		$database = null;

	}
?>