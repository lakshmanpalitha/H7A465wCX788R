<?php
include('include/include.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'tpl_includes/in_head.php'; ?>
    </head>

    <body>
        <?php include 'tpl_includes/in_head.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Book <small>For Deeper Customization</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">manage user</li>
                    </ol>
                </div>
            </div>
            <?php
            $errors = '';
            $success = "none";
            $failed = "none";

            $ob = $er->displayerror();
            if (($ob->error_code == 0 ) && $ob->error) {
                $errors = $ob->error;
                $success = "block";
                $failed = "none";
            } else if (($ob->error_code == 1 ) && $ob->error) {
                $errors = $ob->error;
                $success = "none";
                $failed = "block";
            }
            ?>
            <div class="col-md-9 col-sm-8">
                <div class="alert alert-success" style="display:<?php echo $success ?>">
                    <?php echo $errors ?>
                </div>
                <div class="alert alert-danger" style="display:<?php echo $failed ?>">
                    <?php echo $errors ?>
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
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Book ID:</th>
                                    <th>Book Title:</th>
                                    <th>ISBN:</th>
                                    <th>Auther:</th>
                                    <th>(DTB)</th>
                                    <th>Ppublication:</th>
                                    <th>Action:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM book_store";
                                $books = '';
                                if ($query) {



                                    $pg_param = "&q=value"; // Ex: &q=value

                                    $books = $pg->setpagination($query, $num_results_per_page, $num_page_links_per_page, $pg_param);

                                    //$link = $pg->Create_Links($rid, $key);
                                    $rid = '';
                                    $key = '';
                                    $link = $pg->Create_Links($rid, $key);

                                    echo $link;
                                }
                                if ($books) {
                                    foreach ($books as $bk) {
                                        ?>
                                        <tr>
                                            <td><?php echo $bk->book_id ?></td>
                                            <td><?php echo $bk->book_name_or_publication ?></td>
                                            <td><?php echo $bk->isbn ?></td>
                                            <td><?php echo $bk->author_or_translater ?></td>
                                            <td><?php echo $bk->digital_talking_book_publisher ?></td>
                                            <td><?php echo $bk->original_publisher ?></td>
                                            <td><a href="" class="label label-primary">Edit <span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="" class="label label-danger">Block <span class="glyphicon glyphicon-lock"></span></a>
                                            <a href="" class="label label-success">Active<span class="glyphicon glyphicon-ok"></span></a>
                                                            <a href="" class="label label-danger">Delete <span class="glyphicon glyphicon-lock"></span></a>

                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>

                            </tbody>
                        </table>


                    </div>
                </div>

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
<?php include 'tpl_includes/footer.php'; ?>
                </footer>
            </div>
            <!-- /.container --> 

<?php include 'tpl_includes/footer_js.php'; ?>
        </body>
    </html>