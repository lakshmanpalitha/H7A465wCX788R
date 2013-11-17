<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'tpl_includes/in_head.php'; ?>
</head>

<body>
<?php include 'tpl_includes/top_nav.php';?>
<!-- Page Content -->

<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-4 sidebar">
      <?php include 'tpl_includes/left_menu.php';?>
    </div>
    <div class="col-md-9 col-sm-8">
      <h1 class="page-header">Register <small>Student Registration Form</small></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Registor</li>
      </ol>
      
      <div class="alert alert-success">success msg here</div>
        
        <div class="alert alert-danger">error msg here</div>


      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="first_name" class="col-sm-3 control-label">First Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="first_name" placeholder="First Name">
          </div>
        </div>
        
        
        <div class="form-group">
          <label for="last_name" class="col-sm-3 control-label">Last Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="last_name" placeholder="Last Name">
          </div>
        </div>
        
        <div class="form-group">
          <label for="nic" class="col-sm-3 control-label">NIC No:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nic" placeholder="National Identity Card Number">
          </div>
        </div>
        
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" placeholder="Email Address">
          </div>
        </div>
        
        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Telphone</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" placeholder="Telphone">
          </div>
        </div>
        
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
        </div>
        
        
        <div class="form-group">
          <label for="re_password" class="col-sm-3 control-label">Re Enter Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="re_password" placeholder="Re Enter Password">
          </div>
        </div>
        
        
        
        <div class="form-group">
          <label for="address" class="col-sm-3 control-label">Adress</label>
          <div class="col-sm-9">
            <textarea class="form-control" rows="3" id="adress" placeholder="Adress"></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label for="subscription" class="col-sm-3 control-label">Subscription Options:</label>
          <div class="col-sm-9">
            <select class="form-control">
                  <option selected value="3m">3 Months subscription (Rs. 200.00)</option>
                  <option value="6m">6 Months subscription (Rs. 300.00)</option>
                  <option value="annual">Annual subscription (Rs. 500.00)</option>
                </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary btn-lg">Register</button>

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
