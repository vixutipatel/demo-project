<?php 
include_once '../../includes/header.php';
 //delete
try
{
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $db->where ("id",(int)$_GET['id']);    
    $db->delete ('users');
   if($db)
    {
        $_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
         echo "<script>window.location.href='index.php'</script>";
            // header ("Location: index1.php");
    }
    else
    {
       echo "error";  
          
    }
}
}
catch(Exception $e) 
{

  echo 'Message: ' .$e->getMessage();
  ini_set('$e',$LOG_FILE); 
  header ("Location: index.php");
  //echo "<script>window.location.href='index.php'</script>";

}
