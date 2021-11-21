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
                include './components/header.php';
            ?>
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Sign in</h1>
                                <p>Signin To Your Account</p>
                            </div><!-- End .page-header -->

                            <form action="assets/php/signin.php" class="signin-form" method="post">
                                <div class="form-group">
                                    <label>E-mail Address*</label>
                                    <input type="email" class="form-control" required name="email">
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" class="form-control" required name="password">
                                </div><!-- End .form-group -->

                                <div class="clearfix form-more">
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="remember">
                                            <span class="checkbox-box"><span class="check"></span></span>
                                            Remember Me
                                        </label>
                                    </div><!-- End .checkbox -->
                                    <a href="#" class="help-link">LOST YOUR PASSWORD?</a>
                                </div><!-- End .form-more -->

                                <div class="clearfix form-action">
                                    <a href="signup.php" class="btn btn-primary pull-left min-width">CREATE ACCOUNT</a>

                                    <input type="submit" class="btn btn-accent pull-right min-width" value="SIGN IN">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->

                        <?php include "./components/sidemenu.php"; ?>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            
            <?php include "./components/footer.php"; ?>
        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>