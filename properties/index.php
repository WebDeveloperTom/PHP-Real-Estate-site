<?php include '../components/header.php'; ?>
    <p>this is the properties page</p>
    <?php
    include '../includes/config.php';
    // echo "This is the property page";
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo $row['address_1'].", ";
        echo $row['address_2'];
        echo "<br><p>".$row['description']."</p>";
        echo "<img src='".$row["image_link"]."' alt=''>";
        }


    } else {
      echo "WHoops, something went wrong";
    }
     ?>
<?php include '../components/footer.php'; ?>
