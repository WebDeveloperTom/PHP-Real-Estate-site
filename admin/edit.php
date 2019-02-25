<?php include '../components/header.php'; ?>
    <?php
    include '../includes/config.php';
    // echo "This is the property page";
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "
          <form action='";
        echo htmlspecialchars('includes\editAction.php');
        echo "' method='POST'>
            <input type='text' readonly value='$row[house_id]' />
            <input type='text' value='$row[address_1]' />
            <input type='text' value='$row[address_2]' />
            <input type='text' value='$row[bed]' />
            <input type='text' value='$row[bathroom]' />
            <input type='text' value='$row[car]' />
            <textarea name='description' id='' cols='30' rows='30'>$row[description]</textarea>
            <input type='text' value='$row[price]' />";
        if ($row['auction']) {
          echo "
            <input type='checkbox' checked value='1' />";
        } else {
          echo "
            <input type='checkbox' />";
        }
        echo "
            <input type='text' value='$row[image_link]' />
            <input type='text' value='$row[agent_id]' />
            <button type='submit'>Update</button>
          </form>
        ";
        echo "
          <form action='";
        echo htmlspecialchars('includes\deleteAction.php');
        echo "' method='POST'>
            <button type='submit'>DELETE</button>
          </form>";
        }


    } else {
      echo "WHoops, something went wrong";
    }
//$sql = "DELETE FROM houses WHERE house_id=$row[house_id]";
// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

// Checkboxes can also have value on, when they are checked.
// Therefore for compatibility it's easier just to use isset($_POST['checkboxName'])
     ?>


<?php include '../components/footer.php'; ?>
