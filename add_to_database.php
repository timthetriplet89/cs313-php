<?php
    session_start();
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Add To Database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <h1>Add Movie To Database</h1>
        
        <form id="addMovie" action="submit_movie.php" method="POST">
            
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title"><br><br>        
            
            <label for="description">Movie Description</label><br>
            <textarea id="description" name="description" rows="4" cols="65"></textarea><br><br>

            <label for="year">Year</label>
            <select name="year">
                <option value="2014">1995</option>
                <option value="2014">1996</option>
                <option value="2014">1997</option>
                <option value="2014">1998</option>
                <option value="2014">1999</option>
                <option value="2014">2000</option>
                <option value="2014">2001</option>
                <option value="2014">2002</option>
                <option value="2014">2003</option>
                <option value="2014">2004</option>
                <option value="2014">2005</option>
                <option value="2014">2006</option>
                <option value="2014">2007</option>
                <option value="2014">2008</option>
                <option value="2014">2009</option>
                <option value="2014">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2014">2015</option>
                <option value="2014">2016</option>
            </select><br><br>
            
            <label for="actor1">Actor 1</label>
            <input type="text" id="actor1" name="actor1"><br><br>
            
            <label for="actor2">Actor 2</label>
            <input type="text" id="actor2" name="actor2"><br><br>
            
            <label for="actor3">Actor 3</label>
            <input type="text" id="actor3" name="actor3"><br><br>
            
            <label for="director">Director</label>
            <input type="text" id="director" name="director"><br><br>

            <input type="submit" value="Add Movie"></input>
            
        </form>        
    </body>
    
</html>