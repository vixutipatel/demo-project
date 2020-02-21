<?php
include_once '../../classes/MysqliDb.php';
define('LOG_FILE','my-errors.log'); 
error_reporting(0);
    
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);    
// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
    
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
       
// setting error logging to be active 
ini_set("log_errors", TRUE);  
  
// setting the logging file in my-error.log file
ini_set('error_log', $LOG_FILE); 

// Create connection

$db = new Mysqlidb ('localhost', 'root', '', 'corephp');
if($db)
{
	return $db;
}
else
{ 
	 error_log("connection failed",1,"vrp@narola.email","From: vrp@narola.email");
     error_log("Failed to connect to database!", 0,"$LOG_FILE");
}
?>
