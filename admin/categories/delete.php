<?php
	include_once '../../includes/header.php';
    include_once '../../classes/MysqliDb.php';

$db = new Mysqlidb ('localhost', 'root', '', 'corephp');
if(!$db)
{
     error_log("Failed to connect to database!", 0);
}
	//delete
if(isset($_GET['id']))
{

    $id = (int)$_GET['id'];
   
    if($id)
    {

    $db->where ("id", $id);
    
    $db->delete ('categories');
    }
   if($db==true)
    {
        $_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
        //header ("Location: index1.php");

         echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
    	
    }
    exit;

}