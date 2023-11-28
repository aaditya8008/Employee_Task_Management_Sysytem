<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose</title>
  <!-- JQuery file -->
  <script src="JQuery/jquery-3.7.1.min.js"></script>  <!-- JQuery Imported-->
  <!-- Boot Strap file -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> <!-- bootstrap.css Imported-->
  <script src="bootstrap/js/bootstrap.min.js"></script>  <!-- bootstrap.js Imported-->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('includes/images/choosebk.jpg') ; /* Replace with your image file path */
      color: #fff;
    }

    h1 {
      margin-bottom: 50px;
    
    }

    .button-container {
      display: flex;
      gap: 20px;
      position: relative;
     top: 10px;
      left: 15px;
      bottom: 10px;
      padding: 0px,3px,3px,3px;
    }
.button-out{
    background-color: rgba(255, 255, 255, 0.8) ;
      height: 60px;
      width: 300px;
      border-radius: 20px;
    color: solid;
    
}
#Welcome{
    margin-bottom: 0px;
}
    .button {
      padding: 10px;
      background-color: #1c7fc2;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <h1 id="Welcome">Welcome </h1>
  <h1>Choose Your Role</h1>
<div class="button-out">
  <div class="button-container">
  <a class="button" href="login.php">Login</a>
    <a class="button" href="register.php">Registration</a>
    <a class="button" href="admin/admin_login.php">Admin</a>
  </div>
</div>
</body>
</body>
</html>