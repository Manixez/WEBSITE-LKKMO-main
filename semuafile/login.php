<?php
if (!empty($_SESSION['username_elsampah'])) {
  header('location:home');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="login-container">
    <div class="logo">
      <img src="recyle (2).png" alt="Logo" />
    </div>
    <form class="login-form needs-validation" action="proses/proseslogin.php" method="POST" novalidate>
      <input type="text" placeholder="Username" id="floatingInput" class="input-field" name="username" required />
      <input type="password" placeholder="Password" id="floatingPassword" class="input-field" name="password" required />
      <button type="submit" name="sumbit_validate" class="login-btn">Login</button>
    </form>
    <div class="create-account">
      <p> Don't have an account? <a href="create.php">Create account</a></p>
    </div>
  </div>

  <script>
    // Example JavaScript for validating the form
    (function() {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>

</html>