<?php
    session_start();
    
    require("dbConnector.php"); 

    $db = loadDatabase(); 
    
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
        
    <!--  Check to make sure the form was submitted
          -- See "scripture_submit.php" from my team activity.
          --  if (isset($_POST['book']) && isset($_POST['chapter']) && isset($_POST['verse']))   -->    
    
    <!-- hard-code in the user we're logging in as (to start off with).
    Next step will be implementing the password logging in -->
    
    <?php
   
    $agentID = 1;
    
$users = $db->prepare('SELECT * FROM connections AS c 
	JOIN users AS u
	ON c.recipientID = u.userID');

// WHERE agentID = 1  //  AND c.agentID = :agentID');

$users->bindParam(':agentID', $agentID);    //    AND c.agentID = :agentID'
    
while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
    echo "Name of connection: {$row['name']}  <br> ".
         "Tagline of connection: {$row['tagline']}"
}

//foreach ($users->fetchAll() AS $user) {    //  Rename query to users
//    echo $user["name"];
//}

    ?>
    </body>
</html>