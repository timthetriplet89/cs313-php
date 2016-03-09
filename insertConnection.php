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
        
//        // first check to see if this username is in the system!
//        $query1 = 'SELECT COUNT( * ) AS total FROM users WHERE username = ' . $usernameToAdd;
//        $query1->execute();
//        $row = $query1->fetch(PDO::FETCH_ASSOC);
//        $numUsername = $row['total'];
//        //echo "numUsername: <br>";
//        //echo $numUsername;
    
//        if ($numUsername == 1) {
//            // Get the userID for the username to be added!  (See first part of login_page.php -- where I get logged in user's userID
//            $query2 = $db->prepare('SELECT userID, name FROM users WHERE username =\'' . $usernameToAdd . '\'');  
//            $query2->execute();
//            $row = $query2->fetch(PDO::FETCH_ASSOC);
//            $userID_ToAdd = $row['userID'];
//            $user_name_ToAdd = $row['name'];
            
//            // Insert a connection
//            $query3 = 'INSERT INTO connections(agentID, recipientID) VALUES (:agentID, :recipientID)';
//            $statement3 = $db->prepare($query3);
//            $statement3->bindParam(':agentID', $agentID);
//            $statement3->bindParam(':recipientID', $userID_ToAdd);
//            $statement3->execute();
//            
//            // Insert a reverse connection
//            $query3 = 'INSERT INTO connections(agentID, recipientID) VALUES (:agentID, :recipientID)';
//            $statement3 = $db->prepare($query3);
//            $statement3->bindParam(':agentID', $userID_ToAdd);
//            $statement3->bindParam(':recipientID', $agentID);
//            $statement3->execute();
//            
//            echo '<a href=\'project_list_quotes.php?userID=' . $userID_ToAdd . '\'>' . $user_name_ToAdd . '</a> is now a connection.<br>';
//            // Display tagline of user
//            // echo '   "' . $row['text'] . '"<br>      -' . $row['author'] . '<br><br>';
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
                
                