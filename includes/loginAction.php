<?php
$username = $pwd = $result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include_once 'config.php';
  $username = mysqli_real_escape_string($conn ,$_POST['username']);
  $pwd = mysqli_real_escape_string($conn ,$_POST['pwd']);
  //reject if empty
  if (empty($username) || empty($pwd) ) {
    header("Location: ../login.php?query=empty");
    exit();
  } else {
    //check to see if username exists.
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      //user exists, check password.
      $sql = "SELECT password, first_name FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $dbpassword = $row['password'];
      $fName = $row['first_name'];
      if (password_verify($pwd, $dbpassword)) {
        header("Location: ../welcome.php?fName=$fName");
      } else {
        //password doesnt match, throw error.
        header("Location: ../login.php?query=mismatch");
      }
    } else {
      //user doesnt exist error/signup
      header("Location: ../login.php?query=mismatch");
    }
  }
} else {
  header("Location: ../login.php?query=error");
}
?>
