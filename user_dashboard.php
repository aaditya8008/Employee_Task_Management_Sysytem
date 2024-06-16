<?php
session_start();
?>
<?php
if(isset($_SESSION['email'])){
include('includes/connection.php');
if(isset($_POST['submit_leave'])){
  
  $query="insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','Pending','$_POST[start_date]','$_POST[end_date]','$_POST[type]')";
  $query_run=mysqli_query($connection,$query);
  if($query_run){
    echo "<script type='text/javascript'>
    alert('Leave Applied');
    window.location.href='user_dashboard.php';
    </script>
     ";
  }
  else{
echo"<script type='text/javascript'>
alert('Unable to apply leave!');
window.location.href='user_dashboard.php';
</script>
";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management Dashboard</title>
  <!-- JQuery file -->
  <script src="JQuery/jquery-3.7.1.min.js"></script>
  <!-- Boot Strap file -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <!-- Connecting pages using JQuery -->
  <script type="text/javascript">
$(document).ready(function(){
  $("#update_task").click(function(){
  
    $("#right_sidebar").load("task.php");
  });
});
  </script>
  

   <script type="text/javascript">
$(document).ready(function(){
  $("#leave_status").click(function(){
    
    $("#right_sidebar").load("leave_status.php");
  });
});


  </script>
   <script type="text/javascript">
$(document).ready(function(){
  $("#apply_leave").click(function(){
  
    $("#right_sidebar").load("apply_leave.php");
  });
});
  </script>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: url('includes/images/loginbk.jpg') center/cover no-repeat fixed;
      color: #fff;
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    header {
      background-color: #333;
      padding: 20px;
      text-align: center;
      grid-column: span 2;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin: 20px;
    }

    .dashboard-button {
      padding: 10px;
      background-color: #1076b9;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      width: 150px;
      margin: 20px;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .dashboard-button:hover {
      background-color: #45a049;
    }

    .content {
  padding: 20px;
  text-align: center;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  grid-column: span 1;
  width: 1000px;
  margin-right: 200px;
  height: auto;
 
  color: black; /* Set text color to black */
}
#logout:hover{
    background-color: red; 
}

    footer {
      background-color: #333;
      padding: 20px;
      text-align: center;
      grid-column: span 2;
    }
  </style>
</head>
<body>

  <header>
    <h1>Task Management</h1>
  </header>

  <div class="button-container">
    <a class="dashboard-button" href="user_dashboard.php" type="button" id="dashboard_button">Dashboard</a>
    <a class="dashboard-button"  type="button" id="update_task">Update task</a>
    <a class="dashboard-button"  type="button" id="apply_leave">Apply leave</a>
    <a class="dashboard-button"  type="button" id="leave_status">Leave status</a>
    <a class="dashboard-button" href="logout.php" type="button" id="logout" >Logout</a>
  </div>

  <div class="content" id="right_sidebar">
    <!-- Your main content goes here -->
    <h1 style="margin-bottom: 20px;">Instructions</h1>
    <ul>
        <h3>
     
        <li>All the Employees should mark their attendance daily.</li>
        <br><br>
        <li>Complete all the tasks assigned to you.</li>
        <br><br>
        <li>Apply for leave only if any valid reason.</li>
        <br><br>
        <li>Try to complete tasks 2-3 days before due date.</li>
    
    </ul>
  </div>
</h3>
  <footer>
    <h2><?php echo $_SESSION['name'];?></h2>
    <p>Email: <?php 
    echo $_SESSION['email'];
    ?></p>
    <p>Thank You.</p>
  </footer>

</body>
</html>
<?php }
else{
  header('Location:login.php');
}?>