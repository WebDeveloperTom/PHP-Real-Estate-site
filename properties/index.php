<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">The best properties on the market.</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <!-- house list start  -->
        <?php
        // need db connection check.
            if (true) {
              $sql = "SELECT * FROM houses";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo "
          <div class='col-md-4 col-sm-6 col-xs-12 div-cell'>
            <div class='card shadow-sm'>
              <img class='card-img-top' src='../house_assests/$row[image_link]' width='100%' height='225' alt=''>
              <div class='card-body'>
                <p class='card-text'>$row[address_1], $row[address_2]</p>
                <div class=''>
                    <ul class='list-group'>
                      <li class='list-group-item'>Bed: $row[bed], Bath: $row[bathroom], Car: $row[car]</li>
                    </ul>
                  <div class='btn-group align-items-center d-flex justify-content-center'>
                    <button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
                    <button type='button'onclick=location.href='../admin/edit.php?id=$row[house_id]' class='btn btn-sm btn-outline-secondary'>Edit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>";
}
}

          //       <div class='house-item'>
          //         <div class='image-container'>
          //           <a href='#'>
          //             <img src='../house_assests/$row[image_link]' alt=''>
          //           </a>
          //         </div>
          //d-flex justify-content-between align-items-center
          //         <div class='house-detail'>
          //           <a href='./listing.php?id=$row[house_id]'>
          //             <p class='address'> $row[address_1], $row[address_2] </p>";
          //             if ($row['auction']) {
          //               echo "<p class='auction'>To be auctioned</p>";
          //             } else {
          //               echo "<p class='price'>$$row[price]</p>";
          //             }
          //             echo "
          //             <div class=''>
          //               <span class='bed'>Bed: $row[bed]</span>
          //               <span class='bath'>Bath: $row[bathroom]</span>
          //               <span class='car'>Car: $row[car]</span>
          //             </div>
          //           </a>
          //         </div>";
          //         if (isset($_SESSION["admin"])) {
          //           echo "
          //           <div>
          //             <button onclick=location.href='../admin/edit.php?id=$row[house_id]'>Edit Listing</button>
          //           </div>
          //         </div>
          //         ";
          //       } else {
          //         echo "
          //       </div>
          //       ";
          //       }
          //   }
          // } else {
          //     echo "Whoops, something went wrong";
          //   }
          // width="100%" height="225"
             ?>
      </div>
    </div>
  </div>

</main>


<?php
// need db connection check.
  //   if (true) {
  //     $sql = "SELECT * FROM houses";
  //     $result = mysqli_query($conn, $sql);
  //     while($row = mysqli_fetch_assoc($result)){
  //       echo "
  //       <div class='house-item'>
  //         <div class='image-container'>
  //           <a href='#'>
  //             <img src='../house_assests/$row[image_link]' alt=''>
  //           </a>
  //         </div>
  //         <div class='house-detail'>
  //           <a href='./listing.php?id=$row[house_id]'>
  //             <p class='address'> $row[address_1], $row[address_2] </p>";
  //             if ($row['auction']) {
  //               echo "<p class='auction'>To be auctioned</p>";
  //             } else {
  //               echo "<p class='price'>$$row[price]</p>";
  //             }
  //             echo "
  //             <div class=''>
  //               <span class='bed'>Bed: $row[bed]</span>
  //               <span class='bath'>Bath: $row[bathroom]</span>
  //               <span class='car'>Car: $row[car]</span>
  //             </div>
  //           </a>
  //         </div>";
  //         if (isset($_SESSION["admin"])) {
  //           echo "
  //           <div>
  //             <button onclick=location.href='../admin/edit.php?id=$row[house_id]'>Edit Listing</button>
  //           </div>
  //         </div>
  //         ";
  //       } else {
  //         echo "
  //       </div>
  //       ";
  //       }
  //   }
  // } else {
  //     echo "Whoops, something went wrong";
  //   }
     ?>
<?php include '../components/footer.php'; ?>
