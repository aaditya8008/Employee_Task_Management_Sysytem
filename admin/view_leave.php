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
            <th>Type</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Status</th>
            
            <th>Duration</th>
            <th>Action</th>
        </tr>
        <?php
include("../includes/connection.php");

// Function to calculate the difference in days between two dates
function dateDiffInDays($startDate, $endDate) {
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);
    $interval = date_diff($startDateTime, $endDateTime);
    return $interval->days;
}

$sno = 1;
$query = "SELECT * FROM leaves";
$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
    <tr>
        <td><?php echo $sno; ?></td>
        <?php
        $query2 = "SELECT name FROM users WHERE uid = " . $row['uid'];
        $query_run2 = mysqli_query($connection, $query2);
        while ($row1 = mysqli_fetch_assoc($query_run2)) {
            ?>
            <td><?php echo $row1['name']; ?></td>
            <?php
        }
        ?>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['message']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo dateDiffInDays($row['sdate'], $row['edate']) . " Days"; ?></td>
      
        <td>
            <a href="approve.php?id=<?php echo $row['lid']; ?>">Approve</a> | 
            <a href="reject.php?id=<?php echo $row['lid']; ?>">Reject</a>
        </td>
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
  