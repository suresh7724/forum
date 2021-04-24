<?php
include 'partials/database.php';
include 'partials/login.php';
include 'partials/signup1.php';
include 'partials/nav.php';

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="img/slide1.jfif" alt="First slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="img/slide2.jfif" alt="Second slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="img/slide3.jfif" alt="Third slide">
    </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container my-4">
    <h1> git update </h2>
<h2> Browse categories</h2>
    <div class="row">
<?php
$threadQuery='SELECT * FROM `category`';


$catResult=mysqli_query($connectdb,$threadQuery);
while($row=mysqli_fetch_assoc($catResult))
{
    $cat=$row['category_name'];
    $cat_desc=$row['category_desc'];
    $cat_id=$row['category_id'];
    echo'<div class="col-md-4 my-4">
        <div class="card" style="width: 18rem;">
            <img src="img/card-'.$cat_id.'.jfif" class="card-img-top" alt="img">
            <div class="card-body">
                <h5 class="card-title"> <a href="threadlist.php?catid='.$cat_id .'">'.$cat.'</a></h5>
                <p class="card-text">'.substr($cat_desc,0,75) .'..</p>
                <a href="threadlist.php?catid='.$cat_id .'" class="btn btn-primary">View threads</a>
            </div>
        </div>
    </div>';
    
}
?>
        </div>
    </div>
    
    
    
    



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php   include 'partials/footer.php'?>
