<?php include 'components/header.php'; ?>
<?php include 'includes/config.php'; ?>
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
  <div class="caro row justify-content-center">
    <div class="">
      <div id="main-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assests\coverimg.jpeg" class="w-100" alt="...">
            <div class="carousel-caption">
              <h4 style="color: black">Get your dream home today!</h4>
              <p style="color: black">Cheap, Affordable, Dreamy</p>
            </div>
          </div>
          <?php
          $latestHousesSQL = "SELECT * FROM houses ORDER BY house_id DESC LIMIT 3";
          $result = mysqli_query($conn, $latestHousesSQL);
          while($row = mysqli_fetch_assoc($result)){
            echo "
            <div class='carousel-item'>
              <img src='./house_assests/$row[image_link]' class=' w-100' alt='...'>
              <div class='carousel-caption'>
                <h5>$row[address_1],</h5>
                <h5>$row[address_2]</h5>
              </div>
            </div>
            ";
          } ?>
        </div>
        <a class="carousel-control-prev" href="#main-carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <div class="push"></div>
</main>

<?php include 'components/footer.php'; ?>
