<?php

    session_start();
    
    $usernameToAdd = $_POST['enterUsername'];
    $agentID = $_SESSION['agentID'];
    
    //echo "<p>usernameToAdd: $usernameToAdd</p>"
    //   . "<p>agentID: $agentID</p>";
       
    try {
        
        
        echo "before database connevction setup<br>";
        require("dbConnector.php");
        $db = loadDatabase();
        echo "after database connection setup<br>";
        
        // first check to see if this username is in the system!
        $query1 = $db->prepare('SELECT COUNT(*) AS total FROM users WHERE username = \'' . $usernameToAdd . '\'');
        $query1->execute();
        $row = $query1->fetch(PDO::FETCH_ASSOC);
        $numUsername = $row[0];   //   $row['total'];
//        echo "numUsername: <br>";       //   
//        echo $numUsername;              //   
        
//        $result = mysql_query("SELECT COUNT(*) FROM users WHERE username = '$usernameToAdd'") or die(mysql_error());  // AS total 
//        $row = mysql_fetch_array($result);
//        $total = $row[0]; //use alias
        
        echo "In php script, numUsername = $numUsername<br>";
        
//        $result = mysqli_query("SELECT count(*) FROM User_info");
//        $row = mysqli_fetch_row($result);
//        $num = $row[0];
       
//$result = mysql_query("select count(*) from registeredUsers where email='{$_SESSION['username']}'");
//// Verify it worked
//if (!$result) echo mysql_error();
//$row = mysql_fetch_row($result);
//// Should show you an integer result.
//print_r($row);        
//        
//$theResult = mysql_query('SELECT COUNT( * ) AS total FROM users WHERE username = \'' . $usernameToAdd . '\'');    
//if (!$theResult) echo mysql_error();
//$row = mysql_fetch_row($theResult);
//echo 'number of rows = ' . $row . '<br>';

//        if ($numUsername == 1) {
            // Get the userID for the username to be added!  (See first part of login_page.php -- where I get logged in user's userID
            $query2 = $db->prepare('SELECT userID, name FROM users WHERE username =\'' . $usernameToAdd . '\'');  
            $query2->execute();
            $row = $query2->fetch(PDO::FETCH_ASSOC);
            $userID_ToAdd = $row['userID'];
            $user_name_ToAdd = $row['name'];
            
            // Insert a connection
            $query3 = 'INSERT INTO connections(agentID, recipientID) VALUES (:agentID, :recipientID)';
            $statement3 = $db->prepare($query3);
            $statement3->bindParam(':agentID', $agentID);
            $statement3->bindParam(':recipientID', $userID_ToAdd);
            $statement3->execute();
            
            // Insert a reverse connection
            $query3 = 'INSERT INTO connections(agentID, recipientID) VALUES (:agentID, :recipientID)';
            $statement3 = $db->prepare($query3);
            $statement3->bindParam(':agentID', $userID_ToAdd);
            $statement3->bindParam(':recipientID', $agentID);
            $statement3->execute();
            
            echo '<br><br><a href=\'project_list_quotes.php?userID=' . $userID_ToAdd . '\'>' . $user_name_ToAdd . '</a> is now a connection.<br>';
            // Display tagline of user
            // echo '   "' . $row['text'] . '"<br>      -' . $row['author'] . '<br><br>';
//        }
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

//header("Location: mypage.php");
//die();

?>
<!--                
  By: Timothy Steele 
<!DOCTYPE html>
<html>
    <head>
        <title>Connections</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Add Connection</header><br>      
        <p>Total of rows = < ? php echo $total ?></p>
    </body>
</html>-->