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
                    <div class="page-header text-center">
                        <h1>Search</h1>
                        <p>Our Main Projects</p>
                    </div><!-- End .page-header -->

                    <ul class="portfolio-filter text-right">
                    </ul>

                    <div class="portfolio-row">
                        <div class="portfolio-container max-col-4">

                        <?php
                        $keyword = strtolower($_POST['keyword']);
                        $query = "select * from Product 
                                    where lower(concat(gender, master_category, sub_category,article_type,base_colour,season,style,name)) 
                                    like '%$keyword%'";
                        $res = mysqli_query($dbconn, $query);
                        if($res){
                            while($newArr = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                $image = $newArr['image'];
                                $name = $newArr['name'];
                                $price = $newArr['price'];
                                $view = $newArr['view'];
                                $id = $newArr['id'];

                                echo '
                                <div class="portfolio-item '.$newArr['sub_category'].'">
                                    <figure>
                                        <img src="'.$image.'" alt="Portfolio Image" style="height:25em">
                                        <a href="product.php?id='.$id.'" class="btn-detail" role="button">View Details</a>
                                    </figure>
                                    <div class="portfolio-meta">
                                        <h3 class="portfolio-title"><a href="product.php?id='.$id.'" title="Portfolio name">'.$name.'</a></h3>
                                        <div style="display:flex; justify-content: space-between;">
                                            <h4 class="portfolio-tags ">$'.$price.'</h4>
                                            <h4 class="portfolio-tags", style="font-size:0.5em; float:right;">view '.$view.'</h4>
                                        </div>
                                    </div><!-- End .portfolio-meta -->
                                </div><!-- End portfolio-item -->
                                ';
                            }
                        }
                        
                        ?>

                        </div><!-- End .portfolio-container -->
                    </div><!-- End .portfolio-row -->

                    <!-- <nav aria-label="Page Navigation">
                        <ul class="pagination">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li class="dots"><span>...</span></li>
                            <li><a href="#">18</a></li>
                        </ul>
                    </nav> -->
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