<?php
include_once '../../includes/header.php';

function action_moddb () {
    global $db;

    $data = Array(
        'email' => $_POST['email'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'city' => $_POST['city'],
        'dob' => $_POST['dob'],
    );
    $data = array_map( 'strip_tags', $data);
    $db->where ("id", $_POST['id']);
    $db->update ('users', $data);
    //header ("Location: index1.php");
    if($db)
    {
            $_SESSION['flash_success_msg'] = 'A record has been updated successfully';

            echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
        echo "something went wrong!";
    }

}

function action_mod () {
    global $db;
    global $data;
    global $action;

    $action = 'moddb';
    $id = (int)$_GET['id'];
    $db->where ("id", $id);
    $data = $db->getOne ("users");
}


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
	
				<div class="panel">
					<header class="panel-heading">
						Users
					</header>
					<div class="panel-body">

                            <form id="valid" class="form-horizontal tasi-form" action='edit.php?action=<?php echo $action?>' method=post>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                                        <div class="col-sm-10">
                                            <input type=hidden name='id' value='<?php echo $data['id']?>'>
                                            <input type="text"  name="firstname" id="firstname" class="form-control"  minlength="3" maxlength="10" required  value='<?php echo $data['firstname']?>'>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type=hidden name='id' class="form-control" value='<?php echo $data['id']?>'>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="lastname" id="lastname" class="form-control"  minlength="3" maxlength="10" required value='<?php echo $data['lastname']?>'>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email"  name="email" id="email" class="form-control" onclick="validate(this)" required value='<?php echo $data['email']?>'> 
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b-10" name="city" id="city" required>
                                                <option value="<?php echo $data['city']?>" ><?php echo $data['city']?></option>
                                                                                               
                                                <option value="surat">Surat</option>
                                                <option value="ahmedabad">Ahmedabad</option>
                                                <option value="delhi">Delhi</option>
                                                <option value="delhi">navsari</option>            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 col-sm-2 control-label">DOB</label>
                                        <div class="col-sm-10">
                                            <input type="date"  name="dob" id="dob"  class="form-control" required value='<?php echo $data['dob']?>'>
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
