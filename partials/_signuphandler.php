<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
//  $server='localhost';
//  $user='root';
//  $pass='';
//  $db='forum';
$server='localhost';
$user='id16458348_suresh_77';
$pass='27d9Os_9<24KMt4f';
$db='id16458348_forum';
 $conndb=mysqli_connect($server,$user,$pass,$db);
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user=$_POST['user'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    

    $sql="SELECT * FROM `user_data` WHERE email='$email'";
    $signResult=mysqli_query($conndb,$sql);
    if($signResult)
    {
        
    }
    else{
        echo 'failed'.mysqli_connect_error().'';

    }
    $num=mysqli_num_rows($signResult);
    if($num>0)
    {
        echo '<div class="alert alert-danger" role="alert">
        Email already exists <a href="/forum/index.php" class="alert-link"> By clicking here </a> You can login
      </div>';
    }
    else
    {
        if($password==$cpassword && $user!=' ' && $email!=' '){
        $inSql="INSERT INTO `user_data` (`user`,`email`, `pass`, `time`) VALUES ('$user','$email', '$password', current_timestamp());";
        $inResult=mysqli_query($conndb,$inSql);
        $signup=true;
        header('location:/forum/index.php?signup=true');
        exit();
        }
        else
        {  echo '<div class="alert alert-danger" role="alert">
            Sorry!  Your <a href="/forum/index.php" class="alert-link"> Password</a> didn\'t match
          </div>';
        }
    }


}
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  