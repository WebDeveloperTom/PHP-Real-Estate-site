<?php include '../components/header.php'; ?>
<?php include '../includes/config.php';
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
              <p class='address'> $row[address_1], $row[address_2] </p>
              <p class='price'></p>
              <div class=''>
                <span class='bed'></span>
                <span class='bath'></span>
                <span class='car'></span>
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
<?php include '../components/footer.php'; ?>
