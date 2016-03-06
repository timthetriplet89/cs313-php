<?php



  function runMyFunction() {
    echo '<p>I just ran a php function</p>';
    
    echo $_GET['userID'];
  }

  if (isset($_GET['userID'])) {
    runMyFunction();

  }

?>


<!--if ($_GET['userID'] == "2")
            search($id);-->
            
            
<!--            
            if ($_GET['fn'] == "search")
     if (!empty($_GET['id']))
            search($id);-->

