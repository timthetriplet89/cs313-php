<?php 
	require_once("dbConnector.php");  //  require_once("dbConnector.php")   
        $db = loadDatabase();         
	require_once("password.php"); // require_once("password.php");          
        
	if($_POST) {
            
            // First, create a new user in the users table (with a name, username, and password) 
            //$user_create_query = $db->prepare("INSERT INTO users (name, taglineID, username, password) VALUES (:name, :taglineID, :username, :password)"); 
            $user_create_query = $db->prepare("INSERT INTO users (name, username, password) VALUES (:name, :username, :password)"); 
            $user_create_query->bindParam(':name', $_POST['_name']); 
            $user_create_query->bindParam(':username', $_POST['username']);  
            $user_create_query->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));  
            $user_create_query->execute(); 
            
            $_SESSION['agentID'] = $db->lastInsertId();
            
        // Insert quote submitted by the user on the sign-up page into the 'quotes' table
        $query = 'INSERT INTO quotes(text, author) VALUES (:text, :author)';
        $statement = $db->prepare($query);
        $statement->bindParam(':text', $_POST['_text']);
        $statement->bindParam(':author', $_POST['_author']);
        $statement->execute();
        $quoteID = $db->lastInsertId();
        
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
	<meta charset="utf-8">
</head>
<body>
        <form method="post">
            <div>
                <label for="_name">Your Name:</label>
                <input type="text" name="_name" id="_name"
            <div>
                <label for="quote_text">A Favorite Quote</label>
                <input type="text" name="_text" id="_text">
            </div>
            <div>
                <label for="quote_author">And The Author</label>
                <input type="text" name="_author" id="_author">
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username"/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div>
                <button type="submit">Sign Up</button>
            </div>
                
	</form>
</body>
</html>
