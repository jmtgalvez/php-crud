<?php
    require ('../connection/database.php');
    require ('session.php');

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $query_update = "SELECT * from register WHERE id = '$id'";

        $sql_update = mysqli_query($connection, $query_update) OR trigger_error('Query FAILED! sql:$query_update ERROR: '.mysqli_error($connection), E_USER_ERROR);
        
        $row = mysqli_fetch_assoc($sql_update);
    };

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $query_delete = "DELETE FROM register WHERE id = $id";
        
        $sql_delete = mysqli_query($connection,$query_delete) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );

        echo "<script> alert('Record Deleted!')</script>";
        echo "<script>window.location.href = '../index.php'</script>";
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $user_role = $_POST['user_role'];

        $query_update = "UPDATE register SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', user_role = '$user_role' WHERE id = '$id'";

        $sql_update = mysqli_query($connection, $query_update) OR trigger_error('Query FAILED! sql:$query_update ERROR: '.mysqli_error($connection), E_USER_ERROR);

        echo "<script>alert('Successfully updated!')</script>";
        echo "<script>window.location.href = '../index.php'</script>";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Update User</h3>
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <input type="text" name="first_name" value="<?php echo $row['first_name']?>" placeholder="Enter first name" required>
        <input type="text" name="last_name" value="<?php echo $row['last_name']?>" placeholder="Enter last name" required>
        <input type="email" name="email" value="<?php echo $row['email']?>" placeholder="Enter email" required readonly>
        <select name="gender" id="">
            <option value="">Select gender</option>
            <option value="Male" <?php echo ($row['gender'] == "male") ? "selected" : null; ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == "female") ? "selected" : null; ?>>Female</option>
        </select>
        <select name="user_role" id="">
            <option value="">Select user role</option>
            <option value="Admin" <?php echo ($row['user_role'] == "Admin") ? "selected" : null; ?>>Admin</option>
            <option value="User" <?php echo ($row['user_role'] == "User") ? "selected" : null; ?>>User</option>
        </select>
        <input type="submit" name="edit" value="Update">
    </form>
</body>
</html>