<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<main class="container">
  <?php
  if (!isset($_SESSION["admin"])) {
    echo "
    <div class='row justify-content-center'>
    <div class='alert alert-danger show text-center' role='alert' style='width: 40%;'>
      <p>You do not have permisson to access this page.</p>
    </div>
    </div>";
    exit();
  } ?>
  <div class="row justify-content-center mt-2">
    <h2>Admin Panel</h2>

  </div>
  <div class="row justify-content-center mt-3">
    <button class='btn btn-info' onclick=location.href='./add.php' type='button'>Add new listing</button>
  </div>
  <div class="row justify-content-center mt-3">
    <h2 class="">Edit Listings</h2>
  </div>
  <div class="row justify-content-center">

  <?php
  if ($conn){
    $sql = "SELECT * FROM houses";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='col-md-4 col-sm-6 col-xs-12 div-cell'>
        <div class='card shadow-sm'>
          <img class='card-img-top' src='../house_assests/$row[image_link]' width='100%' height='225' alt=''>
          <div class='card-body'>
            <p class='card-text text-center'>$row[address_1], $row[address_2]</p>
            <div class=''>
                <ul class='list-group text-center'>
                  <li class='list-group-item'>Bed: $row[bed], Bath: $row[bathroom], Car: $row[car]</li>
                </ul>
                <ul class='list-group text-center'>";
                if ($row['auction']) {
                    echo "<li class='list-group-item'>House to be auctioned</li>";
                  } else {
                    echo "<li class='list-group-item'>$$row[price]</li>";
                  }
              echo "
                </ul>
              <div class='btn-group align-items-center d-flex justify-content-center'>
                <button class='btn btn-info' onclick=location.href='./edit.php?id=$row[house_id]' type='button'>edit/delete</button>
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
