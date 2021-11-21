<header class="header sticky-header">
    <div class="container">
        <a href="index.php" class="site-logo" title="The Closet">
            <!-- <img src="assets/images/logo.png" alt="Logo" style="height: 65px;"> -->
            <div style="font-size: 3rem; padding: 0 4rem; color: white; background-color: #222A35;">The Closet</div>
            <span class="sr-only">The Closet</span>
        </a>

        <div class="search-form-container">
            <!-- <a href="#" class="search-form-toggle" title="Toggle Search"><i class="fa fa-search"></i></a> -->
            <form action="./search.php" method="post">
                <input type="search" class="form-control" placeholder="Search" name="keyword" required>
                <button type="submit" title="Search" class="btn"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- End .search-form-container -->

        <ul class="top-links">
        <?php
            if ($_SESSION['id']){
                echo '<li><a href="purchase.php" style="text-transform:unset; color: #262634;">'.$_SESSION['email'].'</a></li><li><a href="./assets/php/logout.php">Logout</a></li>';
            }else{
                echo'<li><a href="signin.php">Sign In</a></li>';
            }
        ?>
            <li><a href="cart.php">Cart</a></li>
        </ul>

    </div><!-- End .container-fluid -->
</header><!-- End .header -->