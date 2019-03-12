<?php include 'components/header.php'; ?>

<main class="container">
  <div class="row justify-content-center">
  <?php if (isset($_GET['signedOut'])) {
    echo "
    <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style='width: 40%;'>
      <p>You've successfully signed out!</p>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    ";
  }?>
  </div>
  <div class="header">
    <h1>Realtors</h1>
    <p class="lead">Houses online. Made easy.</p>
  </div>

</main>

<?php include 'components/footer.php'; ?>
