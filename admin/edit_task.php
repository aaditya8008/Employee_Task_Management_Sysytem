<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connection.php');

if (isset($_POST['edit_task'])) {
    $query = "UPDATE tasks SET uid = $_POST[selected_user_id], description = '$_POST[description]', start_date = '$_POST[start_date]', end_date = '$_POST[end_date]' WHERE tid = $_GET[id]";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>
            alert('Task Updated');
            window.location.href='admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Unable to Update task!');
            window.location.href='admin_dashboard.php';
        </script>";
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
    <script src="../JQuery/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Connecting pages using JQuery -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#create_task").click(function () {
                $("#right_sidebar").load("create_task.php");
            });
        });

        $(document).ready(function () {
            $("#manage_task").click(function () {
                $("#right_sidebar").load("manage_task.php");
            });
        });
    </script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('../includes/images/loginbk.jpg') center/cover no-repeat fixed;
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

        .content {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            grid-column: span 1;
            width: 1000px;
            margin: 0 auto; /* Center the content */
            margin-top: 20px; /* Add some space at the top */
            margin-bottom: 20px;
            height: auto;
            margin-left: 250px;
            color: black; /* Set text color to black */
        }

        .btn {
            height: fit-content;
            text-align: end;
        }

        #logout:hover {
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

    <div class="content" id="right_sidebar">
        <h3>Edit tasks</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                $query = "SELECT * FROM tasks WHERE tid = $_GET[id]";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) { ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Select user:</label>
                            <select class="form-control" name="selected_user_id" required>
                                <option>- Select -</option>
                                <?php
                                $query1 = "SELECT uid, name FROM users";
                                $query_run1 = mysqli_query($connection, $query1);
                                if (mysqli_num_rows($query_run1)) {
                                    while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                        ?>
                                        <option value="<?php echo $row1['uid'] ?>"><?php echo $row1['name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" rows="3" name="description" required><?php echo $row['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Start date:</label>
                            <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>">
                        </div>
                        <div class="form-group">
                            <label>End date:</label>
                            <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_task" value="Update">
                        </div>
                    </form>
                <?php
                } ?>
            </div>
        </div>
    </div>

    <footer>
        <h2>Admin user</h2>
        <p>Email: admin@gmail.com</p>
        <p>Thank You.</p>
    </footer>
</body>

</html>
<?php }
else{
  header('Location:admin_login.php');
}?>
