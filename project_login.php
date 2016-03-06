<?php
    session_start();
    
    // First check to see if the username is set! ...  Add that check.
    $_SESSION['username'] = $_POST['username'];
    //echo $_SESSION['username'];
    
    require("dbConnector.php"); 

    $db = loadDatabase(); 
    
    $queryForID = $db->prepare("SELECT userID FROM users WHERE username ='" . $_SESSION['username'] . "'");
    $queryForID->execute();
    
    $result = $queryForID->fetch();
    
    // Under test...
   //['userID'] = $result['userID'];    
    $_SESSION['agentID'] = $result['userID'];
    
    // For this assignment (week 5) we will demonstrate displaying data for one user,
    //  instead of processing the log-in information from the previous page.
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Assign. 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
   
    <?php

    try {

        echo "<p>Inside the try statement...</p>";
        
        $users = $db->prepare('SELECT q.text, q.author, u.userID, u.name' . 
                              ' FROM connections AS c INNER JOIN users AS u' .
                              ' ON c.recipientID = u.userID' .
                              ' INNER JOIN quotes q' .
                              ' ON u.taglineID = q.quoteID' .
                    ' WHERE agentID = ' . $_SESSION['agentID']); 
        $users->execute();
        
        while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
            //echo '<p>Reading a row:</p>';
            echo '<a href=\'project_list_quotes.php?userID=' . $row['userID'] . '\'>' . $row['name'] . '</a><br>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }

    ?>

    </body>
</html>