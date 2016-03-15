<?php
/**********************************************************
* File: signin.php
* Author: Timothy Steele - with template from Brother 
*           Burton.
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
        
	try
	{
            require("dbConnector.php");
		$db = loadDatabase();

		$query = 'SELECT password, userID FROM users WHERE username=:username';

		$statement = $db->prepare($query);
		$statement->bindParam(':username', $username);

		$result = $statement->execute();
                
		if ($result)
		{
		    $row = $statement->fetch();
//                    $hashedPasswordFromDB = $row['password'];
//                    echo '<br>' . $hashedPasswordFromDB . '<br>';
//                    echo 'strlen - hashedPasswordFromDB = ' . strlen($hashedPasswordFromDB);
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
</head>

<body>
    <div class="center_div">

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Welcome to Quotebook!</h1>
<h2>Please sign in below:</h2>

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

<p>Or <a href="signup.php">Sign up</a> for a new account.</p>

</div>

</body>
</html>