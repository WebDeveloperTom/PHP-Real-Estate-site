<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles\nav.css">
  </head>
  <body>
    <?php include './components/Nav.php'; ?>
    <main>
      <form class="" action="<?php echo htmlspecialchars('includes\loginAction.php')?>" method="post">
        <input type="text" name="username" value="" placeholder="Username">
        <input type="password" name="pwd" value="" placeholder="Password">
        <button type="submit" name="button">Login</button>
      </form>
    </main>
  </body>
</html>
