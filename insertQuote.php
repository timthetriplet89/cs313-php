<?php

    session_start(); 
    require("dbConnector.php"); 
    $db = loadDatabase(); 
   
        //if(isset($_POST['text']) & isset($_POST['author'])) {
        echo $_POST['text'] . '<br>';
        echo $_POST['author'] . '<br>';   
    
        // Insert quote submitted by the user into the 'quotes' table
        $query = 'INSERT INTO quotes(text, author) VALUES (:text, :author)';
        $statement = $db->prepare($query);
        $statement->bindParam(':text', $_POST['quoteText']);
        $statement->bindParam(':author', $_POST['quoteAuthor']);
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

        <header>New quote went to database (fingers crossed)</header>


    </body>
</html>