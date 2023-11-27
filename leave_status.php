<?php
session_start();
if(isset($_SESSION['email'])){
include("includes/connection.php");?>
<!DOCTYPE html>
<html lang="en">
<center><h3>Your Applications</h3></center><br>
<table class="table" style="background-color: whitesmoke; ">
        <tr>
            <th>S.No</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Status</th>
        </tr>
        <?php
     
        $sno=1;
        $query="select * from leaves where uid=$_SESSION[uid] ";
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            </tr>
            <?php
            $sno++;
        }
        ?>
    </table>
<body>
    
</body>
</html><?php
}
else{
    header('Location:login.php');
  }?>

