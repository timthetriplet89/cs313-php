<?php
/**********************************************************
* File: signIn.php
* Author: Br. Burton
* 
* Description: This page has a form for the user to sign in.
*
* In this case, to show another approach, we will have this
* page have two purposes, it will have the form for signing
* in, but it will also have the logic to check a username
* and password and redirect the user to the home page if
* everything checks out. Thus it will post to itself.
***********************************************************/

require("password.php"); // used for password hashing.
session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.

if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];

        echo '<br>' . $username . '<br>';
        echo '<br>' . $password . '<br>';
        
	try
	{
            require("dbConnector.php");
		$db = loadDatabase();

		$query = 'SELECT password, userID FROM users WHERE username=:username';

		$statement = $db->prepare($query);
		$statement->bindParam(':username', $username);

		$result = $statement->execute();

                echo 'result = ' . $result . '<br>';
                
		if ($result)
		{
		    $row = $statement->fetch();
                    $hashedPasswordFromDB = $row['password'];
                    echo '<br>' . $hashedPasswordFromDB . '<br>';
                    // now check to see if the hashed password matches
                    if (password_verify($password, $hashedPasswordFromDB))
                    {
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['agentID'] = $row['userID'];
			header("Location: mypage.php");
			die(); // we always include a die after redirects.
                    }
                    else
                    {
                    	$badLogin = true;
                    }
		}
		else
		{
			$badLogin = true;
		}
	}
	catch (Exception $ex)
	{
		// Please be aware that you don't want to output the Exception message in
		// a production environment
		echo "Error with DB. Details: $ex";
		die();
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>

<body>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>

<form id="mainForm" action="signin.php" method="POST">

	<input type="text" id="txtUser" name="txtUser"></input>
	<label for="txtUser">Username</label>
	<br /><br />

	<input type="password" id="txtPassword" name="txtPassword"></input>
	<label for="txtPassword">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>

<br /><br />

Or <a href="signup.php">Sign up</a> for a new account.

</div>

</body>
</html>