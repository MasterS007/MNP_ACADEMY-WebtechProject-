<?php
	require_once('../../databaseConn/dbCon.php');

	session_start();


	function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);
		return $row;
	}

	// function getAllUser(){
	// 	$conn = dbConnection();

	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "select * from users";
	// 	$result = mysqli_query($conn, $sql);
	// 	$users = [];

	// 	while($row = mysqli_fetch_assoc($result)){
	// 		array_push($users, $row);
	// 	}

	// 	return $users;
	// }


	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from users where username='{$user['username']}' and u_password ='{$user['password']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		$_SESSION['name']=$user['u_name'];
		mysqli_close($conn);

		if(count($user) > 0 ){
			return $user;
		}else{
			return "No user found";
		}
	}


	function insert($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "INSERT INTO users (u_name, username, u_password, email, gender, user_type, date_of_birth) VALUES ('{$user['name']}','{$user['uname']}','{$user['password']}','{$user['email']}','{$user['gender']}','{$user['user']}','{$user['Date']}')";
		if(mysqli_query($conn, $sql)){

			return true;
		}else{
			return false;
		}
		  mysqli_close($conn);
	}


	function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	// function delete($id){
	// 	$conn = dbConnection();
	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "DELETE FROM users WHERE id={$id}";

	// 	if(mysqli_query($conn, $sql)){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
?>