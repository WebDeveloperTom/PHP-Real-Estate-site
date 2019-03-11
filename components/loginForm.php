<?php
echo "<form class='' action=";
echo htmlspecialchars('includes\loginAction.php');
echo " method='post'>
  <input type='text' name='username' value='' placeholder='Username'>
  <input type='password' name='pwd' value='' placeholder='Password'>
  <button type='submit' name='button'>Login</button>
</form>";
 ?>
