<?php include 'components/header.php'; ?>
    <main>
      <form class="" action="<?php echo htmlspecialchars('includes\loginAction.php')?>" method="post">
        <input type="text" name="username" value="" placeholder="Username">
        <input type="password" name="pwd" value="" placeholder="Password">
        <button type="submit" name="button">Login</button>
      </form>
      <?php
      if (!isset($_SESSION['loggedIn'])) {
        echo "You are not logged in";
      } else {
        echo "You ARE logged in";
      }
      if ($_SESSION['admin']) {
        echo "You are an admin";
      } else {
        echo "You are not admin";
      }


       ?>
    </main>
<?php include 'components/footer.php'; ?>
