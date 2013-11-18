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
          <label for="book_name" class="col-sm-3 control-label">Name of the book/publication</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="book_name" placeholder="Name of the book/publication">
          </div>
        </div>
        
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Author/translator</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="auther" placeholder="Author/translator">
          </div>
        </div>
        
        <div class="form-group">
          <label for="publisher" class="col-sm-3 control-label">Publisher of the original publication</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="publisher" placeholder="publisher of the original publication">
          </div>
        </div>
        
        <div class="form-group">
          <label for="d_bublisher" class="col-sm-3 control-label">Publisher of the Digital Talking Book (DTB)</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="d_bublisher" placeholder="Publisher of the Digital Talking Book (DTB)">
          </div>
        </div>
        
        <div class="form-group">
          <label for="cover_image" class="col-sm-3 control-label">Cover Image</label>
          <div class="col-sm-9">
           <input type="file" id="cover_image">
          </div>
        </div>
        
        <div class="form-group">
          <label for="cover_image" class="col-sm-3 control-label">Book (.zip) File</label>
          <div class="col-sm-9">
           <input type="file" id="book">
          </div>
        </div>
        
        <div class="form-group">
          <label for="dicription" class="col-sm-3 control-label">Discription</label>
          <div class="col-sm-9">
            <textarea class="form-control" rows="3" id="dicription" placeholder="Discription"></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary btn-lg">Upload Book</button>
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
