<?php
session_start();
echo "
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
    <link rel='stylesheet' href='/assignment7/styles/index.css'>
    <link rel='stylesheet' href='/assignment7/styles/nav.css'>
    <link rel='stylesheet' href='/assignment7/styles/properties.css'>
  </head>
  <body>
    <header>
      <div class='logo'>
        <img src='../components/real-estate-logo.png' alt='' />
      </div>
      <div class='menus'>
        <nav class='main-menu'>
          <ul>
            <li><a href='/assignment7/properties'>Listings</a></li>
            <li><a href='/assignment7/agents'>Agents</a></li>
            <li>Contact Us</li>
          </ul>
        </nav>
        <nav class='login'>
          <ul>";
          //if admin
          if (isset($_SESSION['admin'])) {
            echo "<li> <a href='/assignment7/admin/'>Admin Panel</a></li>
                  <li><a href='/assignment7/logout.php'>Sign Out</a></li>";
          } elseif (isset($_SESSION['loggedIn'])) {
            echo "<li><a href='/assignment7/wishlist/'>Wish List</a></li>
                  <li><a href='/assignment7/logout.php'>Sign Out</a></li>";
          } else {
            echo "<li><a href='/assignment7/signup.php'>Sign Up </a></li>
                  <li><a href='/assignment7/login.php'>Login</a></li>";
          }
            echo "
          </ul>
        </nav>
      </div>
    </header>";
 ?>
