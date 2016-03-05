<?php
    session_start();
    
    // First check to see if the username is set! ...  Add that check.
    $_SESSION['username'] = $_POST['username'];
    //echo $_SESSION['username'];
    
    require("dbConnector.php"); 

    $db = loadDatabase(); 
    
    $queryForID = $db->prepare('SELECT userID FROM users WHERE username = \'' . $_SESSION['username'] . '\'');
    $queryForID->execute();
    
    $_SESSION['userID'] = $queryForID->fetch(PDO::FETCH_ASSOC);
    //echo $queryForID->fetch();
    if (isset($_SESSION['userID'])) {
        echo $_SESSION['userID'];
    } else {
        echo 'No session variable set for userID';
    }
    
    // For this assignment (week 5) we will demonstrate displaying data for one user,
    //  instead of processing the log-in information from the previous page.
?>
