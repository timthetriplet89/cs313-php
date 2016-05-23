<?php
    session_start();
    // get the director_id passed in
    if (isset($_GET['director_id'])) {
       $_SESSION['director_id'] = $_GET['director_id'];
    }
    
    // Load The Database
    require("dbConnector.php"); 
    $db = loadDatabase();
    
    // Get the Director's Name
    $statement1 = "SELECT name FROM directors WHERE id = " . $_SESSION['director_id'];
    $queryDirectorName = $db->prepare($statement1);
    $queryDirectorName->execute();
    $director = $queryDirectorName->fetch(PDO::FETCH_ASSOC);
    $_SESSION['director_name'] = $director['name'];
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['director_name'] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header><?php echo $_SESSION['director_name'] ?></header><br>
   
    <?php
    
        // Load The Database
        require("dbConnector.php");
        $db = loadDatabase();

                echo "director_id = " . $_SESSION['director_id'] . '<br>';
        echo "director name = " . $_SESSION['director_name']  . '<br>';
        
    try {
        
        $statement = "SELECT title, id FROM movies WHERE director_id = " . $_SESSION['director_id']; 
        $queryMovies = $db->prepare($statement);
        $queryMovies->execute();
        
        while ($movie = $queryMovies->fetch(PDO::FETCH_ASSOC)) {
            $url = "\"http://php-steele2.rhcloud.com/single_movie.php?movie_id=" . $movie['id']. "\"";
            echo '<p><a href=' . $url . '>' . $$movie['title'] . '</a></p>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
     
    ?>
        
    </body>
</html>