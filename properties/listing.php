<?php include '../components/header.php'; ?>
    <?php
    include '../includes/config.php';
    // echo "This is the property page";
    // $row[house_id]
    // $row[price]
    // $row[auction]
    // $row[agent_id]

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM houses WHERE house_id = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "
          <div class='jumbotron jumbotron-fluid'>
            <div class='container'>
              <img class='img-fluid' src='../house_assests/$row[image_link]' alt='$row[address_1], $row[address_2]'>
            </div>
          </div>
        ";
        echo "
        <div class='container '>
          <div class='row'>
            <div class='col text-center'>
              <h3>$row[address_1], $row[address_2]</h3>
              <p>$row[description]</p>
            </div>
          </div>
          <div class='row '>
            <div class='col-md-4 text-center'>
              <p><i class='fas fa-bed fa-2x'></i> : $row[bed] Bed</p>
            </div>
            <div class='col-md-4 text-center'>
              <p><i class='fas fa-bath fa-2x'></i> : $row[bathroom] Bathroom</p>
            </div>
            <div class='col-md-4 text-center'>
              <p> <i class='fas fa-car fa-2x'></i> : $row[car] Carport</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6 text-center'>";
            if ($row['auction']) {
                echo "<li class='list-group-item'>House to be auctioned</li>";
              } else {
                echo "

                <li class='list-group-item'>
                <p>PRICE:</p>
                <p>$$row[price]</p>
                </li>
                ";
              }
            echo "
            </div>
            <div class='col-md-6 text-center'>
            <div class='list-group-item'>
              <p>For more info, call:</p>";
              $agentSql = "SELECT * FROM agents WHERE agent_id = '$row[agent_id]'";
              $agentResult = mysqli_query($conn, $agentSql);
              while($Arow = mysqli_fetch_assoc($agentResult)){
                echo "
                <p>$Arow[agent_name]</p>
                <p>$Arow[agent_mobile]</p>
                <img height='100' src='../assests/$Arow[agent_profile]' alt='$Arow[agent_name]' />
                ";
              }


            echo "
            </div>

            </div>
          </div>
        </div>

        ";
        }


    } else {
      echo "WHoops, something went wrong";
    }
     ?>

<?php include '../components/footer.php'; ?>
