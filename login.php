<?php include 'components/header.php'; ?>
    <main>
      <?php
      if (isset($_SESSION['loggedIn'])) {
        echo "You are already logged in";
      } else {
        //load the login form component
          include 'components\loginForm.php';

      }
      ?>
    </main>
<?php include 'components/footer.php'; ?>
