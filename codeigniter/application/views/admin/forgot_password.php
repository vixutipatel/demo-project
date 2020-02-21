<html>
<head>
  <title> forgot password</title>
</head>
<body>

  <div class="main">
    <p class="sign" align="center">FORGOT PASSWORD</p>
  <?php if($this->session->flashdata('message')) { ?>
    <p style="color: red" align="center"> 
               <?php echo $this->session->flashdata('message')?>
            </p>    
             <?php } ?>


      <form action="<?php echo base_url('index.php/Welcome/forgot_password') ?>" method="post" accept-charset="utf-8">
      <center>
      <input class="un " type="text" align="center" name="email" placeholder="email" required>
      <?php echo form_error('email'); ?> 
    
      <button type="submit" align="center" class="submit">SEND</button>
      <p></p>
     </center>
     </form>   
    </div>      
</body> 
</html>