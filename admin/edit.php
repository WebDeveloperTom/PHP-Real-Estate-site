<?php
    include '../components/header.php';
    include '../includes/config.php';
    // echo "This is the property page";
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "
          <form action='";
        echo htmlspecialchars('../includes/editAction.php');
        echo "' method='POST'>
            <input type='text' name='house_id' readonly value='$row[house_id]' />
            <input type='text' name='address_1' value='$row[address_1]' />
            <input type='text' name='address_2' value='$row[address_2]' />
            <input type='text' name='bed' value='$row[bed]' />
            <input type='text' name='bathroom' value='$row[bathroom]' />
            <input type='text' name='car' value='$row[car]' />
            <textarea name='description' id='' cols='30' rows='30'>$row[description]</textarea>
            <input type='text' name='price' value='$row[price]' />";
        if ($row['auction']) {
          echo "
            <input type='checkbox' name='auction' checked value='1' />";
        } else {
          echo "
            <input type='checkbox' name='auction' />";
        }
        echo "
            <input type='text' name='image_link' value='$row[image_link]' />
            <input type='text' name='agent_id' value='$row[agent_id]' />
            <button type='submit'>Update</button>
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
     include '../components/footer.php';
?>
