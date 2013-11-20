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
      <h1 class="page-header">Library<small>Brouse all book here</small></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
         <li><a href="library.php">Library</a></li>
        <li class="active">Book Title Append Here</li>
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
  <div class="row">
    <div class="col-md-4"> <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/350x400"></a> </div>
    <div class="col-md-8">
      <h3><strong>Title : Web developmant using Bootstrap</strong></h3>
      <p><strong>Isbn:</strong> 148-965-85-412</p>
      <p><strong>Author/Translator:</strong> Lakshman Palitha</p>
      <p><strong>Publisher of the original publication:</strong> Lakshman Palitha</p>
      <p><strong>Publisher of the Digital Talking Book (DTB):</strong> Lakshman Palitha</p>
      <p><strong>Genre/Subject:</strong> Lakshman Palitha</p>
      
      <p><strong>Dicription:</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
      <a class="btn btn-primary" href="library.php"><i class="fa fa-angle-left"></i>&nbsp;&nbsp;Back To Libray</a>
      <a class="btn btn-primary" href="">View More Details&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
      <a class="btn btn-primary" href="">Read Book &nbsp;&nbsp;<i class="fa glyphicon-headphones"></i></a> </div>
       
  </div>
  <hr>
  

  
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