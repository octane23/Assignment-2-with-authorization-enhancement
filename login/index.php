<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="form-container">
      <h1>Login</h1>
      <form method="post" action="auth.php">
        <div class="form-field">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-field">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-field">
  <button type="submit" id="login-button">Log in</button>
</div>
<div class="form-field">
  <a href="register.php">Register</a>
</div>

        
      </form>
      <?php if(isset($_GET['error'])) { ?>
      <div id="error-message"><?php echo $_GET['error']; ?></div>
      <?php } ?>
    </div>
  </body>
</html>
