<?php
  include '../components/header.php';
  include '../includes/config.php';
?>

<?php
if (!isset($_SESSION["admin"])) {
  echo "
  <div class='row justify-content-center'>
  <div class='alert alert-danger show text-center' role='alert' style='width: 40%;'>
    <p>You do not have permisson to access this page.</p>
  </div>
  </div>";
  exit();
} ?>
<div class="container">
  <div class="row justify-content-md-center m-3">
    <h2 class="m-3">Add new listing</h2>
  </div>
  <div class="row justify-content-md-center">
    <div class="edit-property-form">
      <?php
      echo "<form class='' action=";
      echo htmlspecialchars('../includes/addAction.php');
      echo " method='POST' enctype='multipart/form-data'> "; ?>

          <div class='form-row'>
            <div class='form-group col-md-6'>
              <label for='address_1'>Address Line 1</label>
              <input type='text' name='address_1' class='form-control' id='address_1' value=''>
            </div>
            <div class='form-group col-md-6'>
              <label for='address_2'>Address Line 2</label>
              <input type='text' name='address_2' class='form-control' id='address_2' value=''>
            </div>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-4'>
              <label for='beds'>Beds</label>
              <input type='text' class='form-control' name='bed' id='beds' value=''>
            </div>
            <div class='form-group col-md-4'>
              <label for='bathrooms'>Bathrooms</label>
              <input type='text' class='form-control' name='bathroom' id='bathrooms' value=''>
            </div>
            <div class='form-group col-md-4'>
              <label for='cars'>Cars</label>
              <input type='text' class='form-control' name='car' id='cars' value=''>
            </div>
          </div>
          <div class='form-group'>
            <label for='description'>House description</label>
            <textarea name='description' class='form-control' id='' rows='6'></textarea>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-6'>
              <label for='price'>Price</label>
              <input type='text' class='form-control' name='price' />
            </div>
            <div class='form-group col-md-6'>
                <label for="agent_id">Select Agent</label>
                <select class="form-control" id="agent_id" name='agent_id'>
                  <?php
                  $sql = "SELECT * FROM agents";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='$row[agent_id]'>$row[agent_name]</option>";
                  }
                   ?>
                </select>

            </div>
          </div>

          <div class='form-group'>
            <div class='form-check'>
                <input class='form-check-input' type='checkbox' id='auction' name='auction'>
                <label class='form-check-label' for='auction'>
                  Auction?
                </label>
            </div>
          </div>
          <div class='tex-center'>
            <label for='file'>Upload an image</label>
            <input type='file' name='file' />
          </div>

          <input type='hidden' name='image_link' value='' />
            <button type='submit' class='btn btn-primary btn-block'>Add</button>
        </form>
      </div>
</div>
<?php
  include '../components/footer.php';

 ?>
