<?php
    include '../components/header.php';
    include '../includes/config.php';
    ?>
<div class="edit-main">
  <?php
  if (!isset($_SESSION["admin"])) {
    echo "Youre not the admin";
    exit();
  } ?>
  <div class="edit-form">



<?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "
          <form action='";
        echo htmlspecialchars('../includes/editAction.php');
        echo "' method='POST' enctype='multipart/form-data'>
          <ul class='form-flex'>
            <input type='hidden' name='house_id' readonly value='$row[house_id]' />
            <li>
              <label for='address_1'>Adress line 1</label>
              <input type='text' name='address_1' value='$row[address_1]' />
            </li>
            <li>
              <label for='address_2'>Adress line 2</label>
              <input type='text' name='address_2' value='$row[address_2]' />
            </li>
            <li>
              <label for='bed'>Number of Beds</label>
              <input type='text' name='bed' value='$row[bed]' />
            </li>
            <li>
              <label for='bathroom'>Number of Bathrooms</label>
              <input type='text' name='bathroom' value='$row[bathroom]' />
            </li>
            <li>
              <label for='car'>Number of Car parks</label>
              <input type='text' name='car' value='$row[car]' />
            </li>
            <li>
              <label for='description'>House description</label>
              <textarea name='description' id='' rows='6'>$row[description]</textarea>
            </li>
            <li>
              <label for='price'>Price</label>
              <input type='text' name='price' value='$row[price]' />
            </li>";



        if ($row['auction']) {
          echo "
          <li>
            <input type='checkbox' name='auction' checked value='1' />
            <p>Auction?</p>
          </li>";
        } else {
          echo "
          <li>
            <input type='checkbox' name='auction' />
            <label for='auction'>Auction?</label>
          </li>";
        }
        echo "
            <li>
              <label for='file'>Upload an image</label>
              <input type='file' name='file' />
            </li>

            <img class='current-img' src='../house_assests/$row[image_link]' alt='' />
            <li>
              <label for='agent_id'>Agent</label>
              <input type='text' name='agent_id' value='$row[agent_id]' />
            </li>
            <input type='hidden' name='image_link' value='$row[image_link]' />

            <button type='submit'>Update</button>
            </ul>
          </form>
        ";
        echo "
          <form action='";
        echo htmlspecialchars('../includes/deleteAction.php');
        echo "' method='POST'>
            <input type='hidden' name='delete_id' value='$row[house_id]' />
            <button type='submit'>DELETE</button>
          </form>";
          echo "<button>View Listing</button>";
        }


    } else {
      echo "WHoops, something went wrong";
    }
    ?>
      </div>
</div>
<?php
     include '../components/footer.php';
?>
