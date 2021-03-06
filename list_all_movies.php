<?php
    session_start();   
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Movie List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Movie List</header><br>
   
    <?php
    
    require("dbConnector.php"); 
    $db = loadDatabase();

    try {
        
        $statement = "SELECT title, id FROM movies"; 
        $queryMovies = $db->prepare($statement); 
        $queryMovies->execute(); 
        
            while ($movie = $queryMovies->fetch(PDO::FETCH_ASSOC)) {
                $url = "\"http://php-steele2.rhcloud.com/single_movie.php?movie_id=" . $movie['id']. "\"";
                echo '<p><a href=' . $url . '>' . $movie['title'] . '</a></p>';
            }
            
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
        
        <p class="bold">*** Back to <a href="http://php-steele2.rhcloud.com/movie_db_menu.php">Main Menu</a> ***</p>   
        
    </body>
</html>