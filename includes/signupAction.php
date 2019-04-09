<?php
session_start();
$fName = $username = $email = $pwd = $cPwd = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include_once 'config.php';
  $fName = mysqli_real_escape_string($conn ,$_POST['fName']);
  $email = mysqli_real_escape_string($conn ,$_POST['email']);
  $username = mysqli_real_escape_string($conn ,$_POST['username']);
  $pwd = mysqli_real_escape_string($conn ,$_POST['pwd']);
  $cPwd = mysqli_real_escape_string($conn ,$_POST['cPwd']);
// error handlers
// check for empty fields

  if(empty($fName) || empty($email) || empty($username) || empty($pwd) || empty($cPwd)){
    header("Location: ../signup.php?query=empty");
    exit();
  }
  //check if input chars are valid.
  if (!preg_match("/^[a-zA-Z]*$/", $fName)) {
    header("Location: ../signup.php?query=invalidName&email=$email&username=$username");
    exit();
  }
  //check if email is FILTER_VALIDATE_EMAIL
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup.php?query=invalidEmail&fName=$fName&username=$username");
    exit();
  } else {
    //checking if dulplicate email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      //email already exists
      header("Location: ../signup.php?query=emailTaken&fName=$fName&username=$username");
      exit();
    }
  }
  //Username must contain only letters, numbers and underscores
  if (!preg_match("/^\w+$/", $username)) {
    header("Location: ../signup.php?query=userinvalid&fName=$fName&email=$email");
    exit();
  } else {
    //checking if dulplicate username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      //user already exists
      header("Location: ../signup.php?query=userTaken&fName=$fName&email=$email");
      exit();
    }
  }
  if ($pwd !== $cPwd) {
    header("Location: ../signup.php?query=pwdNoMatch&fName=$fName&email=$email&username=$username");
    exit();
  } else {
    // at least one number, one lowercase and one uppercase letter
    // at least six characters that are letters, numbers or the underscore
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/", $pwd)) {
      header("Location: ../signup.php?query=invalidPwd&fName=$fName&email=$email&username=$username");
      exit();
    } else {
      echo "success";
      //everything is ok
      // hashing $pwd
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
      // Insert the user into the database
      $sql = "INSERT INTO users (first_name, username, email, password)
              VALUES ('$fName', '$username', '$email', '$hashedPwd'); ";
      mysqli_query($conn, $sql);
      //log the user in.
      $_SESSION["loggedIn"] = true;
      $_SESSION["first_name"] = $fName;
      $IdSql = "SELECT id FROM users WHERE username = '$username'";
      $IdResult = mysqli_query($conn, $IdSql);
      $IdRow = mysqli_fetch_assoc($IdResult);
      $test = $IdRow['id'];
      $_SESSION["user_id"] = $IdRow['id'];

      header("Location: ../index.php?loggedIn&id=$test");
      exit();

    }
  }
} else {
  header("Location: ../signup.php?query=error");
  exit();
}
 ?>
