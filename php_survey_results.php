<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <body>
      
<!-- Write survey results to a file (results.txt) -->
<?php 
/*
$resultsFile = fopen("results.txt","a+"); 

    $name = "Name: " . $_POST["name"] . "\r\n"; 
    $food = "Food preference: " . $_POST["food"] . "\r\n"; 
    $color = "Color preference: " . $_POST["color"] . "\r\n"; 
    $book = "Book preference: " . $_POST["book"] . "\r\n"; 
    $movie = "Movie preference: " . $_POST["movie"] . "\r\n"; 
    $memories = "Memories triggered: " . $_POST["memories"] . "\r\n \r\n"; 

    $surveyText = $name . $food . $color . $book . $movie . $memories; 

    fwrite($resultsFile, $surveyText);
 * 
 */
    // fclose($resultsFile); ///////////////
// Done writing survey results to a file (results.txt) -->

    // Read the survey results from the file 
    $resultsFile = fopen("results.txt","r");    ///////////////
    //if (filesize($resultsFile) > 0) { 
        
        fread($resultsFile,filesize("results.txt")); 
    
        //while(!feof($resultsFile)) { 
            echo fgets($resultsFile) . "<br>"; 
        //} 
        fclose($resultsFile); 
        
    //} else {
    //    echo "<br>No survey results have been recorded previously.<br>";
    //}
    
?>

        <p>Parking reserved.
            <?php 
            /*
            echo "Survey results have been recorded in a safe space.  Your preferences are safely stored!"; 
             */   ?> 
        </p>

    </body>
</html>











