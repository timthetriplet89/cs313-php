<?php
    session_start();

    if (isset($_GET['userID'])) {
       $_SESSION['user_connection'] = $_GET['userID'];
    } 
//    else {
//        require("pre_body.html");
//        echo "This person prefers to keep an air of mystery about him.";
//        require("post_body.html");
//    }

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
    if (isset($_SESSION['user_connection'])) {
        echo $_SESSION['user_connection'];
    }

?> 
        
        
        
        
        
        
  </body>
</html> 