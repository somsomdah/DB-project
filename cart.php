<?php
session_start();
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
                                <h1>Shopping Cart</h1>
                                <p>Your cart items</p>
                            </div><!-- End .page-header -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        
                                        if($_SESSION['id']){
                                            $query = 'select Cart.id as cart_id, Product.id as product_id, name, image, price, count from Cart Inner Join Product On Cart.product_id=Product.id where user_id='.$_SESSION['id'];
                                            $res = mysqli_query($dbconn,$query);
                                            if(!$res){
                                                echo mysqli_error($dbconn);
                                            }
                                            $total=0;
                                            while($product = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                                echo '
                                                <tr>
                                                    <td class="product-col" style="width:105px;">
                                                        <div class="product">
                                                            <figure class="product-image-container">
                                                                <a href="product.php?id='.$product['product_id'].'">
                                                                    <img src="'.$product['image'].'" alt="Product" style="width:105px; height:115px;">
                                                                </a>
                                                            </figure>
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="product-col" style="width:265px;">
                                                        <div class="product">
                                                            <h3 class="product-title">
                                                                <a href="product.php?id='.$product['product_id'].'">'.$product['name'].'</a>
                                                            </h3>
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="price-col">$'.$product['price'].'</td>
                                                    <td class="quantity-col">
                                                        <input class="cart-product-quantity form-control" type="text" value="'.$product['count'].'">
                                                    </td>
                                                    <td class="total-col">$'.$product['price']*$product['count'].'</td>
                                                    <td class="delete-col"><a href="./assets/php/deletecart.php?cart_id='.$product['cart_id'].'" class="btn-delete" title="Delete product" role="button"></a></td>
                                                </tr>
                                                ';

                                                $total += $product['price']*$product['count'];
                                            }

                                        }else{
                                            echo "<script>alert('Please Login First');</script>";
                                            echo "<script> location.href = './signin.php'; </script>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div><!-- End .table-responsive -->

                            <div class="row">
                                <div class="col-sm-7">
                                    
                                </div><!-- End .col-sm-7 -->

                                <div class="col-sm-4 col-sm-offset-1">
                                    <div class="cart-proceed">
                                        <p class="cart-subtotal"><span>SUB TOTAL :</span><?php echo '$'.$total; ?></p>
                                        <p class="cart-total"><span>Grand TOTAL :</span> <span class="text-accent"><?php echo '$'.$total; ?></span></p>
                                        <form action="checkout.php" method="post">
                                            <?php echo '<input type="hidden" name="total" value="'.$total.'">';?>
                                            
                                            <?php if ($total>0){echo '<button class="btn btn-accent" type="submit">Proceed to Checkout</button>';}?>
                                           
                                        </form>
                                    </div><!-- Endd .cart-proceed -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->
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