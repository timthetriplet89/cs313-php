<?php
    session_start();
    
    // First check to see if the username is set! ...  Add that check.
    //$_SESSION['username'] = $_POST['username'];
    
    require("dbConnector.php"); 

    $db = loadDatabase(); 
    
    $queryForID = $db->prepare("SELECT userID, name, taglineID FROM users WHERE username ='" . $_POST['username'] . "'");  // took out $_SESSION['username']
    $queryForID->execute();
    $result = $queryForID->fetch();
    
    $_SESSION['agentID'] = $result['userID'];
    $_SESSION['agentUserName'] = $result['name'];
    
    $queryForUserTagline = $db->prepare("SELECT text, author FROM users AS u INNER JOIN quotes AS q ON u.taglineID = q.quoteID WHERE u.userID = " . $_SESSION['agentID']);
    $queryForUserTagline->execute();
    $resultTagline = $queryForUserTagline->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['agentTaglineText'] = $resultTagline['text'];
    $_SESSION['agentTaglineAuthor'] = $resultTagline['author'];
?>

<!--  By: Timothy Steele -->
<!DOCTYPE html>
<html>
    <head>
        <title>Connections</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
    </head>
    
    <body>
        
        <header>Connections</header><br>
   
    <?php

    try {
        
        $users = $db->prepare('SELECT q.text, q.author, u.userID, u.name' . 
                              ' FROM connections AS c INNER JOIN users AS u' .
                              ' ON c.recipientID = u.userID' .
                              ' INNER JOIN quotes q' .
                              ' ON u.taglineID = q.quoteID' .
                    ' WHERE agentID = ' . $_SESSION['agentID']); 
        $users->execute();
        
        while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href=\'project_list_quotes.php?userID=' . $row['userID'] . '\'>' . $row['name'] . '</a><br>';
            echo '   "' . $row['text'] . '"<br>      -' . $row['author'] . '<br><br>';
        }
        
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }

    ?>
        
        <div id="link_mypage">
        <a href="mypage.php"><?php echo $_SESSION['agentUserName']?></a>
        <p>   "<?php echo $_SESSION['agentTaglineText'] ?>"</p>
        <p>      -<?php echo $_SESSION['agentTaglineAuthor'] ?></p>
        </div>
    </body>
</html>