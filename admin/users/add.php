<?php
include_once '../../includes/header.php';

if (isset($_REQUEST['submit']))
{
    $data = array(
        'firstname' => $_REQUEST['firstname'],
        'lastname' => $_REQUEST['lastname'],
        'email' => $_REQUEST['email'],
        'password'=>md5(123),
        'city' => $_REQUEST['city'],
        'dob' => $_REQUEST['dob']

    );
    $data = array_map( 'strip_tags', $data);
    $id = $db->insert('users',$data);

    if($id)
    {
           $_SESSION['flash_success_msg'] = 'A record has been added successfully';
          // header("location: index.php");
            echo "<script>window.location.href='index.php'</script>";
    }
    else
    {   
        echo "failed to add data";
        ini_set('not able to insert data','<?php echo $LOG_FILE ?>'); 
    }
    
}

?>
				
    <aside class="right-side">
    <!-- Main content section-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        Add New User
                    </header>
                    <div class="panel-body">
                            <form class="form-horizontal tasi-form" id="valid" action="add.php" method="POST">
                            <div class="form-group required">
                                <label for="firstname" class="col-sm-2 col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="firstname" id="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="lastname" class="col-sm-2 col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="lastname" id="lastname" class="form-control"   required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="email" class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email"  name="email" id="email" class="form-control" onclick="validate(this)" required> 
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b-10" name="city" id="city" required>
                                        <option value="">Please Select City</option>
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
                                    <input type="date"  name="dob" id="dob"  class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-lg-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10">
                                    
                                    <button type="submit" name="submit" value="submit" class="btn btn-info">Save</button>
                                   <button class="btn btn-default"> <a href="index.php">Cancel</a></button>

                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    <style type="text/css">
        em{
            color:red;
        }
    </style>
<?php
    include_once '../../includes/footer.php';
?>
