<?php
    session_start();
    include './assets/db/connect.php';
?>
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
                                <h1>Checkout</h1>
                                <p>Checkout Your Products</p>
                            </div><!-- End .page-header -->

                            <div class="checkout-tabs">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="confirmation">
                                        <div class="checkout-confirm">
                                            <img src="assets/images/okay.png" alt="Okay">
                                            <h3>Payment Complete</h3>
                                            <h4>Thank you for your order</h4>
                                            <p>We have sent you an email with all the details of your order to your email address.</p>
                                        </div><!-- End .checkout-confirm -->
                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->
                            
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