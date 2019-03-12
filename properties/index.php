<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">The best properties on the market.</h1>
      <p class="lead text-muted">You want somewhere to live? Our agents have got you covered with the best prices!</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <!-- house list start  -->
        <?php
            if ($conn) {
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
                    <button type='button' onclick=location.href='./listing.php?id=$row[house_id]' class='btn btn-sm btn-outline-secondary'>View</button>";
                    if (!isset($_SESSION["admin"])) {
                      echo "<button type='button' onclick=location.href='../soon.php' class='btn btn-sm btn-outline-secondary'>Wishlist</button>";
                    } else {
                      echo "<button type='button' onclick=location.href='../admin/edit.php?id=$row[house_id]' class='btn btn-sm btn-outline-secondary'>Edit</button>";
                    }

                    echo "
                  </div>
                </div>
              </div>
            </div>
          </div>";
        }
        }else {
          echo "Whoops, something went wrong. Please make sure you are connected to the database.";
        }
?>
      </div>
    </div>
  </div>

</main>
<?php include '../components/footer.php'; ?>
