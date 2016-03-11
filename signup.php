<?php
	require_once("dbConnector.php");
	require_once("password.php");

	if($_POST) { 
		$user_create_query = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)"); 
		$user_create_query->bindParam(':username', $_POST['username']); 
		$user_create_query->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT)); 
		$user_create_query->execute(); 
 
		header("Location: signin.php"); 
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="post">
		<div>
			<label for="username">Username</label>
			<input type="text" name="username" id="username"/>
		</div>
		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password"/>
		</div>
		<div>
			<button type="submit">Sign Up</button>
		</div>
	</form>
</body>
</html>
