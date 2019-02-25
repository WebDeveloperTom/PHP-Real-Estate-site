<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<div class="houses-main">


<?php
//need db connection check.
    if (true) {
      $sql = "SELECT * FROM houses";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "
        <div class='house-item'>
          <div class='image-container'>
            <a href='#'>
              <img src='$row[image_link]' alt=''>
            </a>
          </div>
          <div class='house-detail'>
            <a href='./listing.php?id=$row[house_id]'>
              <p class='address'> $row[address_1], $row[address_2] </p>";
              if ($row['auction']) {
                echo "<p class='auction'>To be auctioned</p>";
              } else {
                echo "<p class='price'>$$row[price]</p>";
              }
              echo "
              <div class=''>
                <span class='bed'>Bed: $row[bed]</span>
                <span class='bath'>Bath: $row[bathroom]</span>
                <span class='car'>Car: $row[car]</span>
              </div>
            </a>
          </div>
        </div>
        ";
        }


    } else {
      echo "WHoops, something went wrong";
    }
     ?>
</div>
<?php include '../components/footer.php'; ?>
