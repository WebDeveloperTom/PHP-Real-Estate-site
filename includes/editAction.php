<?php
$house_id = $address_1 = $address_2 = $bed = $bathroom = $car = $description = $price = $auction = $image_link = $agent_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'config.php';
    echo $_POST['address_1'];
    echo $_POST['address_2'];
    echo $_POST['bed'];
    echo $_POST['bathroom'];
    echo $_POST['car'];
    echo $_POST['description'];
    echo $_POST['price'];
    echo "Auction:";
    if (!isset($_POST['auction'])) {
      echo "Off";
    } else{
      echo $_POST['auction'];
    }
    echo $_POST['image_link'];
    echo $_POST['agent_id'];


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
