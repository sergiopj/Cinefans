<?php
//We initiate meeting
session_start();
//I erase the record login of the array $session
unset($_SESSION["login"]);
//We destroy the meeting and take the user to the index.php
session_destroy();
header("Location: index.php");
exit;
?>
