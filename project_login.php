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
    $_SESSION['userID'] = $result['userID'];
    
//    if (isset($_SESSION['userID'])) {
//        echo $_SESSION['userID'];
//    } else {
//        echo 'No session variable set for userID';
//    }
    
    //  "SELECT * FROM toho_shows WHERE toho_shows.show ='". $show. "'"
    
    
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
    
    function runMyFunction() {
      echo 'I just ran a php function';
    }

    if (isset($_GET['userID'])) {
       runMyFunction();
    }

    try {

        echo "<p>Inside the try statement...</p>";
        
        $agentID = 1;
        
        $users = $db->prepare('SELECT q.text, q.author, u.userID' .
                              ' FROM connections AS c INNER JOIN users AS u' .
                              ' ON c.recipientID = u.userID' .
                              ' INNER JOIN quotes q' .
                              ' ON u.taglineID = q.quoteID' .
                    ' WHERE agentID = ' . $agentID);
        $users->execute();
        
        // Go through each result	
        while ($row = $users->fetch(PDO::FETCH_ASSOC))
        {
            echo '<p>Reading a line in the returned table';
            echo '<p>' . $row['name'] . '</p>';
            echo '<p>' . $row['text'] . ' - ' . $row['author'];
        }
        
        echo '<br><br>';
        
//        while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
//            //echo '<button onclick="saveFriendValues(' . $row['userID'] . ', ' . $row['name'] . ')">' . $row['name'] . '</button>' . '<br>';
//        
//            echo '<a href=\'project_list_quotes.php?userID=' . $row['userID'] . '\'>' . $row['name'] . '</a><br>';
//        }

        // echo "<p>Call To Another PHP Script: <p>";
        // echo '<a href=\'project_login.php?userID=2>The 2nd person!</a>';
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }

    ?>
    
    <!--  ---------------------------------------------------------------  -->
    <a href=project_login.php?userID=2>The 2nd person!</a>

    </body>
</html>