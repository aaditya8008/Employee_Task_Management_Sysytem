<?php
session_start();
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- JQuery file -->
  <script src="../JQuery/jquery-3.7.1.min.js"></script>
  <!-- Boot Strap file -->
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
body{
    color: #fff;
    
}

  </style>
</head>

<body>
   <h3>Create new task</h3>
   
   <div class="row justify-content-center">
    <div class="col-md-6">
        
        <form action="" method="post">
            
            <div class="form-group">
         <label>Select use:</label>
         <select class="form-control" name="id">
            <option>-Select-</option>
            <?php
            include('../includes/connection.php');
            $query="select uid,name from users";
            $query_run=mysqli_query($connection,$query);
            if(mysqli_num_rows($query_run)){
                while($row=mysqli_fetch_assoc($query_run)){
                    ?>
                    <option value="<?php echo $row['uid']?>"><?php echo $row['name'];?></option><?php
                }
            }
            ?>
         </select>
            </div>
<div class="form-group">
    <label>Description:</label>
    <textarea class="form-control;" rows="3" cols="50"
    name="description" placeholder="Mention the task"
    ></textarea>
</div>
<div class="form-group">
    <label>Start date:</label>
    <input type="date" class="form-control" name="start_date">
    <label>End date:</label>
    <input type="date" class="form-control" name="end_date">
</div>
<input type="submit" class="btn" name="create_task" value="Create">
        </form>
    </div>
   </div>
</body>
</html><?php }
else{
  header('Location:admin_login.php');
}?>