<?php
include 'haha.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - REKA's</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #B8A0BD, rgb(140, 76, 153));
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .panel-container {
      background: white;
      border-radius: 12px;
      padding: 20px;
      margin-top: 40px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      width: 95%;
      max-width: 1200px;
    }
    h1, h4 {
      color: rgb(140, 76, 153);
      text-align: center;
    }
    .table thead th {
      background-color: rgb(140, 76, 153);
      color: white;
    }
    .btn-primary {
      background-color: rgb(140, 76, 153);
      border: none;
    }
    .btn-primary:hover {
      background-color: #1e3c72;
    }
    .btn a {
      color: white;
      text-decoration: none;
    }
    .btn a:hover {
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="panel-container">
  <h1>REKA's</h1>
  <h4>Admin Panel</h4>

  <div class="text-right my-3">
    <button class="btn btn-primary"><a href="yll1.php">Add User</a></button>
  </div>

  <h5 style="color: rgb(140, 76, 153);">Bookings</h5>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>SL No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Location</th>
        <th>Guests</th>
        <th>Arrivals</th>
        <th>Leaving</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql="Select * from `book_form`";
      $result=mysqli_query($conn,$sql);
      if ($result) {
        while ($row=mysqli_fetch_assoc($result)) {
          echo '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['phone'].'</td>
          <td>'.$row['address'].'</td>
          <td>'.$row['location'].'</td>
          <td>'.$row['guests'].'</td>
          <td>'.$row['arrivals'].'</td>
          <td>'.$row['leaving'].'</td>
          <td>
            <button class="btn btn-primary btn-sm"><a href="ubdate.php?updateid='.$row['id'].'">Update</a></button>
            <button class="btn btn-danger btn-sm"><a href="delete.php?deleteid='.$row['id'].'" style="color:white;">Delete</a></button>
          </td>
        </tr>';
        }
      }
      ?>
    </tbody>
  </table>

  <hr>

  <div class="text-right my-3">
    <button class="btn btn-primary"><a href="yll1.php">Add User</a></button>
  </div>

  <h5 style="color: rgb(140, 76, 153);">User Accounts</h5>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>SL No</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql="Select * from `tb_user`";
      $result=mysqli_query($conn,$sql);
      if ($result) {
        while ($row=mysqli_fetch_assoc($result)) {
          echo '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['username'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['password'].'</td>
          <td>
            <button class="btn btn-primary btn-sm"><a href="ubdate.php?updateid='.$row['id'].'">Update</a></button>
            <button class="btn btn-danger btn-sm"><a href="delete2.php?deleteid='.$row['id'].'" style="color:white;">Delete</a></button>
          </td>
        </tr>';
        }
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
