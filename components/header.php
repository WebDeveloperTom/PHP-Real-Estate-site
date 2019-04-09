<?php
//ensure $_SESSION can be accessed.
session_start();
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
    <link rel='stylesheet' href='/assignment7/styles/index.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
<body>
 <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="/assignment7">
    <img height="50"src="/assignment7/components/real-estate-logo.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burger" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="burger">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/assignment7">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/assignment7/properties">Properties</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/assignment7/agents">Agents</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/assignment7/contactus">Contact Us</a>
      </li>
    </ul>
    <?php
    // admin check
      if(isset($_SESSION['admin'])){
        echo "
        <ul class='navbar-nav'>
          <li class='nav-item dropdown  dropleft'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Admin</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='/assignment7/admin/add.php'>Add property</a>
              <a class='dropdown-item' href='/assignment7/admin/editList.php'>Edit properties</a>
              <a class='dropdown-item' href='/assignment7/logout.php'>Sign Out</a>
            </div>
          </li>
        </ul>
        ";
        //if theyre not the admin, check to see if someone is logged in.
      } elseif (isset($_SESSION['loggedIn'])) {
        $name = $_SESSION["first_name"];
        echo "
        <ul class='navbar-nav'>
          <li class='nav-item dropdown  dropleft'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>$name</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='/assignment7/wishlist'>My Wishlist</a>
              <a class='dropdown-item' href='/assignment7/logout.php'>Sign Out</a>
            </div>
          </li>
        </ul>
        ";
      } else {
        //otherwise, display default nav
        echo "
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a class='nav-link' href='/assignment7/signup.php'>Sign Up</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='/assignment7/login.php'>Login</a>
          </li>
        </ul>
        ";
      }
     ?>

  </div>
</nav>
