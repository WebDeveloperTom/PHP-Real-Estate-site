<?php
  include '../components/header.php';
  include '../includes/config.php';
?>

    <form action='<?php echo htmlspecialchars("../includes/addAction.php"); ?>' method='POST'>
      <input type='text' name='address_1' placeholder='Address line 1' />
      <input type='text' name='address_2' placeholder='Address line 2' />
      <input type='text' name='bed' placeholder='Number of Beds' />
      <input type='text' name='bathroom' placeholder='Number of Bathrooms' />
      <input type='text' name='car' placeholder='Number of Car Parks' />
      <textarea name='description' id='' cols='30' rows='30' placeholder='A brief description of the property'></textarea>
      <input type='text' name='price' placeholder='Price' />
      <input type='checkbox' name='auction' />
      <!-- // Checkboxes can also have value on, when they are checked.
      // Therefore for compatibility it's easier just to use isset($_POST['checkboxName']) -->
      <input type='text' name='image_link' placeholder='Image url' />
      <input type='text' name='agent_id' placeholder='Agent ID' />
      <!-- Should make that into a drop down selection -->
      <button type='submit'>Create listing</button>
    </form>
<?php
  include '../components/footer.php';

 ?>
