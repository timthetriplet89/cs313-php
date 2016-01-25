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
<?php include 'pre_body.php'; ?>

<?php 

if (!empty($_POST)) {
    
    $resultsFile = fopen("results.txt","a+"); 

    $name = "Name: " . $_POST["name"] . "\r\n"; 
    $food = "Food preference: " . $_POST["food"] . "\r\n"; 
    $color = "Color preference: " . $_POST["color"] . "\r\n"; 
    $book = "Book preference: " . $_POST["book"] . "\r\n"; 
    $movie = "Movie preference: " . $_POST["movie"] . "\r\n"; 
    $memories = "Memories triggered: " . $_POST["memories"] . "\r\n \r\n"; 

    $surveyText = $name . $food . $color . $book . $movie . $memories; 

    fwrite($resultsFile, $surveyText);
 
     fclose($resultsFile); 
     }
// Done writing survey results to a file (results.txt) -->
?>

     <!-- Survey Results header  -->
     <h1>Current Survey Results</h1>
     
<?php     
    // Read the survey results from the file and display them 
/*
if (filesize($resultsFile) != 0) {
$resultsFile = nl2br(file_get_contents("results.txt", true)); 
echo $resultsFile; 
} else {
    echo "<p>Noone has taken the survey yet.  Perhaps you should " . "<a href=\"survey.html\">start the bandwagon?</a>?</p>";
}
*/

?>

<?php include 'post_body.php'; ?>


    </body>
</html>











