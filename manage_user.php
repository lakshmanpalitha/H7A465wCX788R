<?php
include('include/include.php');
$act = false;
$res = false;
$id = false;
$action = false;
$res = $read->get('res', "GET"); //user's select action yes or no
$id = $read->get('id', "GET");
$act = $read->get('act', "GET");
$action = $read->get('action', "GET");
if ($res && $res == $en->encode('Y') && $id) {//Confirm user
    $admin->confirmUser($en->decode($id));
}
if ($act && $act == $en->encode('Y') && $action == $en->encode('active') && $id) {//Activate user
    $admin->activateUser($en->decode($id));
}

if ($act && $act == $en->encode('Y') && $action == $en->encode('deactive') && $id) {//Deactivate user
    $admin->deactivateUser($en->decode($id));
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
                    <h1 class="page-header">Manage User <small>For Deeper Customization</small></h1>
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
                            <button class="btn btn-primary btn-lg" type="button">Search User <span class="glyphicon glyphicon-search"></span></button>
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
                                <th>User ID:</th>
                                <th>First Name:</th>
                                <th>Last Name:</th>
                                <th>ID NO:</th>
                                <th>Telphone</th>
                                <th>Email:</th>
                                <th>Action:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $users = '';
                            if ($query) {



                                $pg_param = "&q=value"; // Ex: &q=value

                                $users = $pg->setpagination($query, $num_results_per_page, $num_page_links_per_page, $pg_param);

                                //$link = $pg->Create_Links($rid, $key);
                                $rid = '';
                                $key = '';
                                $link = $pg->Create_Links($rid, $key);

                                echo $link;
                            }
                            if ($users) {
                                foreach ($users as $us) {
                                    ?>
                                    <tr>
                                        <td><?php echo $us->user_id ?></td>
                                        <td><?php echo $us->first_name ?></td>
                                        <td><?php echo $us->last_name ?></td>
                                        <td><?php echo $us->nic_number ?></td>
                                        <td><?php echo $us->telephone_number ?></td>
                                        <td><?php echo $us->email_address ?></td>
                                        <td>
                                            <a href="" class="label label-primary">Edit <span class="glyphicon glyphicon-edit"></span></a>
                                            <?php echo ($us->status == 'I' && $us->confirm == 'Y' ? '<a href="user_activation.php?action=' . $en->encode('active') . '&id=' . $en->encode($us->user_id) . '" class="label label-danger">Block <span class="glyphicon glyphicon-lock"></span></a>' : ""); ?>
                                            <?php echo ($us->status == 'A' && $us->confirm == 'Y' ? '<a href="user_activation.php?action=' . $en->encode("deactive") . '&id=' . $en->encode($us->user_id) . '" class="label label-success">Active<span class="glyphicon glyphicon-ok"></span></a>' : ""); ?>
                                            <?php echo ($us->confirm == 'N' ? '<a href="user_confirm.php?action=' . $en->encode('confirm') . '&id=' . $en->encode($us->user_id) . '" class="label label-success">Confirm<span class="glyphicon glyphicon-ok"></span></a>' : ""); ?>
                                            <a href="" class="label label-success">Current Books<span class="glyphicon glyphicon-ok"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
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