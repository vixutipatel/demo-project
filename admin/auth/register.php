<?php
include_once '../../classes/MysqliDb.php';


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
         <script src="../../js/custom.js"></script>


 
<section>
<div id="dialog" title="Dialog Form">
<div class="form-gap">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="glyphicon glyphicon-user"></i></h3>
                  <h2 class="text-center">SIGN UP </h2>
                  <div class="panel-body">
    
                    <form id="valid" name="form" action="register.php"  method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user icon"></i></span>
                                                    
                          <input id="firstname" name="firstname" placeholder="firstname" class="form-control"  type="text">

                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user icon"></i></span>
                                                    
                          <input id="lastname" name="lastname" placeholder="lastname" class="form-control"  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                    
                          <input id="email" name="email" placeholder="email" class="form-control"  type="email">

                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    
                          <input id="dob" name="dob" placeholder="dob" class="form-control"  type="date">

                        </div>
                      </div>

                        <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                 
                       <select class="form-control m-b-10" name="city" id="city" required>
                                        <option value="">Please Select City</option>
                                        <option value="surat">Surat</option>
                                        <option value="ahmedabad">Ahmedabad</option>
                                        <option value="delhi">Delhi</option>
                                        <option value="delhi">navsari</option>

                        </select>
                        </div>
                        </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-key icon"></i></span>
                                                    
                          <input id="password" name="password" placeholder="password " class="form-control"  type="password">

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
    window.location.href='index1.php';
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
