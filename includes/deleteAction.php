<?php
$delete_id  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'config.php';
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    //delete from DB the house id that was submitted.
    $sql = "DELETE FROM houses WHERE house_id= '$delete_id'";
    $result = mysqli_query($conn, $sql);
    header("Location: /assignment7/admin/?delete=true");
  }

 ?>
