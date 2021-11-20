<aside class="col-md-3 col-md-pull-9 sidebar sidebar-shop" style="background: #e9e9ea; padding-top: 25px; width: 20%;">
    <div class="widget widget-newsletter" style="margin-bottom: 0;">
        <h3 class="widget-title" >Populars</h3>
    </div><!-- End .widget -->

    <?php
    $query = 'select * from 
                (select product_id, price, name, image, count(*) as c 
                from Product, Purchase 
                where Product.id=Purchase.product_id 
                group by product_id 
                order by c desc 
                limit 10) as t 
            order by rand() limit 3';

    $res = mysqli_query($dbconn,$query);
    if(!$res){
        echo mysqli_error($dbconn);
    }
    while($product = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        echo '
        <div class="product-item" style="border-bottom: 1px solid #ffffff; padding-top:10px">
            <div class="product">
                <figure class="product-image-container">
                    <a href="product.php?id='.$product['product_id'].'" title="Product Name" class="product-image-link">
                        <img src="'.$product['image'].'" alt="Product Image">
                    </a>
                    <a href="product.php?id='.$product['product_id'].'" class="btn-quick-view">Quick View</a>
                </figure>
                <h3 class="product-title">
                    <a href="product.php?id='.$product['product_id'].'">'.$product['name'].'</a>
                </h3>
                <div class="product-price-container">
                    <span class="product-price">$'.$product['price'].'</span>
                </div><!-- Endd .product-price-container -->
            </div><!-- End .product -->
            </div>
        ';
    }
    ?>

    <div class="widget widget-newsletter" style="margin-top:20px;"> 
        <h3 class="widget-title">Newsletter</h3>
        <p>Enter your email address below to subscribe to my newsletter</p>

        <form action="#">
            <div class="form-group">
                <img src="assets/images/icon-newsletter-email.png" alt="Email">
                <input type="email" class="form-control" placeholder="Email Address" required>
            </div><!-- End .form-group -->
            <input type="button" value="subscribe now" class="btn btn-block">
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-testimonial">
        <div class="owl-data-carousel owl-carousel"
        data-owl-settings='{ "items":1, "margin": 5, "loop": false, "nav": false, "dots":true }'>
            <div class="testimonial">
                <img src="assets/images/testimonials/user1.png" alt="User image">
                <h5 class="testimonial-owner">John Smith</h5>
                <div class="testimonial-owner-position">Ceo &amp; Founder Okler</div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div><!-- End .testimonial -->

            <div class="testimonial">
                <img src="assets/images/testimonials/user2.png" alt="User image">
                <h5 class="testimonial-owner">Susan Smith</h5>
                <div class="testimonial-owner-position">CPO &amp; Co-Founder</div>
                <p>Distinctio, corrupti nesciunt aperiam, eaque, reiciendis dummy consequunt.</p>
            </div><!-- End .testimonial -->

            <div class="testimonial">
                <img src="assets/images/testimonials/user3.png" alt="User image">
                <h5 class="testimonial-owner">David Lee</h5>
                <div class="testimonial-owner-position">Senior Developer</div>
                <p>Adipisci esse nobis alias magnam dolores debitis non odit porro nost.</p>
            </div><!-- End .testimonial -->
        </div><!-- End .owl-data-carousel -->
    </div><!-- End .widget -->
</aside><!-- End .col-md-3 -->
