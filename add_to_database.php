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
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>                
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
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