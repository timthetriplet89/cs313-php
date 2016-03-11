<?php
	session_start();
	require_once("dbConnector.php");
	require_once("password.php");

	$message = '';

	if($_POST) {
		$user_query = $db->prepare("SELECT userID, password FROM users WHERE username = :username");
		$user_query->bindParam(':username', $_POST['username']);
		$user_query->execute();

		if($user_query->rowCount()) {
			$user = $user_query->fetch();

			if (password_verify($_POST['password'], $user->password)) {
				$_SESSION['user_id'] = $user->id;
				// $_SESSION['username'] = $_POST['username']; 
				header("Location: mypage.php");
			} else {
				$message = "Problem logging in!";
			}
		} else {
			$message = "User not found!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="utf-8">
</head>
<body>
<?php echo $message; ?>
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
		<button type="submit">Sign In</button>
	</div>
	<div>Need an account? <a href="signup.php">Sign up</a></div>
</form>
</body>
</html>