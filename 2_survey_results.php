<?php
    session_start();
?>

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
      

<?php include 'pre_body.php'; ?>

<?php 

if (!empty($_POST)) {
    
    $resultsFile = fopen("results_2.txt","a+");  
    
    // GET musical, disney, action, and comedy movie
    $musical = "Favorite Musical: " . $_POST["musical"] . "\n";
    $disney = "Favorite Disney Movie: " . $_POST["disney"] . "\n";
    $action = "Favorite Action Movie: " . $_POST["action"] . "\n";
    $comedy = "Favorite Comedy Movie: " . $_POST["comedy"] . "\n";
    $comments = "Favorite Movie Of All Time: " . $_POST["all_time_favorite"] . "\n\n";
            
    $surveyText = $musical . $disney . $action . $comedy . $comments;
    
    fwrite($resultsFile,$surveyText);
    
    fclose($resultsFile);
    $_SESSION["has_taken_survey"] = true;
} ?>

        <h1>Survey Results</h1>
        
<?php
   if(filesize('results_2.txt') > 0)     
   {                                           
       $fileName = 'results_2.txt';           
       $myfile = fopen($fileName, "r") or die("Unable to open file");           
       echo nl2br(fread($myfile, filesize('results_2.txt')));                   
       fclose($myfile);                                                         
   }            
?>               
    
        <p>Back to <a href="1_survey.php">survey</a></p>    
        
<?php include 'post_body.php'; ?>