<?php

    session_start();
        
    $usernameToAdd = $_POST['enterUsername'];
    $agentID = $_SESSION['agentID'];
    
    echo "<p>usernameToAdd: $usernameToAdd</p>"
       . "<p>agentID: $agentID</p>";
       
    try {
              
    require("dbConnector.php");
    $db = loadDatabase();
        
        // first check to see if this username is in the system!
        $query1 = 'SELECT COUNT( * ) AS total FROM users WHERE username = ' . $usernameToAdd;
        $query1->execute();
        $row = $query1->fetch(PDO::FETCH_ASSOC);
        $numUsername = $row['total'];
        echo "numUsername: $numUsername<br>";
    
        if ($numUsername == 1) {
            // Get the userID for the username to be added!  (See first part of login_page.php -- where I get logged in user's userID
            $query2 = $db->prepare("SELECT userID FROM users WHERE username ='" . $usernameToAdd . "'");  
            $query2->execute();
            $userID_ToAdd = $query2->fetch(PDO::FETCH_ASSOC);
           
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
        }
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