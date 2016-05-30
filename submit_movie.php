<?php

    session_start(); 
    
        //if(isset($_POST['title']) & isset($_POST['year'])) {  //  ADD THIS!
        $title = $_POST['title']; 
        $description = $_POST['description'];
        $year = intval($_POST['year']);
        $director = $_POST['director'];
        $actor1 = $_POST['actor1'];
        $actor2 = $_POST['actor2'];
        $actor3 = $_POST['actor3'];    
        
    try { 
         
        require("dbConnector.php"); 
        $db = loadDatabase(); 
         
        // Add director to database 
        $query = 'INSERT INTO directors(name) VALUES (:name)'; 
        $statement = $db->prepare($query); 
        $statement->bindParam(':name', $director); 
        $statement->execute(); 
        $directorID = $db->lastInsertId(); 
         
        // submit movie title, year, description, and director into database 
        $query2 = 'INSERT INTO movies(title, year, director_id, description) VALUES(:title, :year, :director_id, :description);'; 
        $statement2 = $db->prepare($query2); 
        $statement2->bindParam(':title', $title); 
        $statement2->bindParam(':year', $year); 
        $statement2->bindParam(':director_id', $directorID); 
        $statement2->bindParam(':description', $description); 
        $statement2->execute(); 
        $movieID = $db->lastInsertId(); 
        
        // submit actors into database.
        $query3 = 'INSERT INTO actors(name) VALUES (:name);';
        $statement3 = $db->prepare($query3);
        $statement3->bindParam(':name', $actor1);
        $statement3->execute();
        $actor1_id = $db->lastInsertId();
        
        $query4 = 'INSERT INTO actors(name) VALUES (:name);';
        $statement4 = $db->prepare($query4);
        $statement4->bindParam(':name', $actor2);
        $statement4->execute();
        $actor2_id = $db->lastInsertId();
        
        $query5 = 'INSERT INTO actors(name) VALUES (:name);';
        $statement5 = $db->prepare($query5);
        $statement5->bindParam(':name', $actor3);
        $statement5->execute();
        $actor3_id = $db->lastInsertId();
        
        // Submit actors_ids and movie_id into the movie_actors table.
        $query6 = 'INSERT INTO movie_actors(movie_id, actor_id) VALUES(:movie_id, :actor_id);';
        $statement6 = $db->prepare($query6);
        $statement6->bindParam(':movie_id', $movieID);
        $statement6->bindParam(':actor_id', $actor1_id);
        
        $query7 = 'INSERT INTO movie_actors(movie_id, actor_id) VALUES(:movie_id, :actor_id);';
        $statement7 = $db->prepare($query7);
        $statement7->bindParam(':movie_id', $movieID);
        $statement7->bindParam(':actor_id', $actor2_id);
        
        $query8 = 'INSERT INTO movie_actors(movie_id, actor_id) VALUES(:movie_id, :actor_id);';
        $statement8 = $db->prepare($query8);
        $statement8->bindParam(':movie_id', $movieID);
        $statement8->bindParam(':actor_id', $actor3_id);
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

header("Location: add_to_database.php");
die();

?>