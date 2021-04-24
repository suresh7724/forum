<!-- <?php
include 'database.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
$usernames=$_POST['users'];
$passs=$_POST['passs'];
$emails=$_POST['emails'];
$insert_Data="INSERT INTO `user_data` (`username`, `email`, `password`, `time`) VALUES ( '$usernames', '$emails', '$passs', current_timestamp());";
$insertResult=mysqli_query($connectdb,$insert_Data);
if($insertResult)
{
  
  

}
else{
  echo '
  <div class="alert alert-dangor alert-dismissible fade show" role="alert">
  <strong>failed!</strong>username is already exist
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
}
?>Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signup" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  action="partials/_signuphandler.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">User Name</label>
            <input type="text" name="user" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="pass" type="password" class="form-control" id="pass">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input name="cpass" type="password" class="form-control" id="pass">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

      </div>
    </div>
  </div>
</div>