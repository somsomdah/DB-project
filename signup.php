<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>The Closet</title>
        <meta name="description" content="Premium eCommerce Template">

        <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7COswald:300,400,500,600,700" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/images/icons/favicon.png">

        <!-- Modernizr -->
        <script src="assets/js/modernizr.js"></script>
        <?php
        include "./assets/db/connect.php";
        ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
                include './header.php';
            ?>
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Sign Up</h1>
                                <p>Create a New Account</p>
                            </div><!-- End .page-header -->

                            <form action="assets/php/signup.php" class="signup-form" method="post">
                                <div class="row">
                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>First Name*</label>
		                                    <input type="text" class="form-control" name="first_name" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->

                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Last Name*</label>
		                                    <input type="text" class="form-control" name="last_name" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->

                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Email*</label>
		                                    <input type="email" class="form-control" name="email" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="row">
                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Password*</label>
		                                    <input type="password" class="form-control" name="password" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->

                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Phone*</label>
		                                    <input type="text" class="form-control" name="phone" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-primary min-width" value="SIGN Up">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->

                        <?php include "./sidemenu.php"; ?>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            
            <?php include "./footer.php"; ?>
        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>