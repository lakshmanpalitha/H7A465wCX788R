<?php
include('include/include.php');
$fromValue = '';
if ($read->get("userReg", "POST")) {
    $data = $qu->getFormPost();
    $fromValue = $er->getFromValue(); //Get errors
    if ($data) {
        if ($user->registerUser($data)) {
            $fromValue = '';
            $er->createerror("Register success!", 0);
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
                        <li class="active">Register</li>
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


                    <form class="form-horizontal" role="form" method="POST" action="register.php">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['first_name'] : "") ?>" name="fields_req[first_name]" id="first_name" placeholder="First Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="<?php echo ($fromValue ? $fromValue['last_name'] : "") ?>" name="fields_req[last_name]" id="last_name" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nic" class="col-sm-3 control-label">NIC No:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['nic_number'] : "") ?>" name="fields_req[nic_number]" id="nic" placeholder="National Identity Card Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" value="<?php echo ($fromValue ? $fromValue['email_address'] : "") ?>" name="field_email_req[email_address]"  id="email" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Telphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo ($fromValue ? $fromValue['telephone_number'] : "") ?>" name="field_int_req[telephone_number]" id="phone" placeholder="Telphone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" value="<?php echo ($fromValue ? $fromValue['password'] : "") ?>" name="fields_req[password]" id="password" placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="re_password" class="col-sm-3 control-label">Re Enter Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" value="<?php echo ($fromValue ? $fromValue['confirm_password'] : "") ?>" name="fields_req[confirm_password]"id="re_password" placeholder="Re Enter Password">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Adress</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="fields_req[address]" id="adress" placeholder="Adress"><?php echo ($fromValue ? $fromValue['address'] : "") ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subscription" class="col-sm-3 control-label">Subscription Options:</label>
                            <div class="col-sm-9">
                                <select name="field_int_req[subscription]" class="form-control">
                                    <option selected value="3">3 Months subscription (Rs. 200.00)</option>
                                    <option value="6">6 Months subscription (Rs. 300.00)</option>
                                    <option value="12">Annual subscription (Rs. 500.00)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="userReg" value="userReg" class="btn btn-primary btn-lg">Register</button>
                                <input type="hidden" name="checkSubmit" value="TRUE"/>
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
