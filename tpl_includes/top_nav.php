
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <a class="navbar-brand" href="index.html">Online Braille Library</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="register.php">Register</a></li>
                <?php if ($pr->getSession('login') == $en->encode('TRUE') && $pr->getSession('level') == $en->encode('A')) { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="manage.php">Manage Site <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="upload_book.php">Upload Book</a></li>
                            <li><a href="manage_books.php">Manage Book</a></li>
                            <li><a href="manage_user.php">Manage User</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($pr->getSession('login') == $en->encode('TRUE') && $pr->getSession('level') == $en->encode('U')) { ?> <li><a href="my_account.php">My Account</a></li><?php } ?>
                <?php echo ($pr->getSession('login') == $en->encode('TRUE') ? "<li><a href='logout.php'>Log Out</a></li>" : "<li><a href='login.php'>Login</a></li>"); ?>
                <!--<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio</a>
                  <ul class="dropdown-menu">
                    <li><a href="portfolio-1-col.html">1 Column Portfolio</a></li>
                    <li><a href="portfolio-2-col.html">2 Column Portfolio</a></li>
                    <li><a href="portfolio-3-col.html">3 Column Portfolio</a></li>
                    <li><a href="portfolio-4-col.html">4 Column Portfolio</a></li>
                    <li><a href="portfolio-item.html">Single Portfolio Item</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="blog-home-1.html">Blog Home 1</a></li>
                    <li><a href="blog-home-2.html">Blog Home 2</a></li>
                    <li><a href="blog-post.html">Blog Post</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="full-width.html">Full Width Page</a></li>
                    <li><a href="sidebar.html">Sidebar Page</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="404.html">404</a></li>
                    <li><a href="pricing.html">Pricing Table</a></li>
                  </ul>
                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>