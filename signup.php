<?php include 'components/header.php'; ?>
    <main>
       <?php
       //error messages.
       if (isset($_GET['query'])) {
         $queryCheck = $_GET['query'];
         if ($queryCheck == "empty" ) {
           echo "<p>You did not fill out all the fields.</p>";
         } elseif ($queryCheck == "invalidName" ) {
           echo "<p class='error'>Please enter a valid Name.</p>";
         } elseif ($queryCheck == "invalidEmail" ) {
           echo "<p>You did not enter a valid email address.</p>";
         } elseif ($queryCheck == "emailTaken") {
           echo "<p>That email is already in use.</p>";
         } elseif ($queryCheck == "userTaken") {
           echo "<p>That user name has already been taken.</p>";
         } elseif ($queryCheck == "pwdNoMatch" ) {
           echo "<p>Your passwords did not match.</p>";
         } elseif ($queryCheck == "invalidPwd" ) {
           echo "<p>Your password must be at least 6 characters long.</p>
                <p>With at least one number, one lowercase and one uppercase letter.</p>";
         }elseif ($queryCheck == "error" ) {
           echo "<p>Whoops. Something went wrong. Please try again.</p>";
         }
       }
        ?>
        <div class="login-form">
          <?php
          echo "<form class='' action=";
          echo htmlspecialchars('includes\signupAction.php');
          echo " method='post'> "; ?>
            <h2 class='text-center'>Sign Up</h2>
            <div class='form-group'>
              <?php
              //check to see if there are any relivant $_GET and display the info accordingly
              if (isset($_GET['fName'])) {
                $fName = $_GET['fName'];
                echo "<input type='text' name='fName' value='$fName' placeholder='Name' class='form-control'>";
              } else {
                echo "<input type='text' name='fName' value='' placeholder='Name' class='form-control'>";
              } ?>
            </div>
            <div class='form-group'>
              <?php
              if (isset($_GET['email'])) {
                $email = $_GET['email'];
                echo "<input type='email' name='email' value='$email' placeholder='Email' class='form-control'>";
              } else {
                echo "<input type='email' name='email' value='' placeholder='Email' class='form-control'>";
              } ?>
            </div>
            <div class='form-group'>
              <?php
              if (isset($_GET['username'])) {
                $username = $_GET['username'];
                echo "<input type='text' name='username' value='$username' placeholder='Username' class='form-control'>";
              } else {
                echo "<input type='text' name='username' value='' placeholder='Username' class='form-control'>";
              } ?>
            </div>
            <div class='form-group'>
              <input type='password' name='pwd' value='' placeholder='Password' class='form-control'>
            </div>
            <div class='form-group'>
              <input type='password' name='cPwd' value='' placeholder='Confirm Password' class='form-control'>
            </div>
            <div class='form-group'>
              <button type='submit' name='button' class='btn btn-primary btn-block'>Sign up!</button>
            </div>
          </form>
            <p class='text-center'><a href='./login.php'>Already have an account? Log in</a></p>
         </div>
    </main>
<?php include 'components/footer.php'; ?>
