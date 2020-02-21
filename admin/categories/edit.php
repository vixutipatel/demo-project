<?php
	include_once '../../includes/header.php';
	include_once '../../classes/MysqliDb.php';

    //php mysqlidb class inbulit software

    //php error reporting
    
    // Turn off error reporting
    error_reporting(0);
    
    // Report runtime errors
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
    // Report all errors
    error_reporting(E_ALL);
    
    // Same as error_reporting(E_ALL);
    ini_set("error_reporting", E_ALL);
    
    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);
     
// path of the log file where errors need to be logged 
$log_file = "../../includes/my-errors.log"; 
  
// setting error logging to be active 
ini_set("log_errors", TRUE);  
  
// setting the logging file in php.ini 
ini_set('error_log', $log_file); 
  
    
$data = array();


if(isset($_POST['id'])){
    $id = $id;
    echo $id;
}

function action_moddb () {
    global $db;

    $data = Array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
       
    );
    $data = array_map( 'strip_tags', $data);

    $id = (int)$_POST['id'];
   // $db->where ("id",1);
    $db->where ("id", $id);
    $db->update ('categories', $data);
    if($db==true)
    {
            $_SESSION['flash_success_msg'] = 'A record has been updated successfully';

            echo "<script>window.location.href='index.php'</script>";
    }

    exit;

}

function action_mod () {
    global $db;
    global $data;
    global $action;

    $action = 'moddb';
    $id = (int)$_GET['id'];
    $db->where ("id", $id);
    $data = $db->getOne ("categories");
}

$db = new Mysqlidb ('localhost', 'root', '', 'corephp');
if ($_GET) {
    $f = "action_".$_GET['action'];
    if (function_exists ($f)) {
        $f();
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
						categories
					</header>
					<div class="panel-body">


                            <form id="valid" class="form-horizontal tasi-form" action='edit.php?action=<?php echo $action?>' method=post>
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
											
									</select>
									
								</div>
							</div>

                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">name</label>
                                        <div class="col-sm-10">
                                            <input type=hidden name='id' value='<?php echo $data['id']?>'>
                                            <input type="text"  name="name" id="name" class="form-control"  minlength="3"  required  value='<?php echo $data['name']?>'>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type=hidden name='id' class="form-control" value='<?php echo $data['id']?>'>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                        	<textarea  name="description" id="description" class="form-control"  minlength="3"  required ><?php echo $data['description']?></textarea>
                                            
                                        </div>
                                    </div>
                                   
                                   
                                   
                                    <div class="form-group ">
                                        <label class="col-lg-2 col-sm-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <input type="submit" name="submit" value='update' class="btn btn-info">
                                         <button class="btn btn-default"> <a href="index.php">Cancel</a></button>

        
                                        </div>
                                    </div>
                                </form>



	<?php
	include_once '../../includes/footer.php';
	?>
