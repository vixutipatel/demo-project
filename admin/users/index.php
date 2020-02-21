<?php
include_once '../../includes/header.php';   
    // A user-defined error handler function
 function myErrorHandler($errno, $errstr, $errfile, $errline)
 {
    echo "<b>Custom error:</b> [$errno] $errstr<br>";
    echo " Error on line $errline in $errfile<br>";
 }

// Set user-defined error handler function
 $error=set_error_handler("myErrorHandler");
 error_log($error);

 //delete all
function deleteAll($checkbox)
{
		global $db;
		for($i=0;$i<count($checkbox);$i++)
		{
		
			$del_id = $checkbox[$i]; 
			
			$sql = "DELETE FROM users ";
			$sql .="WHERE id=$del_id";
			
				
			if ($db->query($sql) === TRUE)
			{
				$_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
				echo "<script>alert('Record deleted successfully');</script>";
				echo "<script>window.location.href='index.php'</script>";

			} 
			else
			{ 
				ini_set('error_log', '$LOG_FILE'); 

			}
		}
	}
	
	//delete selected records
	if(isset($_POST['delete_selected']))
    {
    	global $db;
        $checkbox = $_POST['user'];                
            if(deleteAll($checkbox))
            {
            // Message for successfull insertion
           		header ("Location: index.php");
            }
    
	}
		
?>


<!-- Main content aside-->
<aside class="right-side">
	<!-- Main content section-->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php
					$display = 'none';
					if (isset($_SESSION['flash_success_msg']) && $_SESSION['flash_success_msg'] != '')
					{
						$display = 'block';
					}
				?>
				<div id="alert" class="alert alert-success alert-block fade in" style="display:<?php echo $display; ?>">
					<button data-dismiss="alert" class="close close-sm" type="button">
					<i class="fa fa-times"></i>
					</button>
					<h4>
					<i class="icon-ok-sign"></i>
					Success!
					</h4>
					<p>
						<?php echo $_SESSION['flash_success_msg']; ?>
					</p>
				</div>
				<?php
					$_SESSION['flash_success_msg'] = '';
				?>
				<div class="panel">
					<header class="panel-heading">
						category
					</header>
					<div class="panel-body">
						<form action="" method="POST" onsubmit="return check_select();">
							<div class="panel-body">
								<a href="add.php" class="btn btn-primary">Add New</a>
								
								<input class="btn btn-danger" type="submit" name="delete_selected" value="Delete Selected" onclick="return confirm('Are you sure you want to delete?');" />
							</div>
							<table id="example" class="display" style="width:100%">
							<thead>
								
									<tr>
										<th style="width: 10px"><input type="checkbox"  id="checkAll"  onclick="select_all(this);" /></th>
										<th>FirstName</th>
										<th>LastName</th>
										<th>Email</th>
										<th>City</th>
										<th>DOB</th>

										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
									<?php				
										$records = $db->get('users');										
											foreach ($records as $user)
											{
									?>
								
									<tr id="user_<?php echo $user['id'] ?>">
										<td>
											<input type="checkbox" name="user[]" value="<?php echo $user['id'] ?>" class="check_multiple" />
										</td>
										<td>
											<?php echo ucwords($user['firstname']) ?>
										</td>
										<td>
											<?php echo ucwords($user['lastname']) ?>
										</td>
										<td>
											<?php echo ucwords($user['email']) ?>
										</td>
										<td>
											<?php echo ucwords($user['city']) ?>
										</td>
										<td>
											<?php echo ucwords($user['dob']) ?>
										</td>
										<?php echo  "<td>								
							            
							                <a href='edit.php?action=mod&id={$user['id']} '>Edit</a>    |
							            "
							            ?>
										<!--<td>	-->										 <a href="delete.php?id=<?php echo $user['id'] ?>" onclick=" return confirm('Are you sure you want to delete?');">Delete</a>
															
									</tr>
									<?php
											}
															
									?>
								</tbody>
								
							</table>
						</form>
						
						</div><!-- /.panel-body -->
					</div>
				</div>
			</div>
		</section>
	</aside>

	<?php
	include_once '../../includes/footer.php';
	?>

