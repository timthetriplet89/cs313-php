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
   
    try {

        echo "<p>Inside the try statement...</p>";
        
        $users = $db->prepare('SELECT * FROM connections AS c' .
                    ' JOIN users AS u' .
                    ' ON c.recipientID = u.userID');
        $users->execute();

        // Go through each result	
        while ($row = $users->fetch(PDO::FETCH_ASSOC))
        {	
            echo '<p>Reading a line in the returned table"';
//            echo '<p>';		
//            echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';		
//            echo $row['verse'] . '</strong>' . ' - ' . $row['content'];		
//            echo '<br />';		
//            echo 'Topics: ';
//
//            // get the topics now for this scripture
//
//            $stmtTopics = $db->prepare('SELECT name FROM topic t'
//            . ' INNER JOIN scripture_topic st ON st.topicId = t.id'
//            . ' WHERE st.scriptureId = :scriptureId');
//
//            $stmtTopics->bindParam(':scriptureId', $row['id']);
//
//            $stmtTopics->execute();
//
//            // Go through each topic in the result		
//            while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
//            {			
//                echo $topicRow['name'] . ' ';		
//            }
//
//            echo '</p>';
        } 
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }

    ?>
    </body>
</html>