<?php
    session_start();
    // get the movie_id passed in
    if (isset($_GET['movie_id'])) {
       $_SESSION['movie_id'] = $_GET['movie_id'];
    }
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Info</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Movie Info</header><br>
   
            <?php
    
    require("dbConnector.php"); 
    $db = loadDatabase();

    try { 
         
        // Query database for movie information 
        $statement1 = "SELECT * FROM movies WHERE id = " . $_SESSION['movie_id']; 
        $queryMovies = $db->prepare($statement1);  
        $queryMovies->execute(); 
        $movie = $queryMovies->fetch(); 

        // Query database for name of director
        
        $statement2 = "SELECT name FROM directors WHERE id = " . $movie['director_id'];
        $queryDirectorName = $db->prepare($statement2);
        $queryDirectorName->execute();
        $director = $queryDirectorName->fetch(PDO::FETCH_ASSOC);
        $directorName = $director['name'];
                
        // Display Movie Title, Description, Director, and Year
        echo '<p class="small_title">' . $movie['title'] . '</p><br>';
        echo $movie['description'] . '<br><br>';
        echo '<p>Directed by ' . $directorName . ', ' . $movie['year'] . '</p><br>';
        echo "Actors:<br>"; 
        
        // Get the actors for the movie
        $statement3 = "SELECT ma.movie_id, ma.actor_id" 
                . " FROM movie_actors AS ma" 
                . " INNER JOIN actors AS acts" 
                . " ON ma.actor_id = acts.id" 
                . " WHERE ma.movie_id = " . $_SESSION['movie_id'];
        $queryActors = $db->prepare($statement3); 
        $queryActors->execute(); 
        
        while ($actorListItem = $queryActors->fetch(PDO::FETCH_ASSOC))
        {
            $statement2 = "SELECT name, id FROM actors WHERE id = " . $actorListItem['actor_id'];
            $queryActor = $db->prepare($statement2);
            $queryActor->execute();
            $actor = $queryActor->fetch(PDO::FETCH_ASSOC);            
            //echo "   " . $actor['name'] . '<br>';
            
            $url = "\"http://php-steele2.rhcloud.com/actor_movie_list.php?actor_id=" . $actor['id']. "\"";
            echo '<p><a href=' . $url . '>' . $actor['name'] . '</a></p>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
        
    </body>
</html>