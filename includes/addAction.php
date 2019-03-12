<?php
//new add form

$address_1 = $address_2 = $bed = $bathroom = $car =
$description = $price = $auction = $image_link = $file = $agent_id = "";
$file_new_name = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'config.php';
    // grab ALL data from form fields
    $address_1 = mysqli_real_escape_string($conn, $_POST['address_1']);
    $address_2 = mysqli_real_escape_string($conn, $_POST['address_2']);
    $bed = mysqli_real_escape_string($conn, $_POST['bed']);
    $bathroom = mysqli_real_escape_string($conn, $_POST['bathroom']);
    $car = mysqli_real_escape_string($conn, $_POST['car']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    if(!isset($_POST['auction'])){
      $auction = 0;
    } else {
      $auction = 1;
    }
    $image_link = mysqli_real_escape_string($conn, $_POST['image_link']);
    $agent_id = mysqli_real_escape_string($conn, $_POST['agent_id']);
    //ensure sure all fields are filled
    if (empty($address_1) || empty($address_2) || empty($bed) ||
        empty($bathroom) || empty($car) || empty($description) || empty($price) || empty($agent_id)) {
      header("Location: /assignment7/admin/add.php?error=empty");
      exit();
    }

    //picture isn't always updated. Check to see if a new file was uploaded.
    //if file error == 4, that means no file was uploaded.
    if (!empty($_FILES['file'])) {
      $file = $_FILES['file'];
      $file_name = $file['name'];
      $file_size = $file['size'];
      $file_tmp_name = $file['tmp_name'];
      $file_error = $file['error'];
      $file_type = $file['type'];
      $file_ext = explode('.', $file_name);
      $file_actual_ext = strtolower(end($file_ext));
      //allowed file extension
      $allowed_ext = array('jpg', 'jpeg', 'png');
      if($file_error === 0){
        if (in_array($file_actual_ext, $allowed_ext)) {
          if ($file_size < 1000000){
            $file_new_name = str_replace(' ', '', $address_1).".".$file_actual_ext;
            //the file destination will need to be change if this is opened on another computer.
            //please ensure '$file_new_name' is the last word on the destination
            $file_destination = "C:/xampp/htdocs/assignment7/house_assests/$file_new_name";
            move_uploaded_file($file_tmp_name, $file_destination);
          }
        }
      } else {
        header("Location: /assignment7/admin/add.php?upload=failed");
        exit();
      }
    }
      $sql = "INSERT INTO houses (address_1, address_2, bed, bathroom, car, description, price, auction, image_link, agent_id)
              VALUES('$address_1', '$address_2', '$bed', '$bathroom', '$car', '$description', '$price', '$auction', '$file_new_name', '$agent_id')";

    mysqli_query($conn, $sql);
    header("Location: /assignment7/admin/add.php?success=true");
  }
?>
