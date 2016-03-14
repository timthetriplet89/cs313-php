<?php
/**********************************************************
* File: signOut.php
* Author: Br. Burton
* 
* Description: Clears the username from the session if there.
*
***********************************************************/

require("password.php"); // used for password hashing.
session_start();
unset($_SESSION['agentID']);
unset($_SESSION['agentTaglineID']);
unset($_SESSION['agentTaglineAuthor']);
unset($_SESSION['agentTaglineText']);
unset($_SESSION['agentUsername']);





header("Location: signin.php");
die(); // we always include a die after redirects.
