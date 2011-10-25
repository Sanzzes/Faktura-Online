<?php

//close the session and close mysql connection
session_start();
session_unset();
session_destroy();
$_SESSION=array();
mysql_close();
//go back to index.php
header("Location: index.php");
?> 
