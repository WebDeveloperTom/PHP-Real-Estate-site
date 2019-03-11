<?php include '../components/header.php'; ?>
<?php include '../includes/config.php'; ?>
<main>
  <?php
  if (!isset($_SESSION["admin"])) {
    echo "Youre not the admin";
  } else {
    $sql = "SELECT * FROM houses";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      // $row[house_id]
      // $row[address_1]
      // $row[address_2]
      // $row[bed]
      // $row[bathroom]
      // $row[car]
      // $row[description]
      // $row[price]
      // $row[auction]
      // $row[image_link]
      // $row[agent_id]

      echo "
      <div class='admin-list-item'>
        <div class='image-container'>
          <a href='#'>
            <img src='../house_assests/$row[image_link]' alt=''>
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
        <div>
          <button
            onclick=location.href='./edit.php?id=$row[house_id]'
            type='button'>edit/delete</button>
        </div>
      </div>
      ";


  }
}

   ?>
</main>
<?php include '../components/footer.php'; ?>
