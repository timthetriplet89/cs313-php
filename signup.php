<?php
	require("dbConnector.php");  //  require_once("dbConnector.php")
	require("password.php"); // require_once("password.php");

//	if($_POST) {
//            
//            echo 'made it into POST';
//		$user_create_query = $db->prepare("INSERT INTO users (name, taglineID, username, password) VALUES (1,\'no_name\', :username, :password)"); 
//		$user_create_query->bindParam(':username', $_POST['username']); 
//		$user_create_query->bindParam(':password', password_hash($_POST['password'], 'abc123')); 
//		$user_create_query->execute(); 
// 
//		header("Location: signin.php"); 
//	} 
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
