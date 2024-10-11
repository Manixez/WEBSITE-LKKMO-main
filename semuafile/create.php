<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Form</title>
  <link rel="stylesheet" href="create.css" />
  <style>
    .hidden-input {
      display: none;
      /* Menyembunyikan elemen */
    }
  </style>
</head>

<body>
  <div class="register-container">
    <div class="logo">
      <img src="recyle (2).png" alt="Logo" />
    </div>
    <h2>REGISTER</h2>
    <form action="proses/prosesregister.php" method="POST">
      <div class="input-group">
        <input type="text" placeholder="Username" class="input-field" name="username" required />
      </div>
      <div class="input-group">
        <input type="text" placeholder="Domisili" class="input-field" name="domisili" required />
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" class="input-field" name="email" required />
      </div>
      <div class="input-group">
        <input type="text" placeholder="Nomor Telepon" class="input-field" name="nomor" required />
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" class="input-field" name="password" required />
      </div>

      <!-- Ini adalah elemen yang disembunyikan dari pengguna -->
      <input type="password" class="hidden-input" value="2" name="level" required readonly />

      <button type="submit" class="register-btn" name="input_submit_user_validate" value="1234">Sign Up</button>
    </form>

    <style>
      .input-group {
        margin-bottom: 15px;
        /* Menambahkan jarak antar elemen */
      }

      .hidden-input {
        display: none;
        /* Menyembunyikan elemen */
      }

      .input-field {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .register-btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px;
        /* Mengurangi padding untuk kesesuaian */
        font-size: 16px;
        /* Sesuaikan ukuran font */
        width: 100%;
        /* Mengambil lebar penuh dari container */
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 10px;
        /* Tambahkan sedikit margin atas */
      }

      .register-btn:hover {
        background-color: #0056b3;
      }
    </style>

    <div class="create-account">
      <p> Sudah Punya akun? kembali ke<a href="login.php">Login</a></p>
    </div>
  </div>
</body>

</html>