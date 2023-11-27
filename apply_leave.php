<?php
session_start();
if(isset($_SESSION['email'])){
    include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
    <!-- Add any additional stylesheets or scripts here -->
</head>

<body>
    <div class="container">
         <div class="row justify-content-center mt-5"> <!--to center used boot strap -->
            <div class="col-md-6">
                <h3 class="text-center">Apply for Leave</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" rows="5" cols="50" name="message" id="message" placeholder="Type Message"></textarea>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-warning" name="submit_leave" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</body>

</html><?php
}
else{
  header('Location:login.php');
}?>