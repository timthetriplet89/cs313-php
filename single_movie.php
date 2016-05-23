<?php
    session_start();
    // get the userID passed in, of the logged in user's connection
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
        
        echo $movie['title'] . '<br>';
        echo $movie['description'] . '<br>';
        echo $movie['year'] . '<br>';
        echo $movie['director'] . '<br>';
        echo "Actors:<br>";
        
        $statement = "SELECT m_a.movie_id, m_a.actor_id" 
                . " FROM movie_actors AS m_a" 
                . " INNER JOIN actors AS acts" 
                . " ON m_a.actor_id = acts.id" 
                . " WHERE m_a.movie_id = " . $_SESSION['movie_id'];
        $queryActors = $db->prepare($statement); 
        $queryActors->execute(); 
        $actorList = $queryMovie->fetchAll(PDO::FETCH_ASSOC); 

        foreach($actorList as $actorListItem); 
        {
            $statement2 = "SELECT name, id FROM actors WHERE id = " . $actorListItem['actor_id'];
            $queryActor = $db->prepare($statement2);
            $queryActor->execute();
            $actor = $queryActor->fetch(PDO::FETCH_ASSOC);
            
            echo $actor['name'] . '<br>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    ?>
        
    </body>
</html>