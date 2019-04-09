<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<!-- admin navigation -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-dot justify-content-center">
    <li class="breadcrumb-item"><a href="../admin">Admin panel</a></li>
    <li class="breadcrumb-item"><a href="./add.php">Add Listing</a></li>
    <li class="breadcrumb-item active" aria-current="page">Property Listings</li>
  </ol>
</nav>
<main class="container">
  <?php
  // admin checks
  if (!isset($_SESSION["admin"])) {
    echo "
    <div class='row justify-content-center'>
    <div class='alert alert-danger show text-center' role='alert' style='width: 40%;'>
      <p>You do not have permisson to access this page.</p>
    </div>
    </div>";
    exit();
  } ?>

  <div class="row justify-content-center mt-3">
    <h2 class="">Edit Listings</h2>
  </div>
  <div class="row align-items-start">

  <?php
  if ($conn){
    //fetch all data from houses table.
    $sql = "SELECT * FROM houses";
    $result = mysqli_query($conn, $sql);
    //display each house as a grid column with data pulled from table
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 div-cell'>
        <div class='card shadow-sm'>
          <img class='card-img-top' src='../house_assests/$row[image_link]' width='100%' height='225' alt=''>
          <div class='card-body'>
            <p class='card-text text-center'>$row[address_1], </p>
            <p class='card-text text-center'>$row[address_2]</p>
            <div class=''>
                <ul class='list-group text-center'>
                  <li class='list-group-item'>Bed: $row[bed], Bath: $row[bathroom], Car: $row[car]</li>
                </ul>
                <ul class='list-group text-center'>";
                if ($row['auction']) {
                    echo "<li class='list-group-item'>Sale by auction</li>";
                  } else {
                    echo "<li class='list-group-item'>$$row[price]</li>";
                  }
              echo "
                </ul>
              <div class='btn-group align-items-center d-flex justify-content-center'>
                <button class='btn btn-info' onclick=location.href='./edit.php?id=$row[house_id]' type='button'>Edit</button>
                <form action='";
                  echo htmlspecialchars('../includes/deleteAction.php');
                  echo "' method='POST'>
                  <input type='hidden' name='delete_id' value='$row[house_id]' />
                  <button type='submit' class='btn btn-danger btn-block'>DELETE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>";
    }
  }
   ?>
 </div>
</main>
<?php include '../components/footer.php'; ?>
