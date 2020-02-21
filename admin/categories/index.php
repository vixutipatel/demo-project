<?php
	include_once '../../includes/header.php';
   	include_once '../../includes/connection.php';

if ($_GET) {
    $f = "action_".$_GET['action'];
    if (function_exists ($f)) {
        $f();
    }
}

function deleteAll($checkbox)
{

		global $db;
		for($i=0;$i<count($checkbox);$i++){
		
			$del_id = $checkbox[$i]; 
			
			$sql = "DELETE FROM Categories ";
			$sql .="WHERE id=$del_id";
			
				
			if ($db->query($sql) === TRUE)
			{
			//	echo "record deleted successfully";
				$_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
				echo "<script>alert('Record deleted successfully');</script>";

				echo "<script>window.location.href='index.php'</script>";
			} 
			else
			{
				echo "Error: " ;
			}
		}
	}
	
	//delete selected records
	if(isset($_POST['delete_selected']))
    {
    	global $db;
        $checkbox = $_POST['category'];                
            if(deleteAll($checkbox))
            {
            	header('location:index.php');
           // echo "<script>window.location.href='index.php'</script>";
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
										<th>Categories Name</th>
										<th>Description</th>
										<th>Parent Categories</th>
										<th>Actions</th>
									</tr>
							</thead>
									<tbody>
									<?php
									 	global $db;

							
										$records = $db->get('Categories');
										
											foreach ($records as $category)
											{
									?>
								
									<tr id="usecategory_<?php echo $category['id'] ?>">
										<td>
											<input type="checkbox" name="category[]" value="<?php echo $category['id'] ?>" class="check_multiple" />
										</td>
										<td>
											<?php echo ucwords($category['name']) ?>
										</td>
										<td>
											<?php echo ucwords($category['description']) ?>
										</td>
										<td>
											<?php echo ucwords($category['parent_id']) ?>
										</td>
										
										<?php echo  "<td>
									
							            
							                <a href='edit.php?action=mod&id={$category['id']} '>Edit</a>    |
							            "
							            ?>
										<!--<td>	-->										 <a href="delete.php?id=<?php echo $category['id'] ?>" onclick=" return confirm('Are you sure you want to delete?');">Delete</a>

										<?php echo "</td>"?>					
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
	<!-- /Main content aside-->
	<?php
	include_once '../../includes/footer.php';
	?>
	<script type="text/javascript">
		
	$(document).ready(function() 
	{
    $('#valid').DataTable({
        
       // "searchable": false,
       // "orderable": false,
       // "targets": 0
         "columnDefs": [
            {
                "targets": [ 0 ],
                "orderable": false
            },
            {
                "targets": [ 6 ],
               "orderable": false
            }
        ]
        } );

});
	</script>