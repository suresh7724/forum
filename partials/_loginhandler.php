
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
include 'database.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
   

    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $sql="Select * from user_data where user='$username' AND pass='$pass'";
    $searchresult=mysqli_query($connectdb,$sql);
   $num=mysqli_num_rows($searchresult);
 
    if($num==1)
    {
        $login=true;
        echo'login success';
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['user']=$username;
        // $_SESSION['username']=$username;
        header('location:/forum/index.php?login=true');
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">
       Invalid  <a href="/forum/index.php" class="alert-link"> Login </a> Credentials
      </div>';
    }

   
}

?> 