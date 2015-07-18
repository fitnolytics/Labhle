<?php
ob_start();

if(!isset($_SESSION["id"])){

    if(isset($_POST["submit"])){
        require "db.php";

        $username = test_input($_POST["username"]);
        $password = md5(test_input($_POST["password"]));
        
        if(!empty($username)&&!empty($password)){
                
            $connectionStatu = connect_db();
            $status = find_user($connectionStatu, $username, $password);

            if(is_array($status)){
                
                $_SESSION["id"] = $status["id"];
                $_SESSION["user"] = $status["fname"]." ".$status["lname"];
                $_SESSION["username"] = $username;
                header("Location: success.php");

            }else{

                $message = " Incorrect username/password ";  

            }
        }else{

            $message = " All fields mandatory ";

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

    <title>Employee management | TryKit</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


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

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action = "<?php $_SERVER['SCRIPT_NAME']; ?>" method="post">
                        <h1>Login</h1>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" maxlength="30" value="<?php if(isset($username)) { echo $username; } ?>" required="" autofocus>
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" value="" placeholder="Password" required="">
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" name="submit" value="submit">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                            <div class="clearfix"></div>
                            <span class="alert-danger "> <?php echo $message;?> </span>
                            <h4>Don't have account??</h4><h5> Contact concern department for user-id authentication!!</h5>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <br />
                            <div>
                                <h1><i class="fa fa-try" style="font-size: 26px;"></i> TryKit</h1>

                                <p>©2015 All Rights Reserved. TryKit is a testing lab of rohit. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>
<?php
}else
{
    echo '<h3>You\'re already logged in.</h3><p>Redirecting to your Profile...</p>';
    header("Refresh: 2; URL=index.php");
}
?>