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

    try {
        
        $statement = "SELECT name, id FROM directors"; 
        $queryDirectors = $db->prepare($statement); 
        $queryDirectors->execute(); 
        
            while ($director = $queryDirector->fetch(PDO::FETCH_ASSOC)) {
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