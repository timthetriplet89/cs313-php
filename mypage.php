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
        