<?php
include 'haha.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $sql = "INSERT INTO book_form(name, email, phone, address, location, guests, arrivals, leaving) 
            VALUES('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Booking</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #B8A0BD, rgb(140, 76, 153));
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 500px;
    }
    .form-container h2 {
      text-align: center;
      color: rgb(140, 76, 153);
      margin-bottom: 25px;
    }
    .form-container .form-group span {
      display: block;
      color: rgb(140, 76, 153);
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-container input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 15px;
      transition: border-color 0.3s ease;
    }
    .form-container input:focus {
      border-color: rgb(140, 76, 153);
      outline: none;
    }
    .btn-primary {
      background-color: rgb(140, 76, 153);
      border: none;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #1e3c72;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Register Booking</h2>
  <form method="post">
    <div class="form-group">
      <span>Name :</span>
      <input type="text" name="name" placeholder="Enter your name" required>
    </div>
    <div class="form-group">
      <span>Email :</span>
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
      <span>Phone :</span>
      <input type="number" name="phone" placeholder="Enter your phone number" required>
    </div>
    <div class="form-group">
      <span>Address :</span>
      <input type="text" name="address" placeholder="Enter your address" required>
    </div>
    <div class="form-group">
      <span>Where to :</span>
      <input type="text" name="location" placeholder="Place you want to visit" required>
    </div>
    <div class="form-group">
      <span>How many :</span>
      <input type="number" name="guests" placeholder="Number of guests" required>
    </div>
    <div class="form-group">
      <span>Arrivals :</span>
      <input type="date" name="arrivals" required>
    </div>
    <div class="form-group">
      <span>Leaving :</span>
      <input type="date" name="leaving" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit Booking</button>
  </form>
</div>

</body>
</html>
