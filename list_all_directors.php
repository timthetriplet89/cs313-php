<?php
    session_start();   
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Director List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Director List</header><br>
   
    <?php
    
    require("dbConnector.php"); 
    $db = loadDatabase();

    try {
        
        $statement = "SELECT name, id FROM directors"; 
        $queryDirectors = $db->prepare($statement); 
        $queryDirectors->execute(); 
        
            while ($director = $queryDirectors->fetch(PDO::FETCH_ASSOC)) {
                $url = "\"http://php-steele2.rhcloud.com/director_movie_list.php?director_id=" . $director['id']. "\"";
                echo '<p><a href=' . $url . '>' . $director['name'] . '</a></p>';
            }
            
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
        
    </body>
</html>