<?php
    session_start();   
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Actor List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Actor List</header><br><br>
   
    <?php
    
    require("dbConnector.php"); 
    $db = loadDatabase();

    try {
        
        $statement = "SELECT name, id FROM actors"; 
        $queryActors = $db->prepare($statement); 
        $queryActors->execute(); 
        
            while ($actor = $queryActors->fetch(PDO::FETCH_ASSOC)) {
                $url = "\"http://php-steele2.rhcloud.com/actor_movie_list.php?actor_id=" . $actor['id']. "\"";
                echo '<p><a href=' . $url . '>' . $actor['name'] . '</a></p>';
            }
            
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
       
        <p class="bold">*** Back to <a href="http://php-steele2.rhcloud.com/movie_db_menu.php">Main Menu</a> ***</p>           
        
    </body>
</html>