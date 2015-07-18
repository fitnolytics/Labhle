<?php
ob_start();
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] !="admin" ){
	$id = $_SESSION["id"];
    include 'db.php';
    $connectionStatu = connect_db();
    $query="SELECT * FROM `users` WHERE id = '$id' ";
    
    $result = mysqli_query($connectionStatu,$query);
    $results = mysqli_fetch_assoc($result);
    if(is_array($results)){
        $fname = $results["fname"];
        $lname = $results["lname"];
        $email = $results["email"];
        $mphone = $results["mphone"];
        $gender = $results["gender"];
        $dob = $results["dob"];
        $username_o = $results["username"];
        $address = $results["address"];
        $emphone = $results["emphone"];
        $type = $results["type"];
        $intern_time = $results["intern_time"];
        $join_date = $results["join_date"];
        $work_field = $results["work_field"];
        $work_pos = $results["work_pos"];
        $team_id = $results["team_id"];
        $salary = $results["salary"];
    }

        if(isset($_POST["submit"]))
        {

            
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $email = test_input($_POST["email"]);
            $mphone = test_input($_POST["mphone"]);
            $gender = test_input($_POST["gender"]);
            $dob = test_input($_POST["dob"]);
            $username_n = test_input($_POST["username_n"]);
            //$password = md5(test_input($_POST["password"]));
            $address = test_input($_POST["address"]);
            $emphone = test_input($_POST["emphone"]);
            //$type = test_input($_POST["type"]);
            //$intern_time = test_input($_POST["intern_time"]);
            //$join_date = test_input($_POST["join_date"]);
            //$work_field = test_input($_POST["work_field"]);
            //$work_pos = test_input($_POST["work_pos"]);
            //$team_id = test_input($_POST["team_id"]);
            //$salary = test_input($_POST["salary"]);

            if(!empty($fname)
                &&!empty($email)
                &&!empty($mphone))
            {

                $connectionStatu = connect_db();

                $member = is_member($connectionStatu, $username_n);                

                if(($username_n == $username_o)||($member == false)){
                    $id = $_SESSION["id"];
                    $status = update_user($connectionStatu, $id, $fname, $lname, $email, $mphone, $gender, $dob, $username_n, $address, $emphone);

                    if($status == true){

                        $message = "Successfully Edited!!";

                    }else{

                        $message = "An error has occured. Cannot make any change at this moment. Please try again.";  
                    }

                }else{

                    $message = "Username: <strong>".$username_n."</strong> already exists";
                }

            }else{

                $message = "All fields marked with * is mandatory";  
            }

        }else{

            $message="";
        }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>Edit Profile</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <!-- select2 -->
    <link href="css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="css/switchery/switchery.min.css" />

    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-try"></i> <span>TryKit</span></a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Rohit Gupta</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <!--<h3>General</h3>-->
                            <ul class="nav side-menu">
                                <li ><a href="index.php"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <!--
                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="form.html">General Form</a>
                                        </li>
                                        <li><a href="form_advanced.html">Advanced Components</a>
                                        </li>
                                        <li><a href="form_validation.html">Form Validation</a>
                                        </li>
                                        <li><a href="form_wizards.html">Form Wizard</a>
                                        </li>
                                        <li><a href="form_upload.html">Form Upload</a>
                                        </li>
                                        <li><a href="form_buttons.html">Form Buttons</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="general_elements.html">General Elements</a>
                                        </li>
                                        <li><a href="media_gallery.html">Media Gallery</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="icons.html">Icons</a>
                                        </li>
                                        <li><a href="glyphicons.html">Glyphicons</a>
                                        </li>
                                        <li><a href="widgets.html">Widgets</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="inbox.html">Inbox</a>
                                        </li>
                                        <li><a href="calender.html">Calender</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="tables.html">Tables</a>
                                        </li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="chartjs.html">Chart JS</a>
                                        </li>
                                        <li><a href="chartjs2.html">Chart JS2</a>
                                        </li>
                                        <li><a href="morisjs.html">Moris JS</a>
                                        </li>
                                        <li><a href="echarts.html">ECharts </a>
                                        </li>
                                        <li><a href="other_charts.html">Other Charts </a>
                                        </li>
                                    </ul>
                                </li>-->
                            </ul>
                        </div>
                        <!--
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="e_commerce.html">E-commerce</a>
                                        </li>
                                        <li><a href="projects.html">Projects</a>
                                        </li>
                                        <li><a href="project_detail.html">Project Detail</a>
                                        </li>
                                        <li><a href="contacts.html">Contacts</a>
                                        </li>
                                        <li><a href="profile.html">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="page_404.html">404 Error</a>
                                        </li>
                                        <li><a href="page_500.html">500 Error</a>
                                        </li>
                                        <li><a href="plain_page.html">Plain Page</a>
                                        </li>
                                        <li><a href="login.html">Login Page</a>
                                        </li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                                </li>
                            </ul>
                             -->
                        </div>
                       

                    </div>
                    <!-- sidebar menu -->

                    <!-- /menu footer buttons 
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">Admin name
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="profile.php">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="help.php">Help</a>
                                    </li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="page-title">
                            <div class="title_left ">
                                <h3>Edit Your Details</h3>
                            </div>
                        </div>
                    </div>

                    <?php 
                    if($message)
                    {       
                        if($message=="Successfully Edited!!")
                        {
                        echo '<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-thumbs-o-up"></i>&nbsp;&nbsp;'?> <?php echo $message;?>
                            <?php echo '</div>
                        </div>';
                        }else{
                            echo '<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Oh ho!</strong>'?> <?php echo $message;?>
                            <?php echo '</div>
                        </div>';
                        }
                    }
                    ?>
                    
                </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>All details<small>few details are un-editable</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action = "<?php $_SERVER['SCRIPT_NAME']; ?>">

                                        <div class="form-group">
                                            <span class="control-label col-md-3 col-sm-6 col-xs-12"></span>
                                            <div class="col-md-4 col-sm-3 col-xs-12 form-group has-feedback">
                                                <input type="text" name="fname" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name" maxlength="20" value="<?php if(isset($fname)) { echo $fname; } ?>">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <span class="control-label col-md-1 col-sm-6 col-xs-12"></span>
                                            <div class="col-md-4 col-sm-3 col-xs-12 form-group has-feedback">
                                                <input type="text" name="lname" required="required" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Last Name" maxlength="20" value="<?php if(isset($lname)) { echo $lname; } ?>">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <span class="control-label col-md-3 col-sm-6 col-xs-12"></span>
                                            <div class="col-md-4 col-sm-3 col-xs-12 form-group has-feedback">
                                                <input type="email" name="email" required="required" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" maxlength="30" value="<?php if(isset($email)) { echo $email; } ?>">
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <span class="control-label col-md-1 col-sm-6 col-xs-12"></span>
                                            <div class="col-md-4 col-sm-3 col-xs-12 form-group has-feedback">
                                                <input type="text" name="mphone" required="required" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Phone" maxlength="10" value="<?php if(isset($mphone)) { echo $mphone; } ?>">
                                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                                                                

                                    
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-6 col-xs-12">Gender</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div id="gender" class="btn-group" data-toggle="buttons">
                                                        M:<input type="radio" class="flat" name="gender" id="genderM" value="0" checked="" required />
                                                        F:<input type="radio" class="flat" name="gender" id="genderF" value="1"/>
                                                </div>
                                            </div>

                                            <label class="control-label col-md-1 col-sm-6 col-xs-12">Date of birth <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-3 col-xs-12">
                                                <input id="birthday" name="dob" class="date date-picker form-control col-md-7 col-xs-12" required="required" placeholder='e.g. 06/30/2015' type="text" value="<?php if(isset($dob)) { echo $dob; } ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="username_n" class="form-control" value="<?php if(isset($username_n)){ echo $username_n; }else{if(isset($username_o)){ echo $username_o;}}?>">
                                            </div>
                                        </div>

                                        <!--<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="password" name="password"class="form-control" placeholder="●●●●●●●●● (should be alpha numeric)">
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea name="address" class="form-control" rows="3" maxlength="200" ><?php if(isset($address)) { echo $address; } ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Phone Number</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="emphone" class="form-control" placeholder="If any" maxlength="10" value="<?php if(isset($emphone)) { echo $emphone; } ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Intern or Fulltime</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12" >
                                                <select name="type" readonly="readonly" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="0">Intern</option>
                                                    <option value="1">Fulltime</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Intern time</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12" >
                                                <select name="intern_time" class="form-control" readonly="readonly">
                                                    <option value="0">Select Number of months</option>
                                                    <option value="1">1 months</option>
                                                    <option value="2">2 months</option>
                                                    <option value="3">3 months</option>
                                                    <option value="4">4 months</option>
                                                    <option value="5">5 months</option>
                                                    <option value="6">6 months</option>
                                                    <option value="7">7 months</option>
                                                    <option value="8">8 months</option>
                                                    <option value="9">9 months</option>
                                                    <option value="10">10 months</option>
                                                    <option value="11">11 months</option>
                                                    <option value="12">12 months</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Joining date<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="join_date" name="join_date" readonly="readonly" class="date date-picker form-control col-md-7 col-xs-12" required="required" placeholder='e.g. 06/30/2015' type="text" value="<?php if(isset($join_date)) { echo $join_date; } ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Field</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="work_field" class="form-control" readonly="readonly" placeholder="hello">
                                                    <option value="">Select field</option>
                                                    <option value="Tech">Tech</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Designing">Designing</option>
                                                    <option value="Photography">Photography</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Position</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="work_pos" class="form-control" readonly="readonly" placeholder="hello">
                                                    <option value="">Select Position</option>
                                                    <option value="Head">Head</option>
                                                    <option value="Senoir Engg">Senoir Engg</option>
                                                    <option value="Project manager">Project manager</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Team</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="team_id" class="form-control" readonly="readonly" placeholder="hello">
                                                    <option>Select team name</option>
                                                    <option value=1>Team A</option>
                                                    <option value=2>Team B</option>
                                                    <option value=3>Team C</option>
                                                    <option value=4>Team D</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="salary" readonly="readonly" class="form-control" placeholder="If any" maxlength="10" value="<?php if(isset($salary)) { echo $salary; } ?>">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <input type="submit" name="submit" value="Save" class="btn btn-success">
                                                <a href="index.php"><input type="button" value="Cancel" class="btn btn-primary"></a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.date').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_3"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>


                    
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Employee management system by Rohit & Krishna. |
                            <span class="lead"> <i class="fa fa-try"></i> TryKit</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>

        </div>
    </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
        <!-- tags -->
        <script src="js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="js/moment.min2.js"></script>
        <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
        <script src="js/editor/bootstrap-wysiwyg.js"></script>
        <script src="js/editor/external/jquery.hotkeys.js"></script>
        <script src="js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
        <script src="js/select/select2.full.js"></script>
        <!-- form validation -->
        <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="js/autocomplete/countries.js"></script>
        <script src="js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <script src="js/custom.js"></script>


        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /select2 -->
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->
        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                            return false;
                        })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                            target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                };

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                };
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!-- /editor -->

</body>
</html>
<?php
}else{
    header("Location: index.php");
}?>