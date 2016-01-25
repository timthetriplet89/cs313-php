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
    
    if (isset($_SESSION['has_taken_survey'])) { 
        $survey_results_URL = 'http://php-steele2.rhcloud.com/php_survey_results.php';
        redirect($survey_results_URL);
    } ?>       
    
    <p>Please help me get to know you better!</p>
	<form action="php_survey_results.php" method="post">
		Name: <input type="text" name="name"><br>
		<br>
		Which food do you prefer? <br>
		<input type="radio" name="food" value="Macaroni & Cheese">Macaroni & Cheese<br>
		<input type="radio" name="food" value="Sloppy Joes">Sloppy Joes<br>
		<br>
		<br>
                Which color do you prefer? <br>
		<input type="radio" name="color" value="Red">Red<br>
		<input type="radio" name="color" value="Blue">Blue<br>
		<br>
		<br>
                Which book do you prefer? <br>
		<input type="radio" name="book" value="Harry Potter">Harry Potter<br>
		<input type="radio" name="book" value="Chronicles Of Narnia">Chronicles Of Narnia<br>
		<br>
		<br>        
                Which movie do you prefer? <br>
		<input type="radio" name="movie" value="Napolean Dynomite">Napolean Dynomite<br>
		<input type="radio" name="movie" value="Princess Bride">Princess Bride<br>
		<br>
		<br>
                What memories has this survey triggered?: <br>
		<textarea rows="3" cols="75" name="memories"></textarea>
		<br>
		<br>
		<input type="submit">
	</form>
    <h2>Want to hop on the bandwagon?  See what <a href="php_survey_results.php">other before you</a> have voted.</h2>
   
</body>
</html>
