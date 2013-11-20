<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'tpl_includes/in_head.php'; ?>
</head>

<body>
<?php include 'tpl_includes/top_nav.php';?>
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
          <tr>
            <td>1</td>
            <td>Lakshman</td>
            <td>Palitha</td>
            <td>862933508V</td>
            <td>0718586951</td>
            <td>lakshmanpalitha@gmail.com</td>
            <td><a href="" class="label label-primary">Edit <span class="glyphicon glyphicon-edit"></span></a>
            <a href="" class="label label-danger">Block <span class="glyphicon glyphicon-lock"></span></a>
            <a href="" class="label label-success">Active<span class="glyphicon glyphicon-ok"></span></a>
            <a href="" class="label label-success">Currunt Books<span class="glyphicon glyphicon-ok"></span></a>

</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
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