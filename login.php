<div id="id01" class="modal">
  <form class="modal-content animate" action="" method="post">
    <div class="container-fluid">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>  
      <button type="submit" style="padding:11px 20px" name="submit">Login</button>
    </div>
    <div class="container-fluid" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn p-2 my-2">Cancel</button>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php

include 'config.php';
session_start();
@$username = $_POST['username'];
@$password = $_POST['password'];

    if(isset($_POST['submit'])){
        $query  = mysqli_query($conn, "select * from petugas where username = '$username' and password = '$password'");
        $row = mysqli_num_rows($query);
        if ($row > 0 ){
            $res = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $res['username'];
            $_SESSION['level'] = $res['level'];
            header("Location: ");
        }else{
            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
    
    ?>
