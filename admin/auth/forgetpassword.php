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
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="valid" name="form" action="sendmail.php"  method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                    
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">

                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn  btn-primary btn-block" value="submit" type="submit">

                      </div>
                      
                    <!--  <input type="hidden" class="hide" name="token" id="token" value=""> -->
                     
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
         email: {
            required: true,
            email: true
              },
      
    },
    // Specify validation error messages
    messages: {
      email:{
            required:"Please Enter email",
            email: "Please enter a valid email address"
            }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

</script>
