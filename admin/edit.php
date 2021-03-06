<?php
    include '../components/header.php';
    include '../includes/config.php';
?>
<?php
//admin checks
if (!isset($_SESSION["admin"])) {
  echo "Youre not the admin";
  exit();
} ?>
<!-- admin navigation -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-dot justify-content-center">
    <li class="breadcrumb-item"><a href="../admin">Admin panel</a></li>
    <li class="breadcrumb-item"><a href="./add.php">New Listing</a></li>
    <li class="breadcrumb-item"><a href="./editList.php">Property Listings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Listing</li>
  </ol>
</nav>
<div class="container">
  <div class="row justify-content-center">
  <?php
  //error and success checks
  if (isset($_GET['query'])) {
    $queryCheck = $_GET['query'];
    if ($queryCheck == "uploadFailed" ) {
      echo "
      <div class='alert alert-danger alert-dismissible fade show text-center' role='alert' style='width: 40%;'>
        <p>Picture upload failed. Please try again and ensure it is less than 2MB and either a JPEG or PNG.</p>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      ";
    }
    if ($queryCheck == "empty" ) {
      echo "
      <div class='alert alert-danger alert-dismissible fade show text-center' role='alert' style='width: 40%;'>
        <p>Please ensure all the fields are filled out.</p>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      ";
    }
  };
  if (isset($_GET['success'])) {
    echo "
    <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style='width: 40%;'>
      <p>Listing Updated!</p>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    ";
  }
  ?>
  </div>
  <div class="row justify-content-md-center p-3">
    <h2>Edit listing</h2>
  </div>
  <div class="row justify-content-md-center">
    <div class="edit-property-form">
      <?php
      echo "<form class='' action=";
      echo htmlspecialchars('../includes/editAction.php');
      //multipart/formdata for photo/file uploads
      echo " method='POST' enctype='multipart/form-data'> "; ?>
      <?php
      //fetch the house data based on the id recieved
      if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        //display the house information. Display info using value attributes.
        echo "
          <input type='hidden' name='house_id' readonly value='$row[house_id]' />
          <div class='form-row'>
            <div class='form-group col-md-6'>
              <label for='address_1'>Address Line 1</label>
              <input type='text' name='address_1' class='form-control' id='address_1' value='$row[address_1]'>
            </div>
            <div class='form-group col-md-6'>
              <label for='address_2'>Address Line 2</label>
              <input type='text' name='address_2' class='form-control' id='address_2' value='$row[address_2]'>
            </div>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-4'>
              <label for='beds'>Beds</label>
              <input type='text' class='form-control' name='bed' id='beds' value='$row[bed]'>
            </div>
            <div class='form-group col-md-4'>
              <label for='bathrooms'>Bathrooms</label>
              <input type='text' class='form-control' name='bathroom' id='bathrooms' value='$row[bathroom]'>
            </div>
            <div class='form-group col-md-4'>
              <label for='cars'>Cars</label>
              <input type='text' class='form-control' name='car' id='cars' value='$row[car]'>
            </div>
          </div>
          <div class='form-group'>
            <label for='description'>House description</label>
            <textarea name='description' class='form-control' id='' rows='6'>$row[description]</textarea>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-6'>
              <label for='price'>Price</label>
              <input type='text' class='form-control' name='price' value='$row[price]' />"; ?>
            </div>
            <div class='form-group col-md-6'>
              <label class='' for='agent_id'>Agent ID</label>
              <select name='agent_id' class='form-control' id='agent_id'>
                <?php
                //make the current selected agent option 1.
                $currentAgent = $row['agent_id'];
                $currentAgentSql = "SELECT agent_name FROM agents WHERE agent_id ='$row[agent_id]'";
                $currentAgentName = mysqli_query($conn, $currentAgentSql);
                while($cAN = mysqli_fetch_assoc($currentAgentName)){
                echo "<option value='$row[agent_id]' selected> $cAN[agent_name]  </option>";
              }
                 // fetch the rest of avalible agents
                $agentSql = "SELECT * FROM agents";
                $agentResult = mysqli_query($conn, $agentSql);
                while($agents = mysqli_fetch_assoc($agentResult)){
                  if ($agents['agent_id'] !== $currentAgent ) {
                    //create a drop down menu for each of them.
                    echo "<option value='$agents[agent_id]'>$agents[agent_name]</option>";
                  }
                }
                 ?>
              </select>
        <?php
            echo "
            </div>
          </div>
          <div class='form-group'>
            <div class='form-check'>";
            //if the house is listed as "for auction" check the box
              if ($row['auction']) {
                echo "
                <input class='form-check-input' type='checkbox' value='1' checked id='auction' name='auction'>
                <label class='form-check-label' for='auction'>
                  Auction?
                </label>
                ";
              } else {
                //otherwise dont
                echo "
                <input class='form-check-input' type='checkbox' id='auction' name='auction'>
                <label class='form-check-label' for='auction'>
                  Auction?
                </label>";
              }
              echo "
            </div>
          </div>
          <div class=''>
            <label for='file'>Upload an image</label>
            <input type='file' name='file' />
          </div>
          <div class='form-row'>
            <div class='form-group col-md-3'>
            </div>
            <div class='form-group col-md-6 text-center'>
            <h4>Current Image</h4>
              <img style='max-height:400px;' class='img-fluid img-responsive' src='../house_assests/$row[image_link]' alt='' />
            </div>
            <div class='form-group col-md-3'>
            </div>
          </div>
          <input type='hidden' name='image_link' value='$row[image_link]' />
            <button type='submit' class='btn btn-primary btn-block'>Update</button>
        </form>";
            echo "
            <div class='p-3'>
              <form action='";
            echo htmlspecialchars('../includes/deleteAction.php');
            echo "' method='POST'>
                <input type='hidden' name='delete_id' value='$row[house_id]' />
                <button type='submit' class='btn btn-danger btn-block'>DELETE LISTING</button>
              </form>
              </div>";
      }
    } else {
      echo "Whoops. Something went wrong. Please ensure you are connected to the database.";
    }
      ?>
  </div>
</div>
</div>
<?php include '../components/footer.php'; ?>
