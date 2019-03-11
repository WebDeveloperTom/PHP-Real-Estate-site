<?php include 'components/header.php'; ?>
    <main>
      <?php
      if (isset($_SESSION['loggedIn'])) {
        echo "You are already logged in";
      } else {
          include 'components\loginForm.php';

      }
?>
    </main>
<?php include 'components/footer.php'; ?>
