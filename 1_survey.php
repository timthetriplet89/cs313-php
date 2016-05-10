<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta name="author" content="Timothy Steele"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
<body>
    
    <?php 
    
    // This function code is from: http://stackoverflow.com/questions/4871942 -->
    function redirect($url) {
        ob_start();
        header('Location: '.$url);  
        ob_end_flush();
        die();
    } 
     
    if (isset($_SESSION["has_taken_survey"])) { 
        $survey_results_URL = 'http://php-steele2.rhcloud.com/2_survey_results.php';
        redirect($survey_results_URL);
    } ?> 
    
        <p>Please tell us what your favorite movies are:</p>
        <form action="2_survey_results.php" method="post">
		Name: <input type="text" name="name"><br>
		<br>
		Musical: <br>
		<input type="radio" name="musical" value="Fiddler On The Roof">Fiddler On The Roof<br>
		<input type="radio" name="musical" value="The Sound of Music">The Sound of Music<br>
		<br>
		<br>
                Disney movie: <br>
		<input type="radio" name="disney" value="The Lion King">The Lion King<br>
		<input type="radio" name="disney" value="Mulan">Mulan<br>
		<br>
		<br>
                Action Movie <br>
		<input type="radio" name="action" value="Harry Potter">Harry Potter<br>
		<input type="radio" name="action" value="Lord of the Rings">Lord of the Rings<br>
		<br>
		<br>        
                Comedy<br>
		<input type="radio" name="comedy" value="Napolean Dynomite">Napolean Dynomite<br>
		<input type="radio" name="comedy" value="Nacho Libre">Nacho Libre<br>
		<br>
		<br>
                What is your favorite movie of all time and why? <br>
		<textarea rows="3" cols="75" name="all_time_favorite"></textarea>
		<br>
		<br>
		<input type="submit">
	</form>
        
        /////////////////////////////////////////
    print_r($_SESSION);
    /////////////////////////////////////////    
        
    <?php include 'post_body.php'; ?>