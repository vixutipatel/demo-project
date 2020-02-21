 <?php 
 if(empty($this->session->userdata('firstname')))
{
    redirect('Welcome');
}
?>
  <aside class="right-side">
    <!-- Main content section-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        Edit User
                    </header>
                    <div class="panel-body">
                         <div class="form-group ">
                                                       
                            </div>

                            <form class="form-horizontal tasi-form" id="valid"  method=post>
                                                               

                                <div class="form-group ">
                                <label   for="error" class="col-sm-2 col-sm-2 control-label"></label>
                                <div style="color: red" class="col-sm-10">
                                    <?php echo validation_errors()?>
                                </div>
                            </div>
                            <?php 
                                 foreach ($user as $row)
                                  {

                            ?>
                            <div class="form-group required">
                                <label for="firstname" class="col-sm-2 col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']; ?>">
                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="lastname" class="col-sm-2 col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="lastname" id="lastname" class="form-control"  minlength="3" maxlength="10" value="<?php echo ucwords($row['lastname'])?>">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="email" class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email"  name="email" id="email" class="form-control" value="<?php echo ucwords($row['email'])?>"> 
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b-10" name="city" id="city"  >
                                        <option value="<?php echo ucwords($row['city']) ?>"><?php echo ucwords($row['city']) ?></option>
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
                                    <input type="date"  name="dob" id="dob"  class="form-control" value="                                       <?php echo $row['dob']?>">
                                </div>
                            </div>
                             <div class="form-group required">
                                <label class="col-sm-2 col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b-10" name="is_admin" id="is_admin"  >
                                        <option value="<?php echo ucwords($row['is_admin']) ?>"><?php echo ucwords($row['is_admin']) ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10">
                                    
                                    <button type="submit" name="submit" value="submit" class="btn btn-info">Update</button>
                                   <?php echo anchor('user', 'Cancel', 'class="btn btn-default"') ?>

                                </div>
                            </div>
                            <?php
                                  }
                                                            
                             ?>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>