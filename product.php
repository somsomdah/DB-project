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
        <?php

        $id = $_GET["id"];
        $query = "select * from Product where id=".$id;
        $res = mysqli_query($dbconn,$query);
        if(!$res){
            echo "<script>alert('error: ".mysqli_error($dbconn).');</script>"';
        }
        $product = mysqli_fetch_array($res,MYSQLI_ASSOC);
        $query2 = "update Product set view=view+1 where id=".$id;
        $res2 = mysqli_query($dbconn,$query2);
        if(!$res2){
            echo "<script>alert('error: ".mysqli_error($dbconn).');</script>"';
        }


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

                            <div class="row">
                                <div class="product-gallery-container">
                                    <div class="product-zoom-wrapper">
                                        <div class="product-zoom-container">
                                            <?php
                                            echo '<img class="xzoom" id="product-zoom" src="'.$product['image'].'" data-xoriginal="'.$product['image'].'" alt="Zoom image"/>';
                                            ?>
                                        
                                        </div><!-- End .product-zoom-container -->
                                    </div><!-- End .product-zoom-wrapper -->

                                </div><!-- End .product-gallery-container -->

                                <div class="product-details">
                                    <h2 class="product-title"><?php echo $product['name']; ?></h2>
                                    
                                    <div class="product-meta-row">
                                        <div class="product-price-container">
                                            <span class="product-price"><?php echo '$'.$product['price'];?></span>
                                        </div><!-- Endd .product-price-container -->

                                        <div class="product-ratings-wrapper">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <?php
                                                    $query = 'select avg(rate) as avg from Review where product_id='.$product['id'];
                                                    $res = mysqli_query($dbconn, $query);
                                                    $avg_rate=0;
                                                    if(mysqli_num_rows($res)){
                                                        $avg_rate = mysqli_fetch_array($res,MYSQLI_ASSOC);
                                                    }
                                                    echo '<span class="ratings" style="width:'.($avg_rate['avg']*20).'%"></span>';
                                                    ?>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->
                                            <?php
                                            $query = 'select count(*) as count from Review where product_id='.$product['id'];
                                            $res = mysqli_query($dbconn, $query);
                                            $review_count=0;
                                            if(mysqli_num_rows($res)){
                                                $review_count = mysqli_fetch_array($res,MYSQLI_ASSOC);
                                            }
                                            echo '<a class="ratings-link" href="#reviews" title="Reviews">'.$review_count['count'].' Reviews</a>';
                                            ?>
                                        </div><!-- End .product-ratings-wrapper -->
                                    </div><!-- End .product-meta-row -->
                                    <div class="product-content">
                                        <p style="text-align: justify;">
                                        &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh lectus, 
                                        pretium in purus lacinia, tristique egestas turpis. Mauris blandit felis eu sem fringilla, 
                                        vel congue orci congue. Sed eget auctor velit. Aliquam in lectus lectus. 
                                        Maecenas eu mi eu mauris viverra sollicitudin. Etiam neque tellus, sagittis vel leo ut, 
                                        lacinia sagittis diam. Donec nec sagittis lacus. Sed bibendum laoreet massa sed ultricies. 
                                        <br/>
                                        &nbsp;&nbsp;Cras facilisis elit a lobortis dictum. 
                                        Quisque tortor magna, aliquet a felis vel, dapibus mattis lorem. 
                                        Quisque dapibus facilisis feugiat. Curabitur aliquam risus nec porttitor pretium. 
                                        </p>
                                    </div><!-- End .product-content -->
                                    <form action="assets/php/addcart.php" method="post">
                                        <div class="product-action">
                                            <div class="product-quantity">
                                                <label>QTD:</label>
                                                <input class="single-product-quantity form-control" type="text" name="count">
                                                <?php
                                                echo '<input type="hidden" name="product_id" value="'.$product['id'].'">'
                                                ?>
                                            </div><!-- end .product-quantity -->
                                            <button type="submit" class="btn btn-accent btn-addtobag">Add to Bag</button>
                                        </div><!-- End .product-action -->
                                    </form>
                                </div><!-- End .product-details -->
                            </div><!-- End .row -->

                            <div class="product-details-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="reviews">
                                        <div class="product-reviews comments">
                                            <ul class="comments-list media-list">
                                                <li class="media">
                                                    <?php
                                                    $query = "select Review.id as review_id, email, time,rate,content from Review, User where Review.user_id=User.id and Review.product_id=".$product['id'];
                                                    $res = mysqli_query($dbconn,$query);
                                                    if(!$res){
                                                        echo '<script>alert("error: '.mysqli_error($dbconn).'");</script>';
                                                    }
                                                    while($review=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                                        echo '
                                                        <div class="comment">
                                                            <div class="media-left">
                                                                <img class="media-object" src="assets/images/blog/user.png" alt="User">
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">'.$review['email'].' 
                                                                    <span style="font-size: 11px; color: gray; font-weight: 500;">'.$review['time']. '</span>
                                                        ';
                                                            
                                                        if ($_SESSION['email']==$review['email']){
                                                            echo  '
                                                            <a style="font-size: 11px; color: #dc9831; font-weight: 500;" href="assets/php/deletereview.php?review_id='.$review['review_id'].'">[delete]</a>
                                                            ';
                                                        }

                                                        echo '
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="product-ratings">
                                                                        <span class="ratings" style="width:'.($review['rate']*20).'%"></span><!-- End .ratings -->
                                                                    </div>
                                                                </div>
                                                                <p>'.$review['content'].'</p>
                                                            </div>
                                                        </div>
                                                        ';
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div><!-- End .comments -->
                                        <div class="review-form-container">
                                            <h3>LEAVE A REVIEW</h3>
                                            <form action="assets/php/addreview.php" method="post"> 
                                                <label>Your Rating*</label>
                                                <div class="form-group clearfix">
                                                    <fieldset class="rate-field">
                                                        <input type="radio" id="star5" name="rating" value="5" checked>
                                                        <label for="star5" title="5 stars"></label>

                                                        <input type="radio" id="star4" name="rating" value="4">
                                                        <label for="star4" title="4 stars"></label>

                                                        <input type="radio" id="star3" name="rating" value="3">
                                                        <label for="star3" title="3 stars"></label>

                                                        <input type="radio" id="star2" name="rating" value="2">
                                                        <label for="star2" title="2 stars"></label>

                                                        <input type="radio" id="star1" name="rating" value="1">
                                                        <label for="star1" title="1 star"></label>
                                                    </fieldset>
                                                </div><!-- End .form-group -->

                                                <div class="form-group mb20">
                                                    <label>Your Review*</label>
                                                    <textarea cols="30" name="content" rows="5" class="form-control" name="content"></textarea>
                                                </div>

                                                <div class="text-right">
                                                    <?php
                                                    echo '<input type="hidden" name="product_id" value="'.$product['id'].'">';
                                                    ?>
                                                    <input type="submit" class="btn btn-accent min-width" value="Submit">
                                                </div><!-- End .text-right -->
                                            </form>
                                        </div><!-- End #respond -->
                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->
                            
                            <h3 class="carousel-title">Also Purchased</h3>
                            <div class="owl-data-carousel owl-carousel"
                            data-owl-settings='{ "items":4, "nav": true, "dots":false }'
                            data-owl-responsive='{ "480": {"items": 2}, "768": {"items": 3}, "992": {"items": 3}, "1200": {"items": 4} }'>
                                
                                <?php
                                $query = "select id, image, name, price from Product,
                                            (select p1.product_id as p1id, p2.product_id as p2id, count(*) as c 
                                            from Purchase as p1, Purchase as p2 
                                            where p1.product_id <> p2.product_id and p1.user_id = p2.user_id and p1.time = p2.time and p1.product_id=".$product['id']."
                                            group by p1id, p2id order by c desc limit 5) as r
                                            where r.p2id=id;
                                            ";
                                $res = mysqli_query($dbconn,$query);
                                if(!$res){
                                    echo '<script>alert("error: '.mysqli_error($dbconn).'");</script>';
                                }
                                while($product=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                    echo '
                                    <div class="product">
                                        <figure class="product-image-container">
                                            <a href="product.php?id='.$product['id'].'" title="Product Name" class="product-image-link">
                                                <img class="owl-lazy" src="assets/images/blank.png" data-src="'.$product['image'].'" alt="Product Image">
                                            </a>
                                            <a href="product.php?id='.$product['id'].'" class="btn-quick-view">Quick View</a>
                                        </figure>
                                        <h3 class="product-title">
                                            <a href="product.php?id='.$product['id'].'">'.$product['name'].'</a>
                                        </h3>
                                        <div class="product-price-container">
                                            <span class="product-price">$'.$product['price'].'</span>
                                        </div><!-- Endd .product-price-container -->
                                    </div><!-- End .product -->
                                    ';
                                }
                                ?>
                            
                            </div><!-- End .owl-data-carousel -->

                            <div class="mb50"></div><!-- margin -->
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
        <script src="assets/js/xzoom.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>