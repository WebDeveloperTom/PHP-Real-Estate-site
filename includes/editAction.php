<?php
$house_id = $address_1 = $address_2 = $bed = $bathroom = $car = $description = $price = $auction = $image_link = $agent_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'config.php';
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
    echo $house_id;
    echo $address_1;
    echo $bed;
    echo $bathroom;
    echo $car;
    echo $description;
    echo $price;
    echo $auction;
    echo $image_link;
    echo $agent_id;


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
