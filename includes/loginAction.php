<?php
session_start();
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
      $sql = "SELECT password, first_name, is_admin, id FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $dbpassword = $row['password'];
      $fName = $row['first_name'];
      if (password_verify($pwd, $dbpassword)) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["first_name"] = $row['first_name'];
        if($row['is_admin']){
          $_SESSION["admin"] = $row['is_admin'];
          header("Location: ../admin");
          exit();
        }
        //if admin = true -> session[admin] = true

        header("Location: ../index.php?loggedIn");
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
