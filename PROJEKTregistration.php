<?php
require 'config.php';

if (!empty($_SESSION["id"])) {
    header("Location: PROJEKTloghome.php");
    exit;
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Email Has Already Taken');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful');</script>";
        } else {
            echo "<script>alert('Password Does Not Match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #B8A0BD, rgb(140, 76, 153));
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }

    .register-container h2 {
      margin-bottom: 25px;
      color: rgb(140, 76, 153);
    }

    .register-container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s ease;
    }

    .register-container input:focus {
      border-color: #2a5298;
      outline: none;
    }

    .register-container button {
      width: 100%;
      padding: 12px;
      background-color: rgb(140, 76, 153);
      border: none;
      color: white;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .register-container button:hover {
      background-color: #1e3c72;
    }

    .register-container a {
      display: block;
      margin-top: 15px;
      color: #2a5298;
      text-decoration: none;
      font-size: 14px;
    }

    .register-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="register-container">
    <h2>Register</h2>
    <form method="post" autocomplete="off">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
      <button type="submit" name="submit">Register</button>
    </form>
    <a href="PROJEKTlogin.php">Already have an account? Login here</a>
  </div>

</body>
</html>
