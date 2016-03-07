<?php
    session_start();

    if (isset($_GET['userID'])) {
       $_SESSION['user_connection'] = $_GET['userID'];
    }
    
    require("dbConnector.php"); 
    $db = loadDatabase(); 
    
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
    if (!isset($_SESSION['user_connection'])) {
        echo "This person prefers to keep an air of mystery about him.";
    } else {
        try {
            
            $quotes = $db->prepare('SELECT q.text, q.author' .
                    'FROM users AS u' .
                    'INNER JOIN user_quote AS srqt' .
                    'ON u.userID = srqt.userID' .
                    'INNER JOIN quotes q' .
                    'ON srqt.quoteID = q.quoteID' .
                    'WHERE u.userID = ' . $_SESSION['user_connection']);
            
            $quotes->execute();
            while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>"' . $row['text'] . '"   -' . $row['author'] . '</p>';
            }
        
        } catch (PDOException $ex) {
            echo "Error with DB. Details: $ex";
            die();
        }
        
    } 
?>   
        
  </body>
</html> 