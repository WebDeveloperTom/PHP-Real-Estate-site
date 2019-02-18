<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles\nav.css">
  </head>
  <body>
    <?php include 'components/Nav.php'; ?>
    <main>
      <h2>Sign up form</h2>
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

      <form action=" <?php echo htmlspecialchars('includes\signupAction.php')?>" method="POST">
        <?php
          if (isset($_GET['fName'])) {
            $fName = $_GET['fName'];
            echo '<input type="text" name="fName" placeholder="Name" value="'.$fName.'" />';
          } else {
            echo '<input type="text" name="fName" placeholder="Name" />';
          }
          if (isset($_GET['email'])) {
            $email = $_GET['email'];
            echo '<input type="text" name="email" placeholder="Email" value="'.$email.'" />';
          } else {
            echo ' <input type="email" name="email" placeholder="Email" />';
          }
          if(isset($_GET['username'])){
            $username = $_GET['username'];
            echo '<input type="text" name="username" placeholder="Username" value="'.$username.'">';
          } else {
            echo '<input type="text" name="username" placeholder="Username">';
          }

         ?>
        <input type="password" placeholder="Password" name="pwd">
        <input type="password" placeholder="Confirm Password" name="cPwd">
        <input type="submit" name="" value="Submit">
      </form>
    </main>
  </body>
</html>
