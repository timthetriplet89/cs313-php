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
        
        <header><?php echo $_SESSION['agentUserName'] ?></header>
        <p>   "<?php echo $_SESSION['agentTaglineText'] ?>"</p>
        <p>      -<?php echo $_SESSION['agentTaglineAuthor'] ?></p>
        
<?php 

    try {
        $quotesQuery = $db->prepare('SELECT q.text, q.author, q.quoteID' . 
                ' FROM quotes AS q INNER JOIN user_quote AS srqt' . 
                ' ON q.quoteID = srqt.quoteID' . 
                ' WHERE srqt.userID = ' . $_SESSION['agentID']);
        $quotesQuery->execute();
        while ($row = $quotesQuery->fetch(PDO::FETCH_ASSOC)) {
            if ($row['quoteID'] != $_SESSION['agentTaglineID']) {
                echo '<p>"' . $row['text'] . '"   -' . $row['author'] . '</p>';                 
            } 
        } 
    } catch (PDOException $ex) { 
        echo "Error with DB. Details: $ex";
        die();
    }
?>
        
        <div id="addQ">
            <header>What words of wisdom have you discovered recently?</header><br>            
            <form id="addQuote" action="insertQuote.php" method="POST">  
                <label for="quoteText">Quote Text</label><br>
                <textarea id="quoteText" name="quoteText" rows="4" cols="65"></textarea><br><br>
                <input type="text" id="quoteAuthor" name="quoteAuthor"></input><br>
                <label for="quoteAuthor">Quote Author</label><br><br>
                <input type="submit" value="Add to database" ></input>
            </form>
        </div>
        
        <br><br><br>
        <div id="addC">
            <header>Who Would You Like To Add?</header>
            <form id="addConnection" action="insertConnection.php" method="POST">
                <br><label for="enterUsername">Enter Username:</label><br>
                <input type="text" id="enterUsername" name="enterUsername"></input><br>
                <input type="submit" value="Add Connection"></input>
            </form>
        </div>
        <div id="goToFriends">
            <p><a href='friend_list.php'>View friends' QuoteBooks</a></p>
        </div>
    </body>
</html>