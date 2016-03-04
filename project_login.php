<?php
    session_start();
    
    // First check to see if the username is set! ...  Add that check.
    $_SESSION['username'] = $_POST['username'];
    echo $_SESSION['username'];
    
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
    
    <?php
    
    
    function writeMsg() {
    echo "Hello world!";
}

    writeMsg(); // call the function
    
    
    
    
//    try {
//
//        echo "<p>Inside the try statement...</p>";
//        
//        $agentID = 1;
//        
//        $users = $db->prepare('SELECT q.text, q.author, u.name' .
//                              ' FROM connections AS c INNER JOIN users AS u' .
//                              ' ON c.recipientID = u.userID' .
//                              ' INNER JOIN quotes q' .
//                              ' ON u.taglineID = q.quoteID' .
//                    ' WHERE agentID = ' . $agentID);
//        $users->execute();
//        
//        // Go through each result	
//        while ($row = $users->fetch(PDO::FETCH_ASSOC))
//        {
//            echo '<p>Reading a line in the returned table';
//            echo '<p>' . $row['name'] . '</p>';
//            echo '<p>' . $row['text'] . ' - ' . $row['author'];
//        }
//        
//    } catch (PDOException $ex) {
//        echo "Error with DB. Details: $ex";
//        die();
//    }

    ?>
    
    <!--  ---------------------------------------------------------------  -->
    

    </body>
</html>