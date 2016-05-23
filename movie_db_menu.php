<?php
    session_start();
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>The Movie Database</header><br><br> <!-- Should this be an h1 element? -->
        
        <!-- Movies -->
        <p class="small_title">View List Of</p>
        <p class="big_title"><a href="list_all_movies.php">Movies</a></p><br><br>    <!-- list_all_movies.php --> 
        
        <!-- Actors -->
        <p class="small_title">View List Of</p>
        <p class="big_title"><a href="list_all_actors.php">Actors</a></p><br><br> <!-- list_all_actors.php -->

        <!-- Directors -->
        <p class="small_title">View List Of</p>
        <p class="big_title"><a href="list_all_directors.php">Directors</a></p><br><br>
        
        <p><a href="add_to_database.php">Add To Database</a></p>
        
    </body>
</html>