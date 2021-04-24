<?php
include 'partials/nav.php';

?>

<div class="container">

<div class="result">
    <h1 class="">
    Search Results of
    <?php echo '"<b><i>'.$_GET['search'].'</b></i>"';?>
    </h1>

    <?php 
    // $server='localhost';
    // $username='root';
    // $pass='';
    // $data='forum';
    $server='localhost';
$username='root';
$pass='';
$data='forum';
    $connection=mysqli_connect($server,$username,$pass,$data);

    $searchTag=$_GET['search'];
    $findSql="SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) AGAINST('$searchTag')";

    $resultQuery=mysqli_query($connection,$findSql);
    $result=false;
    while($row=mysqli_fetch_assoc($resultQuery))
    {
        $result=true;
        echo'
    <div class="media my-5">
<img class="mr-3" src="img/user.jpg" width="54px" alt="Generic placeholder image">
<div class="media-body">
<p class="font-weight-bold my-0"> 0  at 2021-03-23 14:32</p>
  <h5 class="mt-0 text-dark"><a href="thread.php?thread_sr=2">'.$row['thread_title'].'</a></h5>
  '.$row['thread_desc'].'</p>
</div>
</div>
</div>';
    }
   if(!$result)
    {
        echo'
        <div class="jumbotron">
        <h1 class="display-4">No Results Found</h1>
        <br class="my-4">
        <ul class="list-group list-group-flush">
        <li class="list-group-item">No Keywords Macthed</li>
        <li class="list-group-item">Check your keyword spelling</li>
        <li class="list-group-item">Try another keyword</li>
        <li class="list-group-item">Try asking a question</li>
      </ul>
      </div>';
    }
?>
</div>

<?php

include 'partials/footer.php';
?>