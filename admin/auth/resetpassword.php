<?php
include_once '../../includes/connection.php';
session_start(); 

if (isset($_GET['id']))
{ 
    $id = $_GET['id'];

}
/*
$_SESSION['id'] = $id;

if (!isset($_SESSION['id']))
 {
 header('location: verify.php');
 }
*/
if (isset($_POST['submit']))
{
  global $db;      
  $data = Array(
        'password' => md5($_POST['password']),
              );
     //update function calling
  $db->where ("id", $_POST['id']);
  $db->update ('users',$data);
  if($db)
  {
  ?>
   <script type="text/javascript">
  alert("Password reset successfully");
    </script>

     <?php
     header('Location:index.php');
    }
    else
    {
      echo "error";
    }
  }
  if(isset($_REQUEST['cancel']))
  {
      header('Location:index.php');
  }

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
                  <h2 class="text-center">Reset Password</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="valid" action="resetpassword.php" name="form" autocomplete="off" class="form" method="post">
     <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                          
                          <input id="id" name="id" class="form-control" readonly value='<?php echo $id?>'>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>

                          <input id="password" name="password" placeholder="password" class="form-control" value="" type="password">
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                          <input id="confirmpassword" name="confirmpassword" placeholder="confirm password " class="form-control" value=""  type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn  btn-primary btn-block" value="submit" type="submit">

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
         password: {
                      required: true,
                      minlength: 5
                    },
                  confirmpassword: {
                       required: true,
                      minlength: 5,
                     equalTo: "#password"
                   },
                   
    },
    // Specify validation error messages
    messages: {
      password: {
                        required: "Please enter the password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please enter the  password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

</script>

<?php
    include_once '../../includes/footer.php';
?>