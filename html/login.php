<?php
require '../functions/login.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil ditambahkan');
        </script>";
    } else {
        global $conn;
        echo mysqli_error($conn);
    }
}

session_start();

$email = $password = '';
$email_error = $password_error = '';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Pastikan untuk menyertakan koneksi database
    require '../functions/connect.php';
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id']; // Memperbaiki bagian ini
            header("location: index.php");
            exit;
        } else {
            $password_error = "Password salah!";
        }
    } else {
        $email_error = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Login</title>
  </head>

  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="" method="post">
          <h1>Create Account</h1>
          <input type="text" name="username" placeholder="Username" />
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <button type="submit" name="register">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="" method="post">
          <h1>Sign In</h1>
          <input type="email" name="email" placeholder="Email" />
          <div class="error-message"><?php echo isset($email_error) ? $email_error : ''; ?></div>
          <input type="password" name="password" placeholder="Password" />
          <div class="error-message"><?php echo isset($password_error) ? $password_error : ''; ?></div>
          <a href="#">Forget Your Password?</a>
          <button type="submit" name="login">Sign In</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hello, Friend!</h1>
            <p>
              Register with your personal details to use all of site features
            </p>
            <button class="hidden" id="register">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/login.js"></script>
  </body>
</html>
