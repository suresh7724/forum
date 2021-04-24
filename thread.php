<?php
include 'partials/signup1.php';
// include 'partials/database.php';
include 'partials/login.php';
include 'partials/nav.php';
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])==true)
{
    $login=true;
    // echo $user;
    $user_name=$_SESSION['user'];
}


$signup=false;
$comment_exist=false;


// $server='localhost';
// $user='root';
// $password='';
// $database='forum';
$server='localhost';
$user='root';
$password='';
$database='forum';
$connectDb=mysqli_connect($server,$user,$password,$database);
$thread_Id=$_GET['thread_sr'];


if($_SERVER['REQUEST_METHOD']=="POST")
{
    $content=$_POST['comment'];
    $content = str_replace("<","&lt", $content);
    $content = str_replace(">","&gt", $content);
    $insertCmnt="INSERT INTO `comments` (`comment_content`, `comment_by`, `time`, `thread_id`) VALUES ('$content', '$user_name', current_timestamp(), '$thread_Id');";

    $insert_comment_db=mysqli_query($connectDb,$insertCmnt);
    // if($insert_comment_db)
    // {
    //   echo "data insterted succesfully";
    // }
    // else

    // {
    //   echo " there are some issues";
    // }
     
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php


// SELECT * FROM `category` WHERE category_id=4
$sql='SELECT * FROM `threads` WHERE  sno ='.$thread_Id.';';
$result=mysqli_query($connectDb,$sql);
$answers=true;

while($row=mysqli_fetch_assoc($result))
{
 
    // $answers=false;
    $title=$row['thread_title'];
    $threadDesc=$row['thread_desc'];
    $user_name=$row['thread_user_id'];
    echo '<div class="container my-4">
<div class="jumbotron">
  <h1 class="display-4">' .$title.'</h1>
  <p class="lead">'.$threadDesc.'
  <p><b>posted by : '.$user_name.'</b></p>';
}

?>


</div>
</div>
<div class="container">



    <?php
 
 $comntQuery="Select * from `comments` where thread_id='$thread_Id'";
 $commentResult=mysqli_query($connectDb,$comntQuery);
 if($commentResult){
   
     while($row=mysqli_fetch_assoc($commentResult))
     {
    
         $comment_exist=true;
         $user_name=$row['comment_by'];
         $content=$row['comment_content'];
         $time=$row['time'];
echo'
<div class="media my-5">
<img class="mr-3" src="img/user.jpg"  width="54px" alt="Generic placeholder image">
<div class="media-body">
      <p class="font-weight-bold my-0">'. $user_name .' at '.substr($time,0,16).'</p>
      <p>'.$content.'</p>
</div>
</div>';}
     }
 ?>
    <?php
if(!$comment_exist)
{
    echo '
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">No answers yet</h1>
      <p class="lead">Be the first one to review the question</p>
    </div>
  </div>';
}?>
<?php
    if($login){
 echo'
    <div class="container">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <textarea class="form-control" name="comment" id="cmnt" rows="3"
                placeholder="Leave your comment here"></textarea> <br>
            <button type="submit" class="btn btn-success">Submit</button>
    </div>';}
    else{
        echo '<div class="container">
        <p class="lead">Please Login to answer the question!</p></div>';
    }
    ?>
</div>
</form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<?php   include 'partials/footer.php';?>