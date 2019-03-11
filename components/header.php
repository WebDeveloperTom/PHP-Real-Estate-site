<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
    <link rel='stylesheet' href='/assignment7/styles/index.css'>
    <!-- <link rel='stylesheet' href='/assignment7/styles/nav.css'>
    <link rel='stylesheet' href='/assignment7/styles/edit.css'>
    <link rel='stylesheet' href='/assignment7/styles/properties.css'>"; -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
  </head>
<body>
 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/assignment7">Home <span class="sr-only">(current)</span></a>
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
      if(isset($_SESSION['admin'])){
        echo "
        <ul class='navbar-nav'>
          <li class='nav-item dropdown  dropleft'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Admin</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='/assignment7/admin/'>Edit properties</a>
              <a class='dropdown-item' href='/assignment7/logout.php'>Sign Out</a>
            </div>
          </li>
        </ul>
        ";
      } elseif (isset($_SESSION['loggedIn'])) {
        echo "
        <ul class='navbar-nav'>
          <li class='nav-item dropdown  dropleft'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>User</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='/assignment7/wishlist'>My Wishlist</a>
              <a class='dropdown-item' href='/assignment7/logout.php'>Sign Out</a>
            </div>
          </li>
        </ul>
        ";
      } else {
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
