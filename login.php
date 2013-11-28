<?php
include('include/include.php');
$fromValue = '';
if ($read->get("loginuser", "POST")) {
    $data = $qu->getFormPost();
    $fromValue = $er->getFromValue(); //Get errors
    if ($data) {
        if ($user->loginUser($data['userEmail'], $data['password'])) {
            $fromValue = '';
            $pr->redirect('my_account.php');
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
                    <h1 class="page-header">Login </h1>
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
                        <?php echo $errors ?>
                    </div>
                    <div class="alert alert-danger" style="display:<?php echo $failed ?>">
                        <?php echo $errors ?>
                    </div>

                    <form class="form-horizontal" role="form" method="POST" action="login.php" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-3 control-label">User Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="<?php echo ($fromValue ? $fromValue['userEmail'] : "") ?>" name="field_email_req[userEmail]" id="book_name" placeholder="User email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-3 control-label">Password </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control"  value="<?php echo ($fromValue ? $fromValue['password'] : "") ?>" name="fields_req[password]" id="isbn" placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="loginuser" value="TRUE" class="btn btn-primary btn-lg">Login</button>
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
