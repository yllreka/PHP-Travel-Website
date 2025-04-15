<?php
require 'config.php';


$conn = mysqli_connect("localhost", "root", "", "reglog");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!empty($_SESSION["id"])) {
    header("Location: PROJEKTloghome.php");
    exit;
}

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: PROJEKTloghome.php");
            exit;
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Registered');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #B8A0BD,rgb(140, 76, 153));
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 25px;
      color:rgb(140, 76, 153);
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s ease;
    }

    .login-container input:focus {
      border-color: #2a5298;
      outline: none;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background-color:rgb(140, 76, 153);
      border: none;
      color: white;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-container button:hover {
      background-color: #1e3c72;
    }

    .login-container a {
      display: block;
      margin-top: 15px;
      color: #2a5298;
      text-decoration: none;
      font-size: 14px;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form method="post" autocomplete="off">
      <input type="text" name="usernameemail" placeholder="Email or Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="submit">Login</button>
    </form>
    <a href="PROJEKTregistration.php">Don't have an account? Register here</a>
  </div>

</body>
</html>
