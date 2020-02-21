<?php 
 $check; 
 ?>
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
								<!--<a href="add.php" class="btn btn-primary">Add New</a>-->
								<?php echo anchor('user/add', 'Add New', 'class="btn btn-primary"') ?>
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
									  foreach ($user as $row)

									  {

									?>
								
									<tr id="user_<?php echo $row['id']; ?>">

										<td>
											<input type="checkbox" name="user[]" value="<?php echo $row['id']; ?>" class="check_multiple" />
										</td>
										<td>
											<?php echo ucwords($row['firstname'] ) ?>
										</td>
										<td>
											<?php echo ucwords($row['lastname']) ?>
										</td>
										<td>
											<?php echo ucwords($row['email']) ?>
										</td>
										<td>
											<?php echo ucwords($row['city']) ?>
										</td>
										<td>
											<?php echo ucwords($row['dob']) ?>
										</td>
										<td>
										      <a href="<?=site_url('user/edit?id='.$row['id']);?>">Edit</a>							 
											 <a href="<?=site_url('user/delete?id='.$row['id']);?>" onclick=" return confirm('Are you sure you want to delete?');">Delete</a>
									
									    </td>				
									</tr>
									<?php
											}
															
									?>
								</tbody>

							</table>
						</form>
						<?php echo $this->pagination->create_links();?>

						</div><!-- /.panel-body -->
					</div>
				</div>
			</div>
		</section>
	</aside>
