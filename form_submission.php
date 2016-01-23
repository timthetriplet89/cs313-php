<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <a href="mailto:<?php echo $_POST["email"]; ?>"</a><br>
Your selected major is: <?php echo $_POST["major"]; ?><br>
You have visited:
<?php 
   if(!empty($_POST['places'])) {
?>
<ul>
   <?php 
      foreach($_POST['places'] as $value) {
         echo '<li>' . $value . '</li>';
      }
   ?>        
</ul>
<?php
   }
?>
Your comments: <?php echo $_POST["comments"]; ?>
</body>