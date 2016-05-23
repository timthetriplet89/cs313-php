<?php
    session_start();   
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Connections</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Connections</header><br>
   
    <?php
    
    require("dbConnector.php"); 
    $db = loadDatabase();

    try {
        
        $statement = "SELECT title, id FROM movies"; 
        $queryMovies = $db->prepare($statement); 
        $queryMovies->execute(); 
        $movies = $queryMovies->fetchAll(); 

        foreach($movies as $movie); 
        { 
            $url = "\"http://php-steele2.rhcloud.com/single_movie.php?movie_id=" . $movie['id']. "\"";
            echo '<p><a href=' . $url . '>' . $movie['title'] . '</a></p>';
        } 
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
        
    </body>
</html>