<?php
include('includes/connection.php');
if(isset($_POST['submit'])){
    $query="insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]','$_POST[phone]')";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('User Registered');
      window.location.href='choose.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to register!');
        window.location.href='register.php';
        </script>
         ";

    }
}

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- JQuery file -->
  <script src="JQuery/jquery-3.7.1.min.js"></script>
  <!-- Boot Strap file -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('includes/images/loginbk.jpg') center/cover no-repeat fixed; /* Replace 'background-image.jpg' with your image file */
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
    }

    .login-header {
      background-color: #1076b9;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .login-form {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-group button {
      background-color: #3498db;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }
    h3{
        position: absolute;
        left: 40px;
        top:40px;
        color: black;
        border: 1px solid #ccc;
      border-radius: 30px;
        padding: 7px;
        background-color: rgba(255, 255, 255, 0.8);
        
        
    }
   
  </style>
</head>
<body>
    
   
  <div class="login-container">
    <div class="login-header">
    <h3>Employee Task Management</h3>
      <h2>Sign-up</h2>
    </div>
    <form method="post" action="">
    <div class="login-form">
        <div class="form-group">
        
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter Name">
          </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required placeholder="Enter E-mail">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="phone">Mobile number</label>
        <input type="text" id="phone" name="phone" required placeholder="Enter Mobile number">
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Register</button>
      </div>

    </div>
    </form>
  </div>

</body>
</html>