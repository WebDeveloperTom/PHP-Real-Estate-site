<!-- reusable login form -->
<div class="login-form">
  <?php
  echo "<form class='' action=";
  echo htmlspecialchars('includes\loginAction.php');
  echo " method='post'> "; ?>
    <h2 class='text-center'>Log in</h2>
    <div class='form-group'>
    <input type='text' name='username' value='' placeholder='Username' class='form-control'>
    </div>
    <div class='form-group'>
    <input type='password' name='pwd' value='' placeholder='Password' class='form-control'>
    </div>
    <div class='form-group'>
      <button type='submit' name='button' class='btn btn-primary btn-block'>Login</button>
    </div>
  </form>
    <p class='text-center'><a href='./signup.php'>Create an Account</a></p>
 </div>
