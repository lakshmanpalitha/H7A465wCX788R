<?php
include('include/include.php');
$action = $read->get('action', "GET");
$id = $read->get('id', "GET");
if (!$action || !$id) {
    $pr->redirect("manage_user.php");
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
                    <h1 class="page-header">User activate page <small>For Deeper Customization</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">manage user</li>
                    </ol>
                </div>
            </div>
            <div id="search_form" class="row text-center">
                <div class="col-lg-12">
                    <p>Are you wish to <?php echo ($action == $en->encode('active') ? "activate" : "deactivate") ?> this user?</p>

                </div>
            </div>
            <!-- /.row -->

            <div class="row" class="row text-center">
                <div class="col-lg-12">
                    <div class="col-sm-offset-3 col-sm-9">
                        <a href="manage_user.php?action=<?php echo $action ?>&id=<?php echo $id ?>&act=<?php echo $en->encode('Y') ?>" >Yes</a>
                        <a href="manage_user.php?action=<?php echo $action ?>&id=<?php echo $id ?>&act=<?php echo $en->encode('N') ?>" >No</a>
                    </div>

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