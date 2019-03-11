<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<div class="houses-main">


<?php
$id = $_SESSION['user_id'];
echo $id;
//need db connection check.
    if (true) {
      $sql = "SELECT house_id FROM `$id`";
      $result = mysqli_query($conn, $sql);
      while($ids = mysqli_fetch_assoc($result)){
        $house_id = $ids['house_id'];
        $sql = "SELECT * FROM houses WHERE house_id = $house_id";
        $houses = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($houses)){
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
        }


    } else {
      echo "WHoops, something went wrong";
    }
     ?>
</div>
<?php include '../components/footer.php'; ?>
