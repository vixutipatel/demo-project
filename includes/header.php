<?php 
require_once 'config.php';
require_once 'connection.php';

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Sample Admin Panel | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="vixuti patel">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
         <link href="<?php echo BASE_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo BASE_URL; ?>css/bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- datatables jquery -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <!-- font Awesome -->
        <link href="<?php echo BASE_URL; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- jquery css-->
        <link href="<?php echo BASE_URL; ?>css/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- jquery css  1.12.1-->
        <link href="<?php echo BASE_URL; ?>jquery-ui-1.12.1.custom/jquery-ui.theme.css" rel="stylesheet" type="text/css" />

        <!-- Ionicons -->
        <link href="<?php echo BASE_URL; ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo BASE_URL; ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo BASE_URL; ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo BASE_URL; ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <!-- <link href="<?php echo BASE_URL; ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
        <!-- Daterange picker -->
        <link href="<?php echo BASE_URL; ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?php echo BASE_URL; ?>css/iCheck/all.css" rel="stylesheet" type="text/css" />



        <!-- bootstrap wysihtml5 - text editor -->
        <!-- <link href="<?php echo BASE_URL; ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="<?php echo BASE_URL; ?>css/style.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap 3.0.2 -->

      
        
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../dashboard/index.php" class="logo">
                Sample Admin Panel
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo ucwords($_SESSION['username']);  ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                    <a href="<?php echo ADMIN_URL.'auth/index.php?action=logout'; ?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
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
                            <img src="<?php echo BASE_URL; ?>img/26115.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo ucwords($_SESSION['username']);  ?></p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="../dashboard/index.php">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_URL.'users/index.php' ?>">
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_URL.'categories/index.php' ?>">
                                <span>Categories</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        </body>