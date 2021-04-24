<?php
// session_start();
$login=false;
// $server='localhost';
// $user='root';
// $pass='';
// $data='forum';
$server='localhost';
$user='root';
$pass='';
$data='forum';
$conn=mysqli_connect($server,$user,$pass,$data);

if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])==true)
{
    $login=true;
}
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        $sql_query='select * from `category` limit 3;';
                        $result_sql=mysqli_query($conn,$sql_query);
                        while($row=mysqli_fetch_assoc($result_sql))
                        {
                            echo'
                        <li><a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                        }
                        echo'
                    </ul>
                </li>
            </ul>
             <div> 
            </div>';
            if($login){
              
                echo '<p class="mr-5"> welcome '.$_SESSION['user'].'</p>';
            }
            echo'
           
            <form class="d-flex" method="GET" action="search.php">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
           
            <div>';
            if($login){ echo '
            <a class="text-success mb-20 ml-3" href="partials/_logout.php">logout</a></button></div>';}
            if(!$login){
                echo '
                <button data-bs-toggle="modal" data-bs-target="#signup" class="btn btn-outline-success mb-3 ml-4" type="submit">Sign up</button>
                <button data-bs-toggle="modal" data-bs-target="#loginmodal" class="btn btn-outline-success mb-3 ml-4" type="submit">Login</button>
                
                ';
            }
            echo'
           </div>
           </div>
  
    </div>
</nav>';
?>
<?php

        if(isset($_GET['signup'])&& $_GET['signup']=='true')
        { echo'
            <div class="alert alert-success" role="alert">
           Sign Up completed! Now you can login
          </div>'; 
        }
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>