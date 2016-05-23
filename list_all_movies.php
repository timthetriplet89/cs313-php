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
        
    $statement = "SELECT name, id FROM movies"; 
    $queryMovies = $db->prepare($statement);
    $queryMovies->execute();
    $movies = $queryMovies->fetchAll();
    
    foreach($movies as $movie)
    {
        echo '<p>' . $movie['id'] . '  ' . $movie['title'];
    }
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }

    ?>
        
    </body>
</html>