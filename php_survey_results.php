<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Assign. 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    <body>
      
<!-- Write survey results to a file (results.txt) -->
<!-- -------------------------------------------- -->
<?php 

$resultsFile = fopen("results.txt","a+"); 

    $name = "Name: " . $_POST["name"] . "\r\n"; 
    $food = "Food preference: " . $_POST["food"] . "\r\n"; 
    $color = "Color preference: " . $_POST["color"] . "\r\n"; 
    $book = "Book preference: " . $_POST["book"] . "\r\n"; 
    $movie = "Movie preference: " . $_POST["movie"] . "\r\n"; 
    $memories = "Memories triggered: " . $_POST["memories"] . "\r\n \r\n"; 

    $surveyText = $name . $food . $color . $book . $movie . $memories; 

    fwrite($resultsFile, $surveyText);
 
     fclose($resultsFile); ///////////////
// Done writing survey results to a file (results.txt) -->
 
    // Read the survey results from the file 
    // ini_set('auto_detect_line_endings', true);

//// Write survey results to a file (results.txt) --> 
//// -------------------------------------------- --> 
      
//// Try using a different function to get all of the contents of the file as a string.
//// ------------------------------------------------------------------ --> 
$resultsFile = nl2br(file_get_contents("results.txt", true));
echo $resultsFile;

?>

        <p>Parking reserved.
            <?php 
            /*
            echo "Survey results have been recorded in a safe space.  Your preferences are safely stored!"; 
             */   ?> 
        </p>

    </body>
</html>











