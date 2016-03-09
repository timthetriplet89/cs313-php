<?php

    session_start(); 
    require("dbConnector.php"); 
    $db = loadDatabase(); 
    
    if(isset($_GET['text']) & isset($_GET['author'])) {
        
        // Insert quote submitted by the user into the 'quotes' table
        $query = 'INSERT INTO quotes(text, author) VALUES (:text, :author)';
        $statement = $db->prepare($query);
        $statement->bindParam(':text', $_GET['quoteText']);
        $statement->bindParam(':author', $_GET['quoteAuthor']);
        $statement->execute();
        $quoteID = $db->lastInsertId();
        
        // Connect the quote and the user in the user_quote table
        $query = 'INSERT INTO user_quote(userID, quoteID) VALUES (:userID, :quoteID)';
        $statement2 = $db->prepare($query);
        $statement2->bindParam(':userID', $_SESSION['agentID']);
        $statement2->bindParam(':quoteID', $quoteID);
        $statement2->execute();
        
        ////////////////////////////////////////////////////////////
        $query = 'INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';

	$statement = $db->prepare($query);

	$statement->bindParam(':book', $book);
	$statement->bindParam(':chapter', $chapter);
	$statement->bindParam(':verse', $verse);
	$statement->bindParam(':content', $content);

	$statement->execute();

	// get the new id
	$scriptureId = $db->lastInsertId();
    }
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
        <div id="addNewQuote">
            <p>What words of wisdom have you discovered recently?</p>            
            <form id="addQuote" action="mypage.php" method="POST">
                <label for="quoteText">Quote Text</label>
                <textarea id="quoteText" name="quoteText" rows="4" cols="65"></textarea>
                <input type="text" id="quoteAuthor" name="quoteAuthor"></input>
                <label for="quoteAuthor">Quote Author</label>
            </form>
        </div>
    </body>
</html>