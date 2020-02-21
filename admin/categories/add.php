<?php
include_once '../../includes/header.php';
include_once '../../includes/connection.php';
 //php mysqlidb class inbulit software

if (isset($_REQUEST['submit']))
{
global $db;
    $data = Array(
        'parent_id' => $_REQUEST['parent_id'],
        'name' => $_REQUEST['name'],
        'description' => $_REQUEST['description']
        //'password' => $db->func('SHA1(?)',Array ($_POST['password'] . 'salt123')),
   			 );
$data = array_map( 'strip_tags', $data);
$id = $db->insert ('categories', $data);

    if($id)
    {
            $_SESSION['flash_success_msg'] = 'A record has been added successfully';
            echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
		 	 echo "error";
		 	 error_log("data is not inserted",1,"vrp@narola.email","From: vrp@narola.email");
		     error_log("Failed to insert data", 0,"$LOG_FILE");
    }

    
}
?>
<!-- Main content aside-->
<aside class="right-side">
	<!-- Main content section-->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<header class="panel-heading">
						Add New category
					</header>
					<div class="panel-body">
						<form id="valid" class="form-horizontal tasi-form" method="POST" action="add.php">
							
							<div class="form-group required">
								<label class="col-sm-2 col-sm-2 control-label">Parent Name</label>
								<div class="col-sm-10">
									<select class="form-control m-b-10" name="parent_id" id="parent_id" required>
									
								<option value="">-- Select --</option>
								<option value="0">ROOT</option>

									<?php
										global $db;
										$records = $db->get('categories'); //contains an Array of all users 			
											foreach ($records as $category)
											{
												?>
												<option value="<?php echo $category['id'];?>"
												>
												<?php echo $category['name']; ?>
												</option>
												<?php
											}
							
									?>
									</option>
									</select>
									
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 col-sm-2 control-label" >Name</label>
								<div class="col-sm-10">
									<input type="text"  name="name" id="name" class="form-control" required >
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 col-sm-2 control-label">Description</label>
								<div class="col-sm-10">
									<input type="text"   name="description" id="description" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-2 col-sm-2 control-label"></label>
								<div class="col-lg-10">
                                    
                                    <button type="submit" name="submit" value="submit" class="btn btn-info">Save</button>
                                    <button class="btn btn-default"> <a href="index.php">Cancel</a></button>
								</div>
							</div>
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
