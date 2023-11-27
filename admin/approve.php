<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connection.php');
    $query = "UPDATE leaves SET status='Approved' WHERE lid = $_GET[id]";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>
            alert('Status Updated');
            window.location.href='admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Unable to Update !');
            window.location.href='admin_dashboard.php';
        </script>";
    }

?><?php }
else{
  header('Location:admin_login.php');
}?>

