<?php
include_once '../../includes/connection.php';
?>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By vixutim patel">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script src="../../js/test/jquery.min.js"></script>
         <script src="../../js/dist/jquery.validate.min.js"></script>
<?php
$db = new Mysqlidb ('localhost', 'root', '', 'corephp');
if(!$db)
{
     error_log("Failed to connect to database!", 0);

}
$error_message="";

if(isset($_GET['id']))
{
	$userid=$_GET['id'];

}
if(!empty($_POST["submit"]) && $_POST["otp"]!='')
{

    $otp     =$_POST['otp'];
  	$id= $userid;
   $db->where ("userid", $id);
   $db->where ("otp", $otp);
   $db->where ("expired",0 );

    $data = $db->getOne("authentication");

    if($data)
    {
  
		$value = Array(
        'expired' => 1
        );

		     //update function calling
		    $db->where ("otp", $otp);
		    $db->update ('authentication',$value);
		    if($db)
		    {
					header("Location:resetpassword.php?id=$id");

		    }
			else
			{
				echo "Invalid";

			}	
 
	}	
	else
	{
		 $error_message="Invalid otp or expired OTP";
    	//echo "Invalid otp or expired otp ";


	}
}
	else if(!empty($_POST["otp"]))
	{
	echo "please enter OTP";	
	}
?>


 <section>
<div id="dialog" title="Dialog Form">

<div class="form-gap">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Verify OTP</h2>
                  <p><?php echo 'Message has been sent';?></p>
                  <div class="panel-body">

                    <form id="valid" action="" name="form" autocomplete="off" class="form" method="post">
     				<div class="form-group">
     
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                          
                          <input id="otp"  type="text" name="otp" class="form-control" placeholder="One Time Password" >
                          <label><?php echo $error_message;?></label>
                        </div>
                      </div>
                     
                      </div>
                      <div class="form-group">
                        <input name="submit" name="submit" class="btn  btn-primary btn-block" value="submit" type="submit">

                      </div>
                      
                     
                    </form>
                     <button type="submit" name="cancel" value="cancel" class="btn btn-default btn-block"  onclick="backtohome()">Cancel</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
</section>
<style type="text/css">
  label{
    color: red;
  }
</style>
<script>

function backtohome() 
{
    window.location.href='index.php';
}

$("form[name='form']").validate({
    rules: {
         otp: {
                  required: true,
               },
                 
                   
    },
    // Specify validation error messages
    messages: {
      otp: {
               required: "Please enter the OTP",
            },
                    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

</script>