<?php
include('include/include.php');
$query = "SELECT * FROM book_store WHERE status=1";
$books = '';
if ($query) {



    $pg_param = "&q=value"; // Ex: &q=value

    $books = $pg->setpagination($query, $num_results_per_page, $num_page_links_per_page, $pg_param);

    //$link = $pg->Create_Links($rid, $key);
    $rid = '';
    $key = '';
    $link = $pg->Create_Links($rid, $key);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'tpl_includes/in_head.php'; ?>
    </head>

    <body>
        <?php include 'tpl_includes/top_nav.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library<small>Brouse all book here</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Library</li>
                    </ol>
                </div>
            </div>
            <div id="search_form" class="row text-center">
                <div class="col-lg-12">
                    <div class="input-group col-lg-8 input-group-lg">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="button">Search Book <span class="glyphicon glyphicon-search"></span></button>
                        </span> </div>
                    <!-- /input-group --> 
                </div>
                <!-- /.col-lg-6 --> 
            </div>
            <?php
            if ($books) {
                foreach ($books as $bk) {
                    ?>
                    <div class="row">
                        <div class="col-md-3"> <a href="portfolio-item.html"><img class="img-responsive" src="<?php echo ($bk->cover_image_path ? $IMAGE_PATH . "original/" . $bk->cover_image_path : "http://placehold.it/200x250") ?>" width="200" height="250"></a> </div>
                                                                                  <div class="col-md-9">
                                                                                  <h4><strong>Title : <?php echo $bk->book_name_or_publication ?></strong></h4>
                                <p><strong>Isbn:</strong> <?php echo $bk->isbn ?></p>
                                <p><strong>Auther:</strong> <?php echo $bk->author_or_translater ?></p>
                                <p><strong>Dicription:</strong><?php echo $bk->book_description ?></p>
                                <a class="btn btn-primary" href="">View More Details&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a> <a class="btn btn-primary" href="">Read Book &nbsp;&nbsp;<i class="fa glyphicon-headphones"></i></a> </div>
                    </div>
                    <hr>
                    <?php
                }
            }
            ?>
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination pagination-lg">
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only"></span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <div class="container">
            <hr>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Company 2013</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /.container --> 

        <!-- Bootstrap core JavaScript --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.js"></script> 
        <script src="js/modern-business.js"></script>
    </body>
</html>