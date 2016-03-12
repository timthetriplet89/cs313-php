<?php
	require("dbConnector.php");  //  require_once("dbConnector.php")
        $db = loadDatabase();         
	require("password.php"); // require_once("password.php");        
        
	if($_POST) {
            $name = $_POST['_name'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], 'abc123');
//            
//            // First, create a new user in the users table (with a name, username, and password)
//            //$user_create_query = $db->prepare("INSERT INTO users (name, taglineID, username, password) VALUES (:name, :taglineID, :username, :password)"); 
            $user_create_query = $db->prepare("INSERT INTO users (name, username, password) VALUES (:name, :username, :password)"); 
            $user_create_query->bindParam(':name', $name); // $_POST['_name']); 
            $user_create_query->bindParam(':username', $username); // $_POST['username']);  
            $user_create_query->bindParam(':password', $password); // password_hash($_POST['password'], 'abc123'));  
//            $user_create_query->execute(); 
            
          //header("Location: signin.php"); 
            //die();
            
//////            // First, create a new user in the users table (with a name, username, and password)
//            $query = 'INSERT INTO users (name, username, password) VALUES (:name, :username, :password)';
//            $user_create_query = $db->prepare($query);
////            $user_create_query->bindParam(':name', $name);  // $_POST['_name']);
////            $user_create_query->bindParam(':username', $username); // $_POST['username']);   // Add the rest of the bindParam's !!!
////            $user_create_query->bindParam(':password', $password);  // password_hash($_POST['password'], 'abc123')); 
////            $user_create_query->execute();            
            
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
