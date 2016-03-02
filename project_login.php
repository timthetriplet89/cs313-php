<?php
    session_start();
    
    require("dbConnector.php"); 

    //$db = loadDatabase(); 
    
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
        
    <!--  Check to make sure the form was submitted
          -- See "scripture_submit.php" from my team activity.
          --  if (isset($_POST['book']) && isset($_POST['chapter']) && isset($_POST['verse']))   -->    
    
    <!-- hard-code in the user we're logging in as (to start off with).
    Next step will be implementing the password logging in -->
    <?php
    // require("dbConnector.php"); 
    // $db = loadDatabase();
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); 
  
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";

     $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     // $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    // Next thing to test:
//    $query = $db->prepare("SELECT * FROM connections WHERE agentID = 1");
     
//    $query = $db->prepare("SELECT * FROM connections");
//    $connections_1 = $query->execute();
    
    //$my_connections = $db->query
        
//   foreach ($my_connections as $connection) {     
////        $connection_recipientID = $db->query("SELECT recipientID");
////        $connection_user = $db->query("SELECT * WHERE $connectionID")
//echo <<<HTML
//            <div>RecipientID = {$connection['recipientID']}.</div>
//HTML;
//    }
    
    ?>
    </body>
</html>