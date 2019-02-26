<?php
$house_id = $address_1 = $address_2 = $bed = $bathroom = $car = $description = $price = $auction = $image_link = $agent_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'config.php';
    // grab ALL data from form fields
    $house_id = mysqli_real_escape_string($conn, $_POST['house_id']);
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
    if (empty($house_id) || empty($address_1) || empty($address_2) || empty($bed) ||
        empty($bathroom) || empty($car) || empty($description) || empty($price) ||
        empty($image_link) || empty($agent_id)) {
      header("Location: /assignment7/admin/edit.php?id=$house_id&error=empty");
      exit();
    }
    // fields need to be validated

}
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

 ?>
