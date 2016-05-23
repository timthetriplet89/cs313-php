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
        
        $statement = "SELECT * FROM movies WHERE id = " . $_SESSION['movie_id']; 
        $queryMovies = $db->prepare($statement); 
        $queryMovies->execute(); 
        $movie = $queryMovies->fetch(); 
        
        echo '<p class="small_title">' . $movie['title'] . '</p><br>';
        echo $movie['description'] . '<br><br>';
        echo '<p>Directed By' . $movie['director'] . ', ' . $movie['year'] . '</p><br>';
        echo "Actors:<br>"; 
        
        $statement = "SELECT m_a.movie_id, m_a.actor_id" 
                . " FROM movie_actors AS m_a" 
                . " INNER JOIN actors AS acts" 
                . " ON m_a.actor_id = acts.id" 
                . " WHERE m_a.movie_id = " . $_SESSION['movie_id'];
        $queryActors = $db->prepare($statement); 
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