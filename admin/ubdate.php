<?php
include 'haha.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `book_form` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$location = $row['location'];
$guests = $row['guests'];
$arrivals = $row['arrivals'];
$leaving = $row['leaving'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $sql = "UPDATE `book_form` 
            SET name='$name', email='$email', phone='$phone', address='$address', 
            location='$location', guests='$guests', arrivals='$arrivals', leaving='$leaving' 
            WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: display.php');
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
  <title>Update Booking</title>
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
  <h2>Update Booking</h2>
  <form method="post">
    <div class="form-group">
      <span>Name :</span>
      <input type="text" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="form-group">
      <span>Email :</span>
      <input type="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="form-group">
      <span>Phone :</span>
      <input type="number" name="phone" value="<?php echo $phone; ?>" required>
    </div>
    <div class="form-group">
      <span>Address :</span>
      <input type="text" name="address" value="<?php echo $address; ?>" required>
    </div>
    <div class="form-group">
      <span>Where to :</span>
      <input type="text" name="location" value="<?php echo $location; ?>" required>
    </div>
    <div class="form-group">
      <span>How many :</span>
      <input type="number" name="guests" value="<?php echo $guests; ?>" required>
    </div>
    <div class="form-group">
      <span>Arrivals :</span>
      <input type="date" name="arrivals" value="<?php echo $arrivals; ?>" required>
    </div>
    <div class="form-group">
      <span>Leaving :</span>
      <input type="date" name="leaving" value="<?php echo $leaving; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update Booking</button>
  </form>
</div>

</body>
</html>
