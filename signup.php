<?php 
	require_once("dbConnector.php");  //  require_once("dbConnector.php")   
        $db = loadDatabase();         
	require_once("password.php"); // require_once("password.php");          
        
        $username = $_POST['username'];
        $name = $_POST['_name'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['agentTaglineText'] = $_POST['_text'];
        $_SESSION['agentTaglineAuthor'] = $_POST['_author'];
        
	if($_POST) {
            
            // First, create a new user in the users table (with a name, username, and password) 
            //$user_create_query = $db->prepare("INSERT INTO users (name, taglineID, username, password) VALUES (:name, :taglineID, :username, :password)"); 
            $user_create_query = $db->prepare("INSERT INTO users (name, username, password) VALUES (:name, :username, :password)"); 
            $user_create_query->bindParam(':name', $name); 
            $user_create_query->bindParam(':username', $username);  
            $user_create_query->bindParam(':password', $hashedPassword);  
            $user_create_query->execute(); 
            $_SESSION['agentID'] = $db->lastInsertId();
            
        // Insert quote submitted by the user on the sign-up page into the 'quotes' table
        $query = 'INSERT INTO quotes(text, author) VALUES (:text, :author)';
        $statement = $db->prepare($query);
        $statement->bindParam(':text', $_POST['_text']);
        $statement->bindParam(':author', $_POST['_author']);
        $statement->execute();
        $quoteID = $db->lastInsertId();
        $_SESSION['agentTaglineID'] = $quoteID;
        
        // Connect the quote and the user in the user_quote table
        $query2 = 'INSERT INTO user_quote(userID, quoteID) VALUES (:userID, :quoteID)';
        $statement2 = $db->prepare($query2);
        $statement2->bindParam(':userID', $_SESSION['agentID']);
        $statement2->bindParam(':quoteID', $quoteID);
        $statement2->execute();
        
        
        $agentID = $_SESSION['agentID'];
        $query3 = "UPDATE users SET taglineID = $quoteID WHERE userID = $agentID";
        $statement3 = $db->prepare($query3);
        $statement3->execute();
        
            header("Location: signin.php");            
	} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
</head>
<body>
        <form method="post">
            <div>
                <label for="_name">Your Name:</label><br>
                <input type="text" name="_name" id="_name"><br>
            <div>
                <label for="quote_text">A Favorite Quote</label><br>
                <input type="text" name="_text" id="_text"><br>
            </div>
            <div>
                <label for="quote_author">And The Author</label><br>
                <input type="text" name="_author" id="_author"><br>
            </div>
            <div>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username"/><br>
            </div>
            <div>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password"/><br>
            </div>
            <div>
                <button type="submit">Sign Up</button>
            </div>
                
	</form>
</body>
</html>
