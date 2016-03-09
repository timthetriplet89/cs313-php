<?php

    session_start(); 

   
        //if(isset($_POST['text']) & isset($_POST['author'])) {
    
    try {
        
        require("dbConnector.php"); 
        $db = loadDatabase(); 
        
        $text = $_POST['quoteText'];
        $author =  $_POST['quoteAuthor'];  
        $agentID = $_SESSION['agentID'];
        
        echo "quoteText: $quoteText\n";
        echo "quoteAuthor: $quoteAuthor\n";
    
        // Insert quote submitted by the user into the 'quotes' table
        $query = 'INSERT INTO quotes(text, author) VALUES (:text, :author)';
        $statement = $db->prepare($query);
        $statement->bindParam(':text', $text);
        $statement->bindParam(':author', $author);
        $statement->execute();
        $quoteID = $db->lastInsertId();
        
        // Connect the quote and the user in the user_quote table
        $query = 'INSERT INTO user_quote(userID, quoteID) VALUES (:userID, :quoteID)';
        $statement2 = $db->prepare($query);
        $statement2->bindParam(':userID', $agentID);
        $statement2->bindParam(':quoteID', $quoteID);
        $statement2->execute();
    } 
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
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

        <header>New quote went to database (fingers crossed)</header>


    </body>
</html>