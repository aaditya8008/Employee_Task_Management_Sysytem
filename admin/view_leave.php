<?php
session_start();
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<center><h3>Leave Applications</h3></center><br>
<table class="table" style="background-color: whitesmoke; ">
        <tr>
            <th>S.No</th>
            <th>User</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        include("../includes/connection.php");
        $sno=1;
        $query="select * from leaves ";
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
            <td><?php echo $sno; ?></td>
            <?php
             $query2="select name from users where uid=$row[uid] ";
             $query_run2=mysqli_query($connection,$query2);
             while($row1=mysqli_fetch_assoc($query_run2)){?>
             <td><?php echo $row1['name']; ?></td>
             <?php
            }?>
            
            
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="approve.php?id=<?php echo $row['lid']?>">Approve</a> | <a href="reject.php?id=<?php echo $row['lid']?>">Reject</a></td>
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
    header('Location:admin_login.php');
  }?>
  