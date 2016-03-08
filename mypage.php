<?php

    session_start(); 
    require("dbConnector.php"); 
    $db = loadDatabase(); 
    
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Me & Quotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header><?php echo $_SESSION['agentUserName'] ?></header><br>
        <p>   "<?php echo $_SESSION['agentTaglineText'] ?>"</p>
        <p>      -<?php echo $_SESSION['agentTaglineAuthor'] ?></p>
        
<?php 

    try {
        $quotesQuery = $db->prepare('SELECT text, author' . 
                ' FROM quotes AS q INNER JOIN user_quote AS srqt' . 
                ' ON q.quoteID = srqt.quoteID' . 
                ' WHERE srqt.userID = ' . $_SESSION['agentID']);
        $quotesQuery->execute();
        while ($row = $quotesQuery->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>"' . $row['text'] . '"   -' . $row['author'] . '</p>';
        }
        
    } catch (Exception $ex) {
        
    }
 
?>
        
    </body>
</html>