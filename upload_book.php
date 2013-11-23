<?php
include('include/include.php');
$fromValue = '';
if ($read->get("upload_book", "POST")) {
    $data = $qu->getFormPost();
    $fromValue = $er->getFromValue(); //Get errors
    if ($data) {
        if ($book->saveBook($data)) {
            $fromValue = '';
            $er->createerror("Book save success!", 0);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'tpl_includes/in_head.php'; ?>
    </head>

    <body>
        <?php include 'tpl_includes/top_nav.php'; ?>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 sidebar">
                    <?php include 'tpl_includes/left_menu.php'; ?>
                </div>
                <div class="col-md-9 col-sm-8">
                    <h1 class="page-header">Register <small>Student Registration Form</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Registor</li>
                    </ol>
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

                    <div class="alert alert-success" style="display:<?php echo $success ?>">
                    </div>
                    <div class="alert alert-danger" style="display:<?php echo $failed ?>">
                    </div>

                    <form class="form-horizontal" role="form" method="POST" action="upload_book.php" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-3 control-label">Name of the book/publication</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="<?php echo ($fromValue ? $fromValue['book_name_or_publication'] : "") ?>" name="fields_req[book_name_or_publication]" id="book_name" placeholder="Name of the book/publication">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-sm-3 control-label">Author/translator</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['author_or_translater'] : "") ?>" name="fields_req[author_or_translater]" id="auther" placeholder="Author/translator">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="publisher" class="col-sm-3 control-label">Publisher of the original publication</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['original_publisher'] : "") ?>" name="fields_req[original_publisher]" id="publisher" placeholder="publisher of the original publication">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="d_bublisher" class="col-sm-3 control-label">Publisher of the Digital Talking Book (DTB)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['digital_talking_book_publisher'] : "") ?>" name="fields_req[digital_talking_book_publisher]" id="d_bublisher" placeholder="Publisher of the Digital Talking Book (DTB)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cover_image" class="col-sm-3 control-label">Cover Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="img" id="cover_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cover_image" class="col-sm-3 control-label">Book (.zip) File</label>
                            <div class="col-sm-9">
                                <input type="file" name="zip_file" id="book">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dicription" class="col-sm-3 control-label">Discription</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3"  name="fields_req[book_description]" id="dicription" placeholder="Discription"><?php echo ($fromValue ? $fromValue['book_description'] : "") ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="upload_book" value="TRUE" class="btn btn-primary btn-lg">Upload Book</button>
                                <input type="hidden" name="check_book_submit" value="TRUE" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row --> 
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
