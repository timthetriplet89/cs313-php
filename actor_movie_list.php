<?php
    session_start();
    // get the actor_id passed in
    if (isset($_GET['actor_id'])) {
       $_SESSION['actor_id'] = $_GET['actor_id'];
    }
    
    // Load The Database
    require("dbConnector.php"); 
    $db = loadDatabase();
    
    echo "Database successfully loaded";
    
    // Get the Director's Name
    $statement1 = "SELECT name, FROM actors WHERE id = " . $_SESSION['actor_id'];
    $queryActorName = $db->prepare($statement1);
    $queryActorName->execute();
    $actor = $queryActorName->fetch(PDO::FETCH_ASSOC);
    $_SESSION['actor_name'] = $actor['name'];
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['actor_name']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Movies <?php echo $_SESSION['actor_name']; ?> Acted In</header><br>
   
    <?php
    
        // Load The Database
//        require("dbConnector.php");
//        $db = loadDatabase();
        
    try {
        
        $statement = "SELECT m.title, m.id"
                . " FROM movies AS m"
                . " INNER JOIN movie_actors AS mActs"
                . " ON m.id = mActs.movie_id"
                . " INNER JOIN actors AS a"
                . " ON mActs.actor_id = a.id"
                . " WHERE a.id = " . $_SESSION['actor_id'] . ";";
        
        $queryMovies = $db->prepare($statement);
        $queryMovies->execute();
        
        while ($movie = $queryMovies->fetch(PDO::FETCH_ASSOC)) {
            $url = "\"http://php-steele2.rhcloud.com/single_movie.php?movie_id=" . $movie['id'] . "\"";
            echo '<p><a href=' . $url . '>' . $movie['title'] . '</a></p>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }   
        
    ?>  
        
    </body>
</html>