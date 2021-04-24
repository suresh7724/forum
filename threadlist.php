<?php
// include 'partials/database.php';
include 'partials/login.php';
include 'partials/signup1.php';
include 'partials/nav.php';
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])==true)
{
  $login=true;
  $user_name=$_SESSION['user'];
}
$insert_alert=false;
if($insert_alert)
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> your problem has been taken! please wait to respnd the community
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



// $server='localhost';
// $user='root';
// $password='';
// $database='forum';
$server='localhost';
$user='root';
$password='root';
$database='forum';
  $connectDb=mysqli_connect($server,$user,$password,$database);

$id=$_GET['catid'];

// SELECT * FROM `category` WHERE category_id=4
$sql='SELECT * FROM `category` WHERE category_id ='.$id.';';
$result=mysqli_query($connectDb,$sql);

while($row=mysqli_fetch_assoc($result))
{
    $catName=$row['category_name'];
    $catDesc=$row['category_desc'];
}

// ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container my-4">
<div class="jumbotron">
  <h1 class="display-4"><?php echo $catName?></h1>
  <p class="lead"><?php echo $catDesc?>
  <hr class="my-4">
  <p>No Spam / Advertising / Self-promote in the forums.
Do not post copyright-infringing material. .
Do not post “offensive” posts, links or images. .
Do not cross post questions. </p>
  <p class="lead">
    <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
</div>

<div class="container">
    <h2>Discussions</h2>
</div>
<div class="container">

<h1> Browse Questions</h1>
<!-- 
INSERT INTO `threads` (`sno`, `thread_title`, `thread_desc`, `thread_id`, `thread_user_id`, `time`) VALUES (NULL, 'unable to play pyaudio', 'hi i am having issue to play te pycharm and pyaudio', '2', '', current_timestamp()); -->

<?php 
$insert_alert=false;

$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST')
{
  $th_title=$_POST['title'];
  $th_title = str_replace("<","&lt", $th_title);
  $th_title= str_replace(">","&gt", $th_title);
  $th_desc=$_POST['desc'];
  $th_desc = str_replace("<","&lt", $th_desc);
  $th_desc = str_replace(">","&gt", $th_desc);
  if($th_title!=' ' && $th_desc){
  $insert="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_id`, `thread_user_id`, `time`) VALUES ( '$th_title', '$th_desc', '$id', '$user_name', current_timestamp());";
  $insert_result=mysqli_query($connectDb,$insert);
  if($insert)
  {
    $insert_alert=true;
  }
}
}
// query to take threads form db

$sql='Select * from `threads` where thread_id='.$id.';';
$result=mysqli_query($connectDb,$sql);
$questions=true;
while($row=mysqli_fetch_assoc($result))
{
  $title=$row['thread_title'];
  $description=$row['thread_desc'];
  $thread_Id=$row['thread_id'];
  $thread_sno=$row['sno'];
  $thread_user=$row['thread_user_id'];
  $time=$row['time'];
  $questions=false;

echo '<div class="media my-5">
<img class="mr-3" src="img/user.jpg"  width="54px" alt="Generic placeholder image">
<div class="media-body">
<p class="font-weight-bold my-0"> '.$thread_user.'  at '.substr($time,0,16).'</p>
  <h5 class="mt-0 text-dark" ><a href="thread.php?thread_sr='.$thread_sno.'">'.$title.'</a></h5>
      <p>'.$description.'</p>
</div>
</div>';
}
if($questions)
{
  echo '
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Threads</h1>
    <p class="lead">Be the first one to ask a question</p>
  </div>
</div>';
}
?>
</
</div>
<?php
if($login){ echo '
<div class="container">
<div class="mb-3">
  <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="texthelp">
    <div id="texthelp" class="form-text">Keep your problem title as much as short</div>
    <div>
    <textarea class="form-control" name="desc" id="prdesc" rows="3" placeholder="describe your problem here"></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>';}
else
{
  echo ' 
  
  <p class="lead">Please login to tell us your problem</p>
  ';
}
?>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<?php   include 'partials/footer.php'?>