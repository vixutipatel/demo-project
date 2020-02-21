<?php if(empty($this->session->userdata('firstname')))
{
    redirect('Welcome');

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sample Admin Panel | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="vixuti patel">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- bootstrap 3.0.2 -->
  
        <link  media='all' href="<?php echo base_url();?>application/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>application/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- datatables jquery -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <!-- font Awesome -->
        <link href="<?php echo base_url('application/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- jquery css-->
        <link href="<?php echo base_url('application/css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />

<!-- jquery css  1.12.1-->
        <link href="<?php echo base_url('application/jquery-ui-1.12.1.custom/jquery-ui.theme.css')?>" rel="stylesheet" type="text/css" />


        <!-- Ionicons -->
        <link href="<?php echo base_url('application/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('application/css/morris/morris.css')?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url('application/css/jvectormap/jquery-jvectormap-1.2.2.css')?>" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url('application/css/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <!-- <link href="<?php echo BASE_URL; ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
        <!-- Daterange picker -->
        <link href="<?php echo base_url('application/css/daterangepicker/daterangepicker-bs3.css')?>" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?php echo base_url('application/css/iCheck/all.css')?>" rel="stylesheet" type="text/css" />



        <!-- bootstrap wysihtml5 - text editor -->
        <!-- <link href="<?php echo BASE_URL; ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="<?php echo base_url('application/css/style.css')?>" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="<?php echo base_url();?>application/css/bootstrap.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=site_url('dashboard')?>" class="logo">
                Sample Admin Panel
            </a>

            <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                                <span> <?=$this->session->userdata('firstname')?>  <?=$this->session->userdata('lastname')?></span>
                               <!-- <span><?php echo ucwords($_SESSION['username']);  ?><i class="caret"></i></span>
                               -->
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                  <a href="<?= base_url();?>index.php/Welcome/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                 
                                </li>
                            </ul>
                           
                        </li>
                    </ul>
                </div>
            </nav>
        
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>application/img/26115.jpg" class="img-circle" alt="User Image" />

                        </div>
                        
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">

                            <a href="<?=site_url('dashboard')?>">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?=site_url('user')?>">
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                          <!--  <a href="<?php echo ADMIN_URL.'categories/' ?>"> -->
                                <a href="#">
                                <span>Categories</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        
