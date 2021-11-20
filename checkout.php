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
                                <!-- Nav tabs -->
                                <!-- <ul class="nav nav-tabs text-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Shipping</a></li>
                                    <li role="presentation"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><span>2</span>Payment</a></li>
                                    <li role="presentation"><a href="#confirmation" aria-controls="confirmation" role="tab" data-toggle="tab"><span>3</span>Confirmation</a></li>
                                </ul> -->

                                <!-- Tab panes -->
                                <form action="assets/php/checkout.php" method="post" onsubmit="return confirm('Continue checkout?')">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="shipping" style="border-bottom: 1px solid #e9e9ea">
                                            <div class="mb5"></div><!-- margin -->

                                            <h3>BILLING ADDRESS</h3>
                                            <hr>
                                            <div class="mb15"></div><!-- margin -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Full Name*</label>
                                                            <input type="text" class="form-control" name="name" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Address*</label>
                                                            <input type="text" class="form-control" name="address" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Address 2*</label>
                                                            <input type="text" class="form-control" name="address2" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->
                                                </div><!-- End .row -->

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>City*</label>
                                                            <input type="text" class="form-control" name="city" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>State*</label>
                                                            <select class="form-control custom-select" name="state">
                                                                <option value="Texas">Texas</option>
                                                                <option value="New york">Canada</option>
                                                                <option value="California">California</option>
                                                            </select>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Zip code*</label>
                                                            <input type="text" class="form-control" name="zipcode" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->
                                                </div><!-- End .row -->
                                        </div><!-- End .tab-pane -->
                                        <div role="tabpanel" class="tab-pane active" id="payment">
                                            <div class="tab-header">
                                                <h4>Payment Method:</h4>
                                                <div class="radio-inline-container">
                                                    <img src="assets/images/payment-card.png" alt="Card" class="radio-img">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="payment-option" checked data-target=".payment-card">
                                                            <span class="check"></span>
                                                            <span class="circle"></span>
                                                            Credit Card
                                                        </label>
                                                    </div><!-- End .radio -->
                                                </div><!-- End .radio-inline-container -->
                                            </div><!-- End .tab-header -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Name on Card*</label>
                                                            <input type="text" class="form-control" name="cardname" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Card number*</label>
                                                            <input type="text" class="form-control form-with-icon" name="cardnumber" placeholder="0000-0000-0000-0000" required>

                                                            <img src="assets/images/icon-input-card.png" alt="Card" class="form-icon">
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>CVV number*</label>
                                                            <input type="text" class="form-control form-with-icon" name="cvvnumber" required>
                                                            <span class="form-icon">
                                                                <img src="assets/images/icon-input-info.png" alt="Card">
                                                            </span>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Exp. Month*</label>
                                                            <select class="form-control custom-select" name="month">
                                                                <option value="Month">Month</option>
                                                                <option value="January">January</option>
                                                                <option value="February">February</option>
                                                            </select>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Exp. Year*</label>
                                                            <select class="form-control custom-select">
                                                                <option value="Year">Year</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                            </select>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-4 -->
                                                </div><!-- End .row -->

                                                <div class="clearfix form-action">
                                                    <div class="btn-wrap pull-right">
                                                        <span class="btn-payment-info">$<?php echo $_POST['total'];?></span>
                                                        <input type="submit" class="btn btn-accent" value="Pay Now">
                                                    </div><!-- End .btn-wrap -->
                                                </div><!-- End .form-action -->

                                            <div class="payment-paypal target-area">
                                                <h3>Sorry Paypal is not available now.</h3>
                                                <p>Please Try again later or use your credit card to pay.</p>
                                            </div><!-- End .check-as-guest -->
                                        </div><!-- End .tab-pane -->
                                        <div role="tabpanel" class="tab-pane" id="confirmation">
                                            <div class="checkout-confirm">
                                                <img src="assets/images/okay.png" alt="Okay">
                                                <h3>Payment Complete</h3>
                                                <h4>Thank you for your order</h4>
                                                <p>We have sent you an email with all the details of your order to your email address.</p>
                                            </div><!-- End .checkout-confirm -->
                                        </div><!-- End .tab-pane -->
                                    </div>
                                </form>
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